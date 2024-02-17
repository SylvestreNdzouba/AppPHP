<?php
session_start();

if (!array_key_exists('login', $_SESSION)) {
    header("Location: forms/login.php");
}
require_once(dirname(__FILE__) . '/../models/Order.php');

$orders = Order::getList();

?>

<style>
    h1 {
        pointer-events: none;
        text-decoration: none;
    }
</style>

<h1>Historique des commandes</h1>
<a href="/projet/forms/orderForm.php">Nouvelle commande</a>
<section id="commande-section">
    <?php if (empty($orders)) : ?>
        <small>Aucunes commandes pour le moment</small>
    <?php else : ?>
        <?php foreach ($orders as $order) : ?>
            <article class="orders-article">
                <h3>Commande N° <?php echo $order->getId() ?> Le <?php echo $order->getDate() ?></h3>
                <p>Article commandé : <?php echo $order->getProductName() ?></p>
                <p>Au prix de : <?php echo $order->getProductPrice() ?> €</p>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<!-- <p>Le <?php echo $order->getDate() ?></p> -->