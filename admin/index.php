<?php

session_start();
// var_dump($_SESSION);

require_once "../header.php";
require_once "../database/Application.php";

if(!isset($_SESSION['id_user'])){
    header('Location:/signin.php');
}
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$application = new Application;

$all_application = $application->get_applications_admin();
$status = ['Новая','Принята','Отклонена'];
?>

<main>

    <div class="container">
        <h1>Панель администратора</h1>
       
        
            <?php 
                if(isset($message)){
                    echo "<div class='alert alert-success' role='alert'>".$message."</div>";
                }
            ?>
        <h2>Заявки пользователей</h2>

        <?php
            if(count($all_application) != 0){
                foreach($all_application as $appl){
                    $statusZ = $status[$appl[3]];
                    echo "
                    
                    <div class='card'>
                    <h5 class='card-header'>Заявка №$appl[0]</h5>
                    <div class='card-body'>
                        <p class='card-text'>Номер авто : $appl[1]</p>
                        <p class='card-text'>Текст заявки :$appl[2]</p>
                    </div>
                    <div class='card-footer text-body-secondary d-flex justify-content-between align-items-center'>
                        <div>Статус: <span class='fst-italic'>$statusZ</span></div>";
                        if ($appl[3]==0) {
                        echo "
                        <div class='btn-group align-items-center' role='group' aria-label='Простой пример'>
                            <p><a href='status_update.php?id=$appl[0]&status=1' class='btn btn-success' >Принять</a></p>
                            <p><a href='status_update.php?id=$appl[0]&status=2' class='btn btn-danger'>Отклонить</a></p>
                        </div>"; } 
                    echo "
                    </div>
                    </div>
                    <br>
                    
                    ";
                }
            }
            else{
                echo "<h5>Нет заявок! </h5>";
            }
        ?>
    </div>
</main>