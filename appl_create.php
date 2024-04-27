<?php

    require_once "header.php";

?>

<main>
    <div class="container">
        <h1>Создание заявления</h1>
    </div>
    <br>
    <form action='./application/create-db.php' method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите гос. номера авто</label>
    <input type="text" class="form-control" id="car_num" name='car_num'>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Введите описание</label>
    <!-- <input type="password" class="form-control" id="description" name='description'> -->
    <textarea name="description" class="form-control" id='floatingTextaea' cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
  <!-- <div class="form-text">Нет аккаунта? <a href="/signup.php">Отправить</a></div> -->
</form>
</main>