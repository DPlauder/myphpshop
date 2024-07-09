<?php use Dp\Webshop\Helper\Renderer; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>My Shop</title>
</head>

<body>
    <header class="container">
        <nav>
            <a href="#">
                <h1>My Shop</h1>
            </a>

            <ul>
            <?php foreach ($navigation as $linkname => $link) : ?>
                <li>
                    <?php if($linkname === 'Kategorien'): ?>
                        <details class="dropdown">
                            <summary>
                                <?= Renderer::e($linkname); ?>
                            </summary>
                            <ul dir="rtl">
                                <?php foreach($categories as $category): ?>
                                    <li><a href="./category.php?category=<?=Renderer::e($category['name']) ?>"><?= Renderer::e($category['name'])?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </details>
                    <?php else: ?>
                        <a href="<?= Renderer::e($link) ?>"><?= Renderer::e($linkname) ?></a>
                    <?php endif; ?>
                </li>            
            <?php endforeach; ?>
            <?php if(isset($_SESSION['id'])) : ?>
                
                <li>
                    <details class="dropdown">
                        <summary>
                        <?= Renderer::e($_SESSION['firstname']); ?>
                        </summary>
                        <ul dir="rtl">
                            <li><a href="./admin/admin.php">Adminbereich</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </details>
                </li>
            <?php else : ?>
                <li>
                    <a href="login.php">Login</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>