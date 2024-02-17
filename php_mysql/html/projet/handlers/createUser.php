<?php
require_once(dirname(__FILE__) . '/../models/User.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo 'Il faut envoyer des données en POST';
    exit();
}

if (empty($_POST["login"]) || empty($_POST["mdp"])) {
    echo 'Le login et le mot de passe ne peuvent pas être vide';
    exit();
}

$hashedPassword = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

$user = new User();
$result = $user
    ->setLogin(filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setPassword($hashedPassword)
    ->save();

if ($result) {
    session_start();
    $_SESSION['login'] = $user->getLogin();
}
header("Location: /projet/index.php");
