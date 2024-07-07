<?php

require dirname(__DIR__, 2) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

$products = $shop->getProduct()->fetchProductsByUser($session->id);

Renderer::renderAdmin(ROOT_PATH . '/public/admin/views/products.view.php',[
    'navigation' => $navigation_admin,
    'products' => $products
]);