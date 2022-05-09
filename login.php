<?php
session_start();
require 'functions.php';


//cek kookie
if(isset($_COOKIE['id_user']) && isset($_COOKIE['key']) ){
        $id_user = $_COOKIE['id_user'];
        $key = $_COOKIE['key'];


        //ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id_user = $id_user");
        $row = mysqli_fetch_assoc($result);

        //cek kookie dan usernajme
        if($key === hash('sha256', $row['username']) ){
            $_SESSION['login']=true;

        }

    }


if(isset ($_SESSION["login"])){
    header("Location: menu.php");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    //cek username
    if(mysqli_num_rows($result)===1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST['remember']) ){
                //buat cookie
                //enkripsi 
                setcookie('id_user', $row['id_user'], time()+60); 
                setcookie('key', hash('sha256', $row['username']), time()+60 );
            }


            header("Location: menu.php");
            exit;
        }
    }

    $error = true;
}

// require 'functions.php';

// if( isset($_POST["login"])){
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

//     //cek username
//     if(mysqli_num_rows($result)===1){

//         //cek password
//         $row = mysqli_fetch_assoc($result);
//         if (password_verify($password, $row["password"])) {
//             header("Location: index.php");
//             exit;
//         }
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylepage2.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman Login | Sistem Informasi Toko Almas</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" >Toko Almas</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        </nav>
    </header>
<div class="form">
    <h4 style="margin-top: 20px; margin-bottom: 0px;">LOG IN</h4><br>
    <?php if(isset($error)) : ?>
    <p style ="color:red; font-style:italic;">incorrect password or username</p>
    <?php endif; ?>
    <form action="" method="post">
    <ul>
        <label for="username">Username : </label><br>
        <input type="text" name="username" id="username" autocomplete="off">
    <br>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password" autocomplete="off">
    <br>
        <input type="checkbox" name="remember" id="remember">
        <form action="remember" style="font-size:12px;">remember me?</form>
    <br>
        <button type="submit" name="login">log in </button>
    </ul>
        <p class="message"> not registered yet? <a href="registrasi.php">sign up</a></p>
    </form>
</div>
</body>
<footer>
        <div class='footer-left' style="text-align: center;">
          Copyright 2021 &#169;  &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>