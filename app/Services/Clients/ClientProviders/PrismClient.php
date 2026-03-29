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

class PrismClient extends AbstractClient
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
    public function search($meterCode, $meterType = null): string
    {
        $baseUrl = rtrim($this->config['url'], '/');
        $url = $baseUrl . '/stsvend/Meter/' . urlencode($meterCode) . '.xml';

        try {
            $response = $this->httpClient->request('GET', $url, [
                'auth' => [
                    $this->config['username'],
                    $this->config['password'],
                ],
                'headers' => [
                    'Accept' => 'application/xml',
                ],
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("Meter search error for {$meterCode}", ['message' => $e->getMessage()]);
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        }

        $rawRes = $response->getBody()->getContents();

        \Log::info('Response from IAT meter search', ['response' => $rawRes]);

        $xml = simplexml_load_string($rawRes);

        if ($xml === false) {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.search_error'));
        }

        $idRecord = trim((string)($xml->idRecord ?? ''));

        if ($idRecord === '') {
            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.not_found'));
        }

        return $idRecord;
    }

    /**
     * @param array $params
     * @return string
     * @throws GeneralException
     */
    public function generateToken(array $params): string
    {
        $baseUrl = rtrim($this->config['url'], '/');

        $meterId = $params['meterId'];
        $amount  = $params['amount'];

        // Convert base currency units to cents
        // Example: 10 => 1000
        $value = (int) round(((float) $amount) * 100);

        $url = $baseUrl . '/stsvend/VendCredit2.xml';

        \Log::debug('Sending vend request to provider', [
            'url' => $url,
            'meter_id' => $meterId,
            'amount' => $amount,
            'value' => $value,
        ]);

        try {
            $response = $this->httpClient->request('POST', $url, [
                'auth' => [
                    $this->config['username'],
                    $this->config['password'],
                ],
                'headers' => [
                    'Accept' => 'application/xml',
                ],
                'form_params' => [
                    'subclass' => 0,
                    'meterId'  => $meterId,
                    'value'    => $value,
                ],
            ]);

            $rawResponse = $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            \Log::emergency("Token generation error for meter code {$meterId}", [
                'message' => $e->getMessage(),
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        \Log::info('Response from IAT vend credit API', [
            'meter_id' => $meterId,
            'response' => $rawResponse,
        ]);

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($rawResponse);

        if ($xml === false) {
            \Log::error('Invalid XML from vend credit API', [
                'meter_id' => $meterId,
                'response' => $rawResponse,
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        $token = trim((string) ($xml->tokenDec_1 ?? ''));

        if ($token === '') {
            \Log::error('tokenDec_1 missing from vend credit API response', [
                'meter_id' => $meterId,
                'response' => $rawResponse,
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        return $this->formatToken($token);
    }

    /**
     * Get maintenance token from IAT STS API
     *
     * clear_credit => subclass 1
     * clear_tamper => subclass 5
     *
     * @param string $meterCode
     * @param string $codeType
     * @param mixed $meterType
     * @return string
     * @throws GeneralException
     */
    public function getMaintenanceCode($meterCode, $codeType, $meterType = null): string
    {
        $baseUrl = rtrim($this->config['url'], '/');

        switch ($codeType) {
            case 'clear_credit':
                $subclass = 1;
                break;

            case 'clear_tamper':
                $subclass = 5;
                break;

            default:
                throw new GeneralException(__('exceptions.backend.sales.service_invalid'));
        }

        $url = $baseUrl . '/stsvend/VendMse.xml';

        \Log::debug('Sending maintenance request to provider', [
            'url' => $url,
            'meter_code' => $meterCode,
            'code_type' => $codeType,
            'subclass' => $subclass,
        ]);

        try {
            $response = $this->httpClient->request('POST', $url, [
                'auth' => [
                    $this->config['username'],
                    $this->config['password'],
                ],
                'headers' => [
                    'Accept' => 'application/xml',
                ],
                'form_params' => [
                    'subclass' => $subclass,
                    'meterId' => $meterCode,
                ],
            ]);
        } catch (GuzzleException $e) {
            \Log::emergency("{$codeType} generation error for meter code {$meterCode}", [
                'message' => $e->getMessage(),
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        $rawResponse = $response->getBody()->getContents();

        \Log::info('Response from IAT maintenance API', [
            'meter_code' => $meterCode,
            'code_type' => $codeType,
            'response' => $rawResponse,
        ]);

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($rawResponse);

        if ($xml === false) {
            \Log::error('Invalid XML returned from IAT maintenance API', [
                'meter_code' => $meterCode,
                'code_type' => $codeType,
                'response' => $rawResponse,
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        $token = trim((string)($xml->tokenDec ?? ''));
        $idRecord = trim((string)($xml->idRecord ?? ''));

        if ($token === '') {
            \Log::error('Maintenance token missing in API response', [
                'meter_code' => $meterCode,
                'code_type' => $codeType,
                'id_record' => $idRecord,
                'response' => $rawResponse,
            ]);

            throw new GeneralException(__('exceptions.backend.meters.electricity.vendor.token_error'));
        }

        return $this->formatToken($token);
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

    /**
     * Change meter key on IAT STS API and return 2 formatted tokens
     *
     * @param array $data
     * @return string[]
     * @throws GeneralException
     */
    /**
     * Change meter key on IAT STS API and return 2 formatted tokens
     *
     * @param array $data
     * @return string[]
     * @throws GeneralException
     */
    public function changeMeterKey(array $data): array
    {
        $baseUrl = rtrim($this->config['url'], '/');

        try {
            $response = $this->httpClient->request('POST', $baseUrl . '/stsvend/UpdateMeterKey.xml', [
                'auth' => [
                    $this->config['username'],
                    $this->config['password'],
                ],
                'form_params' => [
                    'meterId' => $data['meter_code'],
                    'fromSgc' => $data['fromSgc'],
                    'fromKrn' => $data['fromKrn'],
                    'fromTi'  => $data['fromTi'],
                ],
                'headers' => [
                    'Accept' => 'application/xml',
                ],
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            \Log::emergency('Change meter key request failed', [
                'meter_code' => $data['meter_code'],
                'message' => $e->getMessage(),
            ]);

            throw new \App\Exceptions\GeneralException(
                __('exceptions.backend.meters.electricity.vendor.token_error')
            );
        }

        $rawResponse = $response->getBody()->getContents();

        \Log::info('IAT change key response', [
            'meter_code' => $data['meter_code'],
            'response' => $rawResponse,
        ]);

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($rawResponse);

        if ($xml === false) {
            \Log::error('Invalid XML from change meter key', [
                'meter_code' => $data['meter_code'],
                'response' => $rawResponse,
            ]);

            throw new \App\Exceptions\GeneralException(
                __('exceptions.backend.meters.electricity.vendor.token_error')
            );
        }

        $token1 = trim((string) $xml->tokenDec_1);
        $token2 = trim((string) $xml->tokenDec_2);

        if ($token1 === '' || $token2 === '') {
            \Log::error('Missing tokens in change meter key response', [
                'meter_code' => $data['meter_code'],
                'response' => $rawResponse,
            ]);

            throw new \App\Exceptions\GeneralException(
                __('exceptions.backend.meters.electricity.vendor.token_error')
            );
        }

        return [
            $this->formatToken($token1),
            $this->formatToken($token2),
        ];
    }

    protected function formatToken(string $token): string
    {
        $digits = preg_replace('/\D+/', '', $token);

        if (empty($digits)) {
            return '';
        }

        return trim(chunk_split($digits, 4, ' '));
    }
}
