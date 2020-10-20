<?php 
session_start();
require_once('server/db.php');
if(!$_SESSION['users']){
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
    <span>Ваш счет: <input readonly class="scoreGame" name="scoreGame"></span>
    </div>
    <button type="submit" class="btn_game">Перезапустить?</button>
</form>
<canvas id="canv" width="608px" height="608px" style="border: 2px solid red; margin: 0 auto; display: block; cursor: pointer;">
</canvas>
    <script src="script/game.js"></script>
    <script src="script/jquery.js"></script>
</body>
</html>