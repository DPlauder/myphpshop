<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

$output = 'Shopping-Cart';
if($session->id){
    $cart = $shop->getCart()->fetchAllByUserId($session->id);
}
else{
    $cart = $session->cart;
}


Renderer::render(ROOT_PATH . '/public/views/cart.view.php',[
    'navigation' => $navigation,
    'categories' => $categories,
    'cart'      => $cart
]);