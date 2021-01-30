<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/21/20
 * Time: 10:30 PM
 */

namespace App\Services\Clients;

abstract class AbstractClient
{
    public $config;
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    public abstract function searchMeter($meterCode) : string;
    
    public abstract function generateToken(array $params) : string;
    
    public abstract function getMaintenanceCode($meterCode, $codeType) : string;
    
    public function getClientName()
    {
        return class_basename($this);
    }
}
