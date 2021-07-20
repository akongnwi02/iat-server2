<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/1/20
 * Time: 11:01 PM
 */

namespace App\Services\Clients\ClientProviders;

use App\Exceptions\GeneralException;
use App\Services\Clients\AbstractClient;
use GuzzleHttp\Exception\GuzzleException;

class StronClient extends AbstractClient
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
                return $this->generateToken($params);
                break;
            default:
                throw new GeneralException(__('exceptions.backend.sales.service_invalid'));
        }
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
        $apiToken = $this->getAccessToken();
        $url  = $this->config['url'] . '/api/Vending';
        $data = [
            'CustomerId' => 'string',
            'MeterId' => $meter_id,
            'Price' => $amount,
            'Rate' => $energy,
            'Amount' => "$amount",
            'AmountTmp' => 'USD',
            'Company' => $this->config['company_name'],
            'Employee' => 'string',
            'ApiToken' => $apiToken,
        ];
        try {
            \Log::info("generating energy for $meter_id in provider's system", [
                'url' => $url,
                'body' => $data
            ]);
            $response = $this->httpClient->post($url, [
                'json' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for metercode $meter_id", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }
        
        $rawRes = $response->getBody()->getContents();
        \Log::debug('Response from stron client: ', ['response' => $rawRes]);
        
        if ($response->getStatusCode() == 200) {
            if (strlen($rawRes) > 10) {
                $result = explode(',', $rawRes);
                return $result[0];
            }
        }
        
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
    }
    
    /**
     * @param $meterCode
     * @return string
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
                'json' => $data
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
    
    public function getMaintenanceCode($meterCode, $type): string
    {
        // TODO: Implement getMaintenanceCode() method.
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
    
    /**
     * @return mixed
     * @throws GeneralException
     */
    public function getAccessToken()
    {
        $url  = $this->config['url'] . '/api/Login';
        $data = [
            'Companyname'    => $this->config['company_name'],
            'Username'       => $this->config['username'],
            'Password' => $this->config['password'],
        ];
        try {
            \Log::info("Getting new access token", [
                'url' => $url,
                'json' => $data
            ]);
        
            $response = $this->httpClient->post($url, [
                'json' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Unexpected error when generating access token", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
        }
    
        $token = $response->getBody()->getContents();
        \Log::debug('Response from stron server: ', ['response' => $token]);
    
        if ($response->getStatusCode() == 200) {
            if (strlen($token) > 10) {
                \Log::info("Token generated successfully. Token: $token");
                return $token;
            }
        }
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
    }
}
