<?php

require dirname(__DIR__) . "/autoloader.php";
require dirname(__DIR__) . "/src/Helper/functions.php";

use Dp\Webshop\Config\Config;
use Dp\Webshop\Shop\Shop;

(new Config());

$shop = new Shop(Config::getDsn(),Config::DB_USER,'');
$navigation = [
    'Home'          => 'index.php',
    'Categories'    => '',
    'Cart'          => 'cart.php'];

    $navigation_admin = [
        'Home' => '../index.php',
        'Produkte' => 'products.php',
        'Kategorien' => ''
    ];
$session = $shop->getSession();


//var_dump($_SESSION);
//var_dump($shop->getSession());

