<?php
session_start();
//Твой метод проверки на версии php 7.4 выдает ошибку, лучше использовать проверку на наличие ключа
if(array_key_exists('users',$_SESSION)){
    header('location: ../game.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/sigin.min.css">
</head>
<body>
    <div class="bacground_sigin">
    <!-- Form sigin  -->
    <form>
    <div class="title">Авторизация</div>
    <label>Логин</label>
    <input type="text" name="login">
    <label>Пароль</label>
    <input type="password" name="password">
    <button type="submit" class="btn_sigin">Войти</button>
    <div class="registration">У вас нет аккаунта? <a href="signup.php" style="color: white;">Зарегистрироваться</a></div>
    <p class="error_message none">Lorem ipsum dolor sit amet.</p>
    </form>
    </div>
    <script src="script/jquery.js"></script>
    <script src="script/ajax.js"></script>
</body>
</html>
