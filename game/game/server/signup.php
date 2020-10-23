<?php

// use function PHPSTORM_META\type;

require("db.php");
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$repeat_password = $_POST['repeat_password'];
$name = $_POST['name'];
$error_fields = [];
if($login === ''){
    $error_fields[] = 'login';
}
if($password === ''){
    $error_fields[] = 'password';
}
if($repeat_password === ''){
    $error_fields[] = 'repeat_password';
}
if($email === ''){
    $error_fields[] = 'email';
}
if($name === ''){
    $error_fields[] = 'name';
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error_fields[] = 'email';
}
$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
$query = $pdo->query($sql);
if($query->rowCount() > 0){
    $error_fields[] = 'login';
}
if(!empty($error_fields)){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

       $errorMessage = 'Email введен не верно';

    }else if($query->rowCount() > 0){
        $errorMessage = 'Такой логин уже есть';
    } 
    else{
        $errorMessage = 'Проверьте правильность полей';
    }
    $respons = [
        'type' => 1,
        'status' => false,
        'fields' => $error_fields,
        'message' => $errorMessage
    ];
    echo json_encode($respons);
    die();
}
// проверка 
if($password === $repeat_password){
    $password = md5($password);
    $respons = [
        'status'=>true
    ];
    echo json_encode($respons);
    $sql = 'INSERT INTO `users` (`login`, `name`, `password`, `email`) VALUES (:login, :name, :password, :email)';
    $query = $pdo->prepare($sql);
    $query->execute([
        'login' => $login,
        'name' => $name,
        'password' => $password,
        'email' => $email
    ]);
    
}else{ 
    $error_fields[] = 'password';
    $error_fields[] = 'repeat_password';
    $respons = [
        'type' => 1,
        'status' => false,
        'message' => 'Пароли не совпадают',
        'fields' => $error_fields
    ];
    echo json_encode($respons);
}
?>