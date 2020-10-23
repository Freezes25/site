<?php
session_start();
require_once('server/db.php');

//Твой метод проверки на версии php 7.4 выдает ошибку, лучше использовать проверку на наличие ключа

if(!array_key_exists('users',$_SESSION)){
    header('Location: sigin.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/game.min.css">
</head>
<body>
<header>
<a href="server/exit.php">Выйти</a>
</header>
<form class="endGame" method="POST" action="server/game.php">

    <label>Вы проиграли</label>
    <div class="score">
    <span>Ваш счет: <input readonly class="scoreGame" name="score"></span>
    </div>
    <button type="submit" class="btn_game">Перезапустить?</button>
</form>
<canvas id="canv" width="608px" height="608px" style="border: 2px solid red; margin: 0 auto; display: block; cursor: pointer;">
</canvas>
    <!--Всегда сначала подключаются библиотеки, а потом собственные скрипты, у тебя сначала подключался game.js, а потом jquery-->
    <script src="script/jquery.js"></script>
    <script src="script/game.js"></script>
</body>
</html>
