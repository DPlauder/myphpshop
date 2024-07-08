<?php use Dp\Webshop\Helper\Renderer; ?>

<main>
    <form action="product-delete.php" method="POST">
        <input type="hidden" name="articlenum" id="articlenum" value="<?= Renderer::e($articlenum ?? '') ;?>">
        <h2>Willst du dieses Produkt wirklich löschen</h2>
        <input type="submit" value="Ja">
        <a type="button" href="products.php">NO</a>
    </form>
</main>