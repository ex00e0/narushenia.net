<?php
require_once "../database/User.php";

session_start();

$user = new User();

$result = $user->signin($_POST['login'], $_POST['password']);

if(!isset($result['error_valid'])){
    $_SESSION['user_role'] = $result['role'];
    $_SESSION['id_user'] = $result['id_user'];
    $_SESSION['name'] = $result['name'];
    header("Location: /");
    var_dump($result);
}

// echo $_SESSION['id_user'];
?>