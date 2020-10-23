<?php 
session_start();
unset($_SESSION['users']);
header('Location: ../sigin.php');
?>