<?php
require_once(dirname(__FILE__) . '/../models/Order.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo 'Il faut envoyer des données en POST';
    exit();
}

if (!isset($_POST["product_id"])) {
    echo 'Aucun produit sélectionné';
    exit();
}

$product_id = $_POST["product_id"];

$product_name = isset($_POST["product_name$product_id"]) ? $_POST["product_name$product_id"] : "";
$product_price = isset($_POST["product_price$product_id"]) ? $_POST["product_price$product_id"] : "";

$order = new Order();
$result = $order
    ->setProductName($product_name)
    ->setProductPrice($product_price)
    ->setDate()
    ->save();

if ($result) {
    header("Location: /projet/index.php");
} else {
    echo "Erreur lors de la création de la commande";
}
