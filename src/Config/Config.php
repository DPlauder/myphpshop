<?php

namespace Dp\Webshop\Config;

class Config{
    const DB_TYPE = "mysql";  
    const DB_HOST = 'localhost';
    const DB_PORT = '3306';
    const DB_NAME = 'my_shop';
    const DB_USER = 'my_shop';
    const DB_PASSWORD = ''; 
    

    public function __construct()
    {
        define('ROOT_PATH', dirname(__DIR__,2));
    }

    public static function getDsn() : string {

        return sprintf("%s:host=%s;dbname=%s",  self::DB_TYPE, self::DB_HOST,self::DB_NAME); 
    }
}
