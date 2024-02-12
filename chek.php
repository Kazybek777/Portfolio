<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);


if(mb_strlen($login) < 5 || mb_strlen($login) >30){
    echo "Недопистимая длина логина";
    exit();
}   else if(mb_strlen($name) < 3 || mb_strlen($name) >30){
        echo "Недопистимая длина Имени";
        exit();
}   else if(mb_strlen($pass) < 2 || mb_strlen($pass) >10){
        echo "Недопистимая длина пароля";
        exit();
}


$mysql = new mysqli('localhost','root','','register-bd');
$mysql->query("INSERT INTO `users` ( `login`, `name`, `pass`) 
VALUES('$login', '$name', '$pass')");
$mysql->close();
header('Location: /')
?>