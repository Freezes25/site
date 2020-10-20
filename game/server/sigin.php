<?php

session_start();
if($_SESSION['users']){
    header('../game.php');
}
require_once('db.php');
$login = $_POST['login'];
$password = $_POST['password'];
$error_fields = [];
if($login === ''){
    $error_fields[] = 'login';
}
if($password === ''){
    $error_fields[] = 'password';
}

if(!empty($error_fields)){
    $respons =[
        "status" => false,
        "type" => 1,
        "fields" => $error_fields,
        "message" => 'Проверьте правильность полей'
    ];
    echo json_encode($respons);
    die();
}
$password = md5($password);
$sql = "SELECT * FROM `users` WHERE `password` = '$password' AND `login` = '$login'";
$query = $pdo->query($sql);

if($query->rowCount() > 0){
    $users = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['users'] = [
        'login' => $users['login'],
        'name'=>$users['name'],
        'email'=>$users['email'],
    ];
    $respons = [
        'status'=>true,
    ];
    echo json_encode($respons);
}else{
    $error_fields[] = 'login';
    $error_fields[] = 'password';
    $respons = [
        'type'=> 1,
        'status' => false,
        'message' => 'Неправильный логин или пароль',
        'fields' => $error_fields
    ];
    echo json_encode($respons);
}


?>