<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/20/20
 * Time: 9:23 PM
 */

namespace App\Services\Clients;

use App\Exceptions\Api\ServerErrorException;
use App\Models\Meter\Provider;
use App\Services\Clients\ClientProviders\HexcellClient;
use App\Services\Clients\ClientProviders\CalinClient;
use App\Services\Constants\BusinessErrorCodes;

trait ClientProvider
{
    /**
     * @param Provider $provider
     * @param array $config
     * @return AbstractClient
     * @throws ServerErrorException
     */
    public function client(Provider $provider, $config = [])
    {
        switch ($provider->name) {
            case config('business.meter.provider.hexcell'):
                $config['url']      = config('auth.meters.providers.hexcell.url');
                $config['username'] = config('auth.meters.providers.hexcell.username');
                $config['password'] = config('auth.meters.providers.hexcell.password');
                return new HexcellClient($config);
            
            case config('business.meter.provider.calin'):
                $config['url']              = config('auth.meters.providers.calin.url');
                $config['username']         = config('auth.meters.providers.calin.username');
                $config['password']         = config('auth.meters.providers.calin.password');
                $config['vending_password'] = config('auth.meters.providers.calin.vending_password');
                $config['company_name']     = config('auth.meters.providers.calin.company_name');
                $config['key']              = config('auth.meters.providers.calin.key');
                $config['new_url']          = config('auth.meters.providers.calin.new_url');
                return new CalinClient($config);
                
            default:
                throw new ServerErrorException(BusinessErrorCodes::UNKNOWN_PROVIDER, "The provider is not yet implemented");
        }
    }
}
