<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use function Dp\Webshop\Helper\redirect;
use function Dp\Webshop\Helper\combine;


$category = filter_input(INPUT_GET, 'category') ? $_GET['category'] : '' ;
$articlenum = filter_input(INPUT_GET, 'articlenum') ? $_GET['articlenum'] : '';

$data = ['articlnum' => $articlenum, 'user_uuid' => $session->id, 'anzahl' => 1];

if($session->id){
    
    //$shop->getCartHandler()->pushToCart($articlenum, $session->id);
}
else{
    if(empty($session->cart)){
      $_SESSION['cart'][$articlenum] = $data;
    }
    else{
        if(array_key_exists($articlenum, $session->cart)){
            $_SESSION['cart'][$articlenum]['anzahl'] += 1;
        }
        else{
            $_SESSION['cart'][$articlenum] = $data;
        }
    }
}

if($category){
    redirect('/public/category.php', ['category' => $category]);
}
else
{
    redirect('/public/product.php', ['articlenum' => $articlenum]);
}