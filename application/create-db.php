<?php 

require_once "../database/Application.php";
session_start();
$application = new Application();

if($application->create($_POST['car_num'], $_POST['description'])){
    $_SESSION['message'] = 'Заявка создана!';
    header('Location:/');
}
// var_dump($application->create($_POST['car_num'], $_POST['description']));
?>