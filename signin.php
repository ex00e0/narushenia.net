<?php

// echo "signin";

require_once "header.php";

?>

<main>
    <div class="container">
        <h1>Авторизация</h1>
    </div>
    <br>
    <form action='/user/signin-db.php' method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name='login'>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="password" name='password'>
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
  <div class="form-text">Нет аккаунта? <a href="/signup.php">Зарегистрируйтесь</a></div>
</form>
</main>
