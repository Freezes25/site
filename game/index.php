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
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
<section class="main_menu">
    <div class="panel_menu">
        <div class="title">Начни играть с нами</div>
        <a href="sigin.php" class="btn_sigin"><button>Авторизация</button></a>
        <a href="signup.php" class="btn_sigup"><button>Регистрация</button></a>
        <div class="logo">Game</div>
    </div>
</section>
</body>
</html>
