<?php

namespace App;

class Config
{
    private static $instance;
    public $data;
    
    public static function getObject()
    {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new self;
            $config_file = __DIR__ . '/Other/config.ini';
            self::$instance->data = parse_ini_file($config_file, true);
            return self::$instance;
        }
    }
    
    private function __construct() {
    }
}