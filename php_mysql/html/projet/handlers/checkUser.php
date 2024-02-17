<?php
require_once(dirname(__FILE__) . '/../models/User.php');

$login = filter_var($_POST['loginLog'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mdp = $_POST['mdpLog'];

$user = User::getUser($login);
$hashPassword = $user->getPassword();
var_dump($hashPassword);

if (password_verify($mdp, $hashPassword)) {
    session_start();
    $_SESSION['login'] = $user->getLogin();
    header("Location: /projet/index.php");
    exit();
} else {
    var_dump($user->getLogin());
    echo 'Identifiants incorrects';
    exit();
}
