<?php

require_once "../database/User.php";
session_start();

$user = new User();

// $user->signup($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['login']);
$result = $user->signup($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['login']);

if (!isset($result['error_valid'])) {
    header("Location: /signin.php");
}
else {
    $_SESSION['error_valid'] = $result['error_valid_text']; 
    header("Location: /signup.php");
}