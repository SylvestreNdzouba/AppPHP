<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: forms/login.php");
exit;
