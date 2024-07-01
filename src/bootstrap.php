<?php

require "../autoloader.php";

use Dp\Webshop\Config\Config;
use Dp\Webshop\Shop\Shop;

(new Config());

$shop = new Shop(Config::getDsn(),Config::DB_USER,'');
