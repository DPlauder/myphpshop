<?php

require dirname(__DIR__, 2) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;
use function Dp\Webshop\Helper\redirect;

$articlenum = filter_input(INPUT_GET, 'articlenum');

if($articlenum){
    $shop->getProduct()->fetchProductByArticlenum($articlenum);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $articlenum = filter_input(INPUT_POST, 'articlenum');

    $shop->getProduct()->delete($articlenum);

    redirect('products.php');
}

Renderer::renderAdmin(ROOT_PATH . '/public/admin/views/product-delete.view.php',[
    'navigation' => $navigation_admin,
    'articlenum' => $articlenum
]);