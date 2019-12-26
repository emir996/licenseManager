<?php 
require_once 'includes/class-autoload.inc.php';

$register = new Register();
$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_register'])){
    $registerCheck = $register->registerUser();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login'])){
    $loginUser = $user->login();
}

?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>License Manager</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        </head>
    <body>

    <header>
        <a href="#">License Manager</a>
        <nav>
            <ul class="nav_links">
                <li><a href="index.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>