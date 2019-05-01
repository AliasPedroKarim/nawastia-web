<?php


namespace App;


class Config{
    private $setting = [];

    private static $_instance;

    public static function getInstance(){
        if (is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    public function __construct(){
        $this->setting = require dirname(__DIR__) . '/config/config.php';
    }

    public function get($key){
        if (!isset($this->setting[$key])){
            return null;
        }
        return $this->setting[$key];
    }
}