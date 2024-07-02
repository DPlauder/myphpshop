<?php

require "../autoloader.php";
require "../src/Helper/functions.php";

use Dp\Webshop\Config\Config;
use Dp\Webshop\Shop\Shop;

(new Config());

$shop = new Shop(Config::getDsn(),Config::DB_USER,'');
$navigation = [
    'Home'          => '',
    'Categories'    => '',
    'Cart'          => ''];
