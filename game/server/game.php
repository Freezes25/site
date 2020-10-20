<?php 
    session_start();
    require_once('db.php');
    $score = $_POST['score'];
    $id = $_SESSION['users']['id'];
    $sql = 'UPDATE `users` SET `score` = ? WHERE `users`.`id` = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$score,$id]);
    header('Location: ../game.php');
?>