<?php

namespace App;

class Config {
    private $config;
    public $data;
    public function __construct() {
        $this->config = __DIR__ . '/Other/config.ini';
        $this->data = parse_ini_file($this->config, true);
        return $this->data;
    }
}