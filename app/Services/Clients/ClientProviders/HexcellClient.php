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

class HexcellClient extends AbstractClient
{
    public $httpClient;
    
    /**
     * HexcellClient constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->httpClient = $this->getHttpClient();
        parent::__construct($config);
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
     * @return string
     * @throws GeneralException
     */
    public function search($meterCode): string
    {
        $hexcellUrl = $this->config['url'];
    
        $this->login();
    
        try {
            $response = $this->httpClient->request('GET', $hexcellUrl . '/Common/GetRegMeterByMeterCode' . "?id=$meterCode&nflag=1");
        } catch (GuzzleException $e) {
            \Log::emergency("Meter search error for $meterCode", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        }
    
        $rawRes = $response->getBody()->getContents();
    
        \Log::info('Response from hexcell client: ',['response' => $rawRes]);
    
        $response = json_decode($rawRes);
    
        if (! empty($response)) {
        
            // tbc later for debugging
            $searchResult = $response[0];
        
            return $searchResult->FID;
        }
    
        \Log::warning("Somehow, the meter $meterCode could not be found. Trying to register the meter in vendor system with dummy data");
    
        // meter is not available for generating token. Check if the meter can be registered with dummy data
        // to make it available in IAT platform
        return $this->registerMeter($meterCode);
        
    }
    
    
    /**
     * @param $meterCode
     * @return string
     * @throws GeneralException
     */
    public function registerMeter($meterCode)
    {
        $hexcellUrl = $this->config['url'] . '/MeterReg/SaveData';
        
        try {
            // register with some dummy data.
            $response = $this->httpClient->request('GET', $hexcellUrl . "?mflag=1&cname=Walters&addr=Douala&idt=0000000001&idc=$meterCode&area=0000001111&ut=0000000001&mt=1809100000&mc=$meterCode&sgc=000001&ti=1&ptct=1&sp=GSP0000001&fax=652554622&tel=+237652554622&chk=1");
        } catch (GuzzleException $e) {
            \Log::emergency("Error registering meter in vending system meter code: $meterCode", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }
        
        $response = $response->getBody()->getContents();
        
        \Log::info('Response from hexcell client: ',['response' => $response]);
        
        if (strpos($response, 'permission')) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
        }
        
        if (strpos($response, 'not set')) {
            
            // meter is really not found so return with the not found exception
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
        }
        
        if (strpos($response, 'true') !== false) {
            
            \Log::info('Meter registered successfully', ['meter code' => $meterCode]);
            // if the meter is saved successfully, return the result of the search to continue normal operation
            return $this->search($meterCode);
        }
        
        \Log::emergency("Error registering meter $meterCode", ['response from server' => $response]);
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        
    }
    
    /**
     * @param array $params
     * @return string
     * @throws GeneralException
     */
    public function generateToken(array $params): string
    {
        $hexcellUrl = $this->config['url'];
    
        $meter_id = $params['meterId'];
        $energy   = $params['energy'];
        $amount   = $params['amount'];
    
        $this->login();
        
        $purchaseUrl = $hexcellUrl . '/Vending/SaveData' . "?cid=$meter_id&amt=$amount&qt=$energy&nflag=1";
    
        \Log::debug('Sending request to provider', ['purchase url' => $purchaseUrl]);
        
        try {
            $response = $this->httpClient->request('GET', $purchaseUrl);
            $response = $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for metercode $meter_id", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }
    
        if (strpos($response, 'true') !== false) {
            $token = explode(';', $response)[1];
            return $token;
        }
        \Log::emergency("Token generation error for metercode $meter_id", ['response from server' => $response]);
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
    }
    
    /**
     * @param $meterCode
     * @param $codeType
     * @return string
     * @throws GeneralException
     */
    public function getMaintenanceCode($meterCode, $codeType) : string
    {
        $hexcellUrl = $this->config['url'];
        if ($codeType == 'clear_tamper') {
            $url = $hexcellUrl . '/ClearTamperSign/GetToken';
        } else{
            $url = $hexcellUrl . '/ClearCredit/GetToken';
        }
        
        $this->login();
    
        $purchaseUrl = $url . "?mc=$meterCode&&nflag=1";
    
        \Log::debug('Sending request to provider', ['purchase url' => $purchaseUrl]);
        try {
            $response = $this->httpClient->request('GET', $purchaseUrl);
        } catch (GuzzleException $e) {
            \Log::emergency("$codeType generation error for metercode $meterCode", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }
        
        $response = $response->getBody()->getContents();
        
        \Log::info('Response from hexcell client: ',['response' => $response]);
        
        if (strpos($response, 'permission')) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
        }
        
        if (strpos($response, 'not set')) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
        }
        
        if (preg_match('/^([0-9]{4}){5}$/', str_replace(' ', '', $response))) {
            return $response;
        }
        throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
    }
    
    /**
     * @throws GeneralException
     */
    public function login()
    {
        $hexcellUrl = $this->config['url'];
        $username   = $this->config['username'];
        $password   = $this->config['password'];
    
        $loginUrl = $hexcellUrl . '/Login/VerifyLoginUser' . "?id=$username&pwd=$password";
    
        \Log::debug('Sending request to provider', ['purchase url' => config('app.env') != 'production' ? $loginUrl: "Hidden"]);
        try {
            $this->httpClient->request('GET', $loginUrl);
        } catch (GuzzleException $exception) {
            \Log::emergency("Login Error for $username", ['message' => $exception->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.auth_error'));
        }
    }
    
    /**
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        return new \GuzzleHttp\Client([
            'cookies' => true,
        ]);
    }
    
}
