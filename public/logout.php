<?php

use function Dp\Webshop\Helper\redirect;

require dirname(__DIR__) . "/src/bootstrap.php";

$shop->getSession()->destroySession();
redirect('index.php');