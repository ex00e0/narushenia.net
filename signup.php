<?php

// echo "signup";

require_once "header.php";

?>

<main>
    <div class="container">
        <h1>Регистрация</h1>
    </div>
    <br>
    <form action='/user/signup-db.php' method='post'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Телефон</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Адрес эл.почты</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Логин</label>
        <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary">Войти</button>

    <div class="form-text">Уже есть аккаунт? <a href="/signin.php">Войдите</a></div>
    </form>
</main>