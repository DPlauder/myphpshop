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

$products = [];

if(!empty($cart)){
    foreach($cart as $item){
        $product = $shop->getProduct()->fetchProductByArticlenum($item['articlenum']);
        $product['anzahl'] = $item['anzahl'];
        $product['gesamtpreis'] = $product['anzahl'] * $product['price'];
        $products[] = $product;
    }
}


Renderer::render(ROOT_PATH . '/public/views/cart.view.php',[
    'navigation' => $navigation,
    'categories' => $categories,
    'products'      => $products
]);