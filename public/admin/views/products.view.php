<?php use Dp\Webshop\Helper\Renderer; ?>

<main>
    <table>
       <a type="button" href="product.php">Neues Produkt erstellen</a>
    <?php if(!empty($products)): ?>
    <table>
        <thead>
            <tr>
            <th scope="col">Artikel</th>
            <th scope="col">Preis</th>
            <th scope="col">Kategorie</th>
            <th scope="col">Optionen</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($products as $item): ?>
            <tr>
                <th scope="row"><?= Renderer::e($item['title']) ?></th>
                <td scope="row"><?= Renderer::e($item['price']) ?></td>
                <td scope="row"><?= Renderer::e($item['category']) ?></td>
                <td scope="row">
                    <a href="product.php?articlenum=<?= Renderer::e($item['articlenum']) ?>">Bearbeiten</a>
                    <a href="product-delete.php?articlenum=<?= Renderer::e($item['articlenum']) ?>">Löschen</a>
                </td>             
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php else: ?>
        <h1>Keine Artikel gefunden</h1></td>
    <?php endif; ?>
    </table>
</main>