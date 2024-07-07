<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

Renderer::render(ROOT_PATH . '/public/views/cart.view.php',[
    'navigation' => $navigation
]);


$output = 'Shopping-Cart';
if(!empty($session->cart)){
    $cart = $shop->getCart()->fetchAllByUserId($session['id']);
}
else{
    $cart = $session->cart;
}
