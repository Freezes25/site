<?php
$dblogin = 'root';
$dbpassword = 'root';
$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$dsn = 'mysql:host=localhost;dbname=game;charset=utf8';
try{
    $pdo = new PDO($dsn,$dblogin, $dbpassword, $option);
}catch(PDOException $e){
    die('Не удалось подключиться к базе данных');
}
