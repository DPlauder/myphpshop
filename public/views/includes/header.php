<?php use Dp\Webshop\Helper\Renderer; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>My Shop</title>
</head>

<body>
    <header class="bg-white border-gray-200 dark:bg-gray-900 border-b-4">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1>My Shop</h1>
            <ul>
            <?php foreach ($navigation as $linkname => $link) : ?>
                <li>
                    <a href="#"><?= Renderer::e($linkname) ?></a>
                </li>            
            <?php endforeach; ?>
            </ul>
        </div>
    </header>