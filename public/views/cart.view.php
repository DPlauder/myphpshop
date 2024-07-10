<?php use Dp\Webshop\Helper\Renderer; ?>

<main>
    <?php if(!empty($cart)): ?>
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
        <?php foreach($cart as $item): ?>
            <tr>
                <th scope="row">TEST</th>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php else: ?>
        <h1>Keine Artikel im Cart</h1></td>
    <?php endif; ?>
</main>