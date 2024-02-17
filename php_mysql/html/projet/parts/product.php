<?php
session_start();

if (!array_key_exists('login', $_SESSION)) {
    header("Location: forms/login.php");
}
require_once(dirname(__FILE__) . '/../models/Product.php');
$products = Product::getList();

?>

<h1>Voici tous nos produits</h1>
<section id="produit-section">
    <?php if (empty($products)) : ?>
        <small>Aucuns produits dans le catalogue pour le moment</small>
    <?php else : ?>
        <?php foreach ($products as $product) : ?>
            <a href="productList.php?product-id=<?= $product["id"]; ?>">
                <article class="product-article">
                    <h3><?php echo $product["name"] ?> <?php echo $product["price"] ?> €</h3>
                </article>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</section>