<?php use Dp\Webshop\Helper\Renderer; ?>

<main>
    <?php if(!empty($products)): ?>
    <table>
        <thead>
            <tr>
            <th scope="col">Artikel</th>
            <th scope="col">Artikelnummer</th>
            <th scope="col">Preis</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($products as $item): ?>
            <tr>
                <th scope="row"><?= Renderer::e($item['title']) ?></th>
                <td scope="row"><?= Renderer::e($item['articlenum']) ?></td>
                <td scope="row"><?= Renderer::e($item['price']) ?></td>
                <td scope="row"><a type="button" href="addToCart.php?category=<?= Renderer::e($item['category']); ?>&articlenum=<?= Renderer::e($item['articlenum']) ?>">+</a>
                </td>
                
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php else: ?>
        <h1>Keine Artikel der Kategorie zugeordnet</h1></td>
    <?php endif; ?>
</main>