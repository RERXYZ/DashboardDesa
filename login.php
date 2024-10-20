<?php
session_start();
require 'config.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id= $_COOKIE['id'];
    $key= $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if( $key === hash('sha256', $row['email'])){
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION["login"])){
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");

    if(mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"])){

            //set session
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            //cek remember me
            if( isset($_POST['remember']) ){
                setcookie('id', $row['id'], time() + 600000);
                setcookie('key', hash('sha256', $row['email']), time() + 600000);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="login.css">
</head>
<body oncopy="return false;" oncut="return false;" onpaste="return false;">
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="container">
        <form action="" method="post" class="wrapper">
            <div class="logo">
                <img src="img/imgstatic/logo.png" alt="">
            </div>
            <div class="title">
                <h5>Login</h5>
            </div>
            <div class="content">
                <label class="judul" for="email">Email<span>*</span></label>
                <input class="isi" type="email" name="email" id="email" autocomplete="off">
                <label class="judul" for="password">Password<span>*</span></label>
                <input class="isi" type="password" name="password" id="password" autocomplete="off">
                <div class="rememberpassword">
                    <div class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" name="login">Login</button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($error)): ?>
        <div class="toast">
            <div class="toast-content">
                <i class="uil uil-exclamation-triangle"></i>
                <div class="message">
                    <p class="text">Tidak bisa login !!</p>
                    <p class="text">username/password salah</p>
                </div>
            </div>
            <i class="uil uil-times close"></i>
            <div class="progress"></div>
        </div>
    <?php endif; ?>
    <script src="login.js"></script>
</body>
</html>