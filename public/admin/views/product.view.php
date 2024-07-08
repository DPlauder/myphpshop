<?php use Dp\Webshop\Helper\Renderer; ?>
<main>
    <form action="product.php" method="post">
        <div>
            <input type="hidden" name="articlenum" id="articlenum" value="<?= Renderer::e($product['articlenum'] ?? '') ;?>">
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" value="<?= Renderer::e($product['title']) ?>">
            <label for="description">Beschreibung</label>
            <input type="textbox" id="description" name="description" value="<?= Renderer::e($product['description']) ?>">
            <label for="price">Preis</label>
            <input type="float" id="price" name="price" value="<?= Renderer::e($product['price']) ?>">
            <label for="category">Kategorie</label>
            <select name="category" id="category">
                <option>Wähle Kategorie</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?= Renderer::e($category['name']) ?>"<?= $category['name'] === $product['category'] ? 'selected' : ''; ?>> <?= Renderer::e($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="send">
        </div>
    </form>
</main>