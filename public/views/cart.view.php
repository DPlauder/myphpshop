<?php use Dp\Webshop\Helper\Renderer; ?>

<main>
    <?php if(!empty($products)): ?>
    <table>
        <thead>
            <tr>
            <th scope="col">Artikel</th>
            <th scope="col">Einzelpreis</th>
            <th scope="col">Anzahl</th>
            <th scope="col">Gesamt</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($products as $item): ?>
            <tr>
                <th scope="row"><?= Renderer::e($item['title']) ?></th>
                <td scope="row"><?= Renderer::e($item['price']) ?></td>
                <td scope="row"><?= Renderer::e($item['anzahl']) ?></td>
                <td scope="row"><?= Renderer::e($item['gesamtpreis'])?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php else: ?>
        <h1>Keine Artikel im Cart</h1></td>
    <?php endif; ?>
</main>