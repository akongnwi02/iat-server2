<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/1/20
 * Time: 11:01 PM
 */

namespace App\Services\Clients\ClientProviders;

use App\Exceptions\Api\NotFoundException;
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
     * @throws NotFoundException
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
     * @throws NotFoundException
     */
    public function generateToken(array $params): string
    {
        $meter_id = $params['meterId'];
        $energy   = $params['energy'];
        $amount   = $params['amount'];
        
        $url  = $this->config['url'] . '/api/VendingMeter';
        
        $data = [
            'CompanyName' => $this->config['company_name'],
            'UserName' => $this->config['username'],
            'Password' => $this->config['password'],
            'MeterId' => $meter_id,
            'is_vend_by_unit' => true,
            'Amount' => "$energy",
        ];
        try {
            \Log::info("generating energy for $meter_id in provider's system", [
                'url' => $url,
                'json' => $data
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
        
        $response = json_decode($rawRes);
    
        if (is_array($response)) {
            if (count($response) > 0) {
                $obj = $response[0];
                if ($obj->Token) {
                    if (strlen($obj->Token) > 10) {
                        \Log::debug('Token returned successfully: ', ['Token' => $obj->Token]);
                        return $obj->Token;
                    }
                }
            }
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
        }
        
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
    }
    
    /**
     * @param $meterCode
     * @return string
     * @throws GeneralException
     * @throws NotFoundException
     */
    public function search($meterCode): string
    {
        $params['meterId'] = $meterCode;
        $params['energy'] = 0;
        $params['amount'] = 0;
        
        \Log::info("searching for $meterCode in provider's system by calling the vend endpoint with amount: 0", [
            'params' => $params,
        ]);
    
        $token = $this->generateToken($params);
    
        if ($token) {
            return $meterCode;
        }
        throw new NotFoundException(__('exceptions.backend.meters.electricity.vendor.not_found'));
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
            $stronEndpoint = '/api/ClearTamper';
        } else {
            $stronEndpoint = '/api/ClearCredit';
        }
    
        $url = $this->config['url'] . $stronEndpoint;
    
        $data = [
            'CompanyName' => $this->config['company_name'],
            'UserName' => $this->config['username'],
            'PassWord' => $this->config['password'],
            'CustomerId' => $this->config['customer_id'],
            'METER_ID' => $meterCode,
        ];
        
        try {
            \Log::info("generating maintenance code for $meterCode in provider's system", [
                'url' => $url,
                'json' => $data,
            ]);
            $response = $this->httpClient->post($url, [
                'json' => $data
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for metercode $meterCode, code type $codeType", [
                'message' => $e->getMessage()
            ]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        $rawRes = json_decode($response->getBody()->getContents());
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
