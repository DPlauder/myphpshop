<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

$title = 'My Shop';
$output = 'Hier entsteht mein Shop';
var_dump($shop);
exit;
$products = $shop->getProduct()->fetchProducts();

Renderer::render(ROOT_PATH . '/public/views/index.view.php', [
    "title" => $title,
    "output" => $output,
    'products' => $products
]);
