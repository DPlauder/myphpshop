<?php

require dirname(__DIR__, 2) . "/src/bootstrap.php";
use Dp\Webshop\Helper\Renderer;

use function Dp\Webshop\Helper\redirect;

$articlenum = filter_input(INPUT_GET, 'articlenum');
$categories = $shop->getCategory()->fetchAll();


$product = [
    'articlenum'    => $articlenum,
    'title'         => '',
    'description'   => '',
    'price'         => 0,
    'category'      => '',
    'creator'       => ''
];


if($articlenum){
    $product = $shop->getProduct()->fetchProductByArticlenum($articlenum);
};

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $product['articlenum']     = filter_input(INPUT_POST, 'articlenum');
    $product['title']           = filter_input(INPUT_POST, 'title');
    $product['description']     = filter_input(INPUT_POST, 'description');
    $product['price']           = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $product['category']       = filter_input(INPUT_POST, 'category');
    $product['creator']         = $session->id;

    //TODO hier validations $errors

    //$problems = implode($errors)
    //if(!problems)

    $bindings = $product;

    if($product['articlenum']){
        $bindings['articlenum'] = $product['articlenum'];
        $shop->getProduct()->update($bindings);
    }
    else{
        $shop->getProduct()->push($bindings);
    }
    redirect('products.php');
}


Renderer::renderAdmin(ROOT_PATH . '/public/admin/views/product.view.php',[
    'navigation' => $navigation_admin,
    'product' => $product,
    'categories' => $categories
]);