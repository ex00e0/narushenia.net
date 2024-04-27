<?php
  session_start();
  $check = isset($_SESSION['id_user']) ? true : false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/bootstrap.min.js" async defer></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="/">Нарушениям.НЕТ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
              <?php if($check) { ?>

              <li class="nav-item">
                Вы вошли как <?=$_SESSION['name']?>!
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">Личный кабинет</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/signout.php">Выход</a>
              </li>

              <?php }else{ ?>

              <li class="nav-item">
                <a class="nav-link" href="/signin.php">Вход</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/signup.php">Регистрация</a>
              </li>

              <?php }?>

            </ul>
          </div>
        </div>
      </nav>
    
</body>
</html>