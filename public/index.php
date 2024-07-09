<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;

$title = 'My Shop';
$output = 'Hier entsteht mein Shop';

$products = $shop->getProduct()->fetchAll();
$categories = $shop->getCategory()->fetchAll();


/*  $data = [
    'firstname' => 'Max',
    'lastname' => 'Muster',
    'email' => 'test@test.com',
    'password' => 'test1234',
    'role' => 'admin'
];
$shop->getUser()->push($data);  */
//$shop->getUser()->delete('71cf5789-45e1-46a1-bfb9-eefe97fe9b81');
 /* 
$data = [
    'name' => 'Hosen',
    'description' => 'Kategorie für Hosen'
];
$shop->getCategory()->push($data);
 */
/* 
$data = [
    'title' => 'nike zoom 100',
    'description' => 'nike Schuhe rot..',
    'price' => 100.10,
    'category' => 'Schuhe',
    'creator' => '204b2af9-afce-4150-94eb-2502d1f6957d'
];
$shop->getProduct()->push($data);
*/


Renderer::render(ROOT_PATH . '/public/views/index.view.php', [
    "title" => $title,
    "output" => $output,
    'products' => $products,
    'categories' => $categories,
    'navigation' => $navigation,
]);

