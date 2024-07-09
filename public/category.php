<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

$title = "Kategorien";

$category = filter_input(INPUT_GET, 'category');

$products = $shop->getProduct()->fetchProductsByCategory($category);

Renderer::render(ROOT_PATH . '/public/views/category.view.php', [
    'title'         => $title,
    'products'      => $products,
    'navigation'    => $navigation,
    'categories'    => $categories
]);