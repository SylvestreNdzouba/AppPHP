<?php
session_start();

if (!array_key_exists('login', $_SESSION)) {
    header("Location: forms/login.php");
}

require_once(dirname(__FILE__) . '/../models/Product.php');

$productId = $_GET['product-id'];
$product = Product::get($productId);
?>

<h3><?php echo $product->getName() ?> <?php echo $product->getPrice() ?> €</h3>
<p><?php echo $product->getDescription() ?></p>