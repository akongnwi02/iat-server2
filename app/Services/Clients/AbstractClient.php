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
    
    public abstract function search($meterCode, $meterType = null) : string;
    
    public abstract function buy(array $params) : string;
    
    public abstract function getMaintenanceCode($meterCode, $type, $meterType = null) : string;
    
    public function getClientName()
    {
        return class_basename($this);
    }
}
