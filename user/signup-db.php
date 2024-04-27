<?php

require_once "../database/User.php";

$user = new User();

$user->signup($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['login']);
var_dump($user->signup($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['login']));

?>