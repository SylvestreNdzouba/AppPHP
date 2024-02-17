<?php
require_once(dirname(__FILE__) . '/../models/Product.php');
$products = Product::getList();
?>

<h1>Sélectionnez un produit :</h1>
<form action="/projet/handlers/createOrder.php" method="post">
    <?php foreach ($products as $product) : ?>
        <input type="radio" id="product<?= $product["id"] ?>" name="product_id" value="<?= $product["id"] ?>">
        <label for="product<?= $product["id"] ?>"><?= $product["name"] ?> - <?= $product["price"] ?> €</label>
        <input type="hidden" name="product_name<?= $product["id"] ?>" value="<?= $product["name"] ?>">
        <input type="hidden" name="product_price<?= $product["id"] ?>" value="<?= $product["price"] ?>">
        <br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Commander</button>
</form>