<?php
$user = isset($_GET['user']) ? $_GET['user'] : '';
$pass = isset($_GET['password']) ? $_GET['password'] : '';

if (empty($user) || empty($pass)) {
    echo "wrong query input";
    header('HTTP/1.0 404 Not Found');
    exit();
}

$saveuser = 'user';
$savepass = 'pass';

if (strcmp($user, $saveuser) == 0 && strcmp($pass, $savepass) == 0) {
    echo "Username and Password OK";
} else {
    echo "Username or Password wrong";
    header('HTTP/1.0 404 Not Found');
    exit();
}

?>