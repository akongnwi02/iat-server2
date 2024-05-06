<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/1/20
 * Time: 11:01 PM
 */

namespace App\Services\Clients\ClientProviders;


use App\Exceptions\Api\BadRequestException;
use App\Exceptions\GeneralException;
use App\Http\Resources\Api\Business\ReceiveMoneyResource;
use App\Rules\Service\ServiceAccessRule;
use App\Rules\Service\ServiceAmountRangeRule;
use App\Services\Business\Models\ModelInterface;
use App\Services\Business\Models\ReceiveMoney;
use App\Services\Clients\AbstractClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CalinClient extends AbstractClient
{
    
    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;
    
    /**
     * CalinClient constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->httpClient = $this->getHttpClient();
        return parent::__construct($config);
    }
    
    /**
     * @param array $params
     * @return string
     * @throws GeneralException
     */
    public function buy(array $params): string
    {
        switch ($params['serviceCode']) {
            case 'IAT_ELEC_CREDIT':
            case 'IAT_WATER_CREDIT':
                return $this->generateToken($params);
                break;
            default:
                throw new GeneralException(__('exceptions.backend.sales.service_invalid'));
        }
    }
    
    /**
     * @param $meterCode
     * @return bool
     * @throws GeneralException
     */
    public function search($meterCode): string
    {
        $url  = $this->config['url'] . '/POS_Preview';
        $data = $this->getRequestData([
            'meter_number'    => $meterCode,
            'amount'          => 0,
            'is_vend_by_unit' => true,
        ]);
        try {
            \Log::info("searching for $meterCode in provider's system", [
                'url' => $url,
                'body' => $data
            ]);
    
            $response = $this->httpClient->post($url, [
                'body' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Meter search error for $meterCode", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        }
        
        $rawRes = $response->getBody()->getContents();
        \Log::debug('Response from calin client: ', ['response' => $rawRes]);
        
        $response = json_decode($rawRes);
        
        if ($response->result_code == 0) {
            $searchResult = $response->result;
            if (!$searchResult) {
                \Log::warning("Meter code $meterCode not found");
                throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
            }
            if (
                !$searchResult->customer_name
                && !$searchResult->customer_number
                && !$searchResult->customer_addr
            ) {
                \Log::warning("Meter code $meterCode not found");
                throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
            } else {
                return $meterCode;
            }
        }
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
    }
    
    /**
     * @param array $params
     * @return string
     * @throws GeneralException
     */
    public function generateToken(array $params): string
    {
        $meter_id = $params['meterId'];
        $energy   = $params['energy'];
        $amount   = $params['amount'];
        
        $url  = $this->config['url'] . '/POS_Purchase';
        $data = $this->getRequestData([
            'meter_number'    => $meter_id,
            'amount'          => $energy,
            'password_vend'   => $this->config['vending_password'],
            'is_vend_by_unit' => true,
        ]);
        try {
            \Log::info("generating energy for $meter_id in provider's system", [
                'url' => $url,
                'body' => $data
            ]);
            $response = $this->httpClient->post($url, [
                'body' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for metercode $meter_id", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }
        
        $rawRes = $response->getBody()->getContents();
        \Log::debug('Response from calin client: ', ['response' => $rawRes]);
        
        $response = json_decode($rawRes);
        
        if ($response->result_code == 0) {
            $purchaseResult = $response->result;
            if (!$purchaseResult) {
                \Log::warning("Meter code $meter_id not found");
                throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
            }
            if ($purchaseResult->token) {
                return $purchaseResult->token;
            }
        }
        
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
    }
    
    /**
     * @param $meterCode
     * @param $codeType
     * @return string
     * @throws GeneralException
     */
    public function getMaintenanceCode($meterCode, $codeType): string
    {
        if ($codeType == 'clear_tamper') {
            $url  = $this->config['url'] . '/Maintenance_ClearTamper';
        } else {
            $url  = $this->config['url'] . '/Maintenance_ClearCredit';
        }
        $data = $this->getNewRequestData([
            'meter_number' =>  $meterCode,
        ]);
        try {
            \Log::info("generating maintenance code for $meterCode in provider's system", [
                'url' => $url,
                'body' => $data,
            ]);
            $response = $this->httpClient->post($url, [
                'body' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for metercode $meterCode, code type $codeType", [
                'message' => $e->getMessage()
            ]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        }
        
        $rawRes = $response->getBody()->getContents();
        \Log::debug('Response from calin client: ', ['response' => $rawRes]);
        
        $response = json_decode($rawRes);
        
        if ($response->result_code == '02') {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
        }
        
        if ($response->result_code == '03') {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
        }
        
        if (preg_match('/^([0-9]{4}){5}$/', $response->result)) {
            return wordwrap($response->result, 4, ' ', true);
        }
        
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        
    }
    
    /**
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        return new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json'
            ]
        ]);
    }
    
    public function getRequestData(array $data = [])
    {
        return json_encode(array_merge([
            'company_name' => $this->config['company_name'],
            'user_name'    => $this->config['username'],
            'password'     => $this->config['password'],
        ], $data));
    }
    
    public function getNewRequestData(array $data = [])
    {
        return json_encode(array_merge([
            'user_id'  => $this->config['company_name'],
            'password' =>  $this->config['key'],
            'amount'   => 0,
        ], $data));
    }
    
}
