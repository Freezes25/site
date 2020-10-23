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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/sigup.min.css">
    <title>Document</title>
</head>
<body>
    <div class="bacground_sigup">
    <!-- Form sigin  -->
    <form>
    <div class="title">Регистрация</div>
    <label>Логин</label>
    <input type="text" name="login">
    <label>Пароль</label>
    <input type="password" name="password">
    <label>Повторите пароль</label>
    <input type="password" name="repeat_password">
    <label>Почта</label>
    <input type="email" name="email">
    <label>Ваше имя</label>
    <input type="text" name="name">
    <button type="submit" class="btn_signup">Войти</button>
    <div class="registration">У вас есть аккаунт?<a href="sigin.php" style="color: white;">Авторизация</a></div>
    <p class="error_message none">Lorem ipsum dolor sit amet.</p>
    </form>
    </div>
    <script src="script/jquery.js"></script>
    <script src="script/ajax.js"></script>
</body>
</html>
