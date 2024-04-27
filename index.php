<?php

session_start();
var_dump($_SESSION);

require_once "header.php";
require_once "./database/Application.php";

if(!isset($_SESSION['user_check'])){
    // header('Location:/signin.php');
}
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$application = new Application;

$all_application = $application->get_applications_user();
$status = ['Новая','Принята','Отклонена'];
?>

<main>

    <div class="container">
        <h1>Личный кабинет</h1>
        <div class="mb-3">
            <button type='button' class="btn btn-info">
                <a href='/appl_create.php' class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                    Подать заявление
                </a>
            </button>
        </div>
        
            <?php 
                if(isset($message)){
                    echo "<div class='alert alert-success' role='alert'>".$message."</div>";
                }
            ?>



            
            
        
        <h2>Мои заявки</h2>

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
                    <div class='card-footer text-body-secondary'>
                        Статус:<span class='fst-italic'>$statusZ</span>
                    </div>
                    </div>
                    <br>
                    ";
                }
            }
            else{
                echo "<h5>У вас пока нет завок! </h5>";
            }
            // get_applications_user();

        ?>
    </div>

</main>