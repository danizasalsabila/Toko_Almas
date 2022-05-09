<?php

require 'functions.php';

 if( isset($_POST["registrasi"])) {
     if(registrasi($_POST) > 0) {
         echo "<script>
                alert('user berhasil ditambahkan');
                </script>";
                header("Location: menu.php");
        exit;
     }else{
         echo mysqli_error($conn);
     }      
 }

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
    <title>Halaman Registrasi | Sistem Informasi Toko Almas</title>
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
    <h4 style="margin-top: 20px; margin-bottom: 0px;">SIGN UP</h4><br>
    <form>
        <label for="username">username : </label>
        <input type="text" name="username" id="username">
        <label for="password">password : </label>
        <input type="password" name="password" id="password">
        <label for="password2">confirm password : </label>
        <input type="password" name="password2" id="password2">
    </form>
    <br>
    <form>
        <button type ="submit" name="registrasi">Sign Up</a></button>
    </form>
    </div>
  </body>
  <footer>
        <div class='footer-left' style="text-align: center;">
          Copyright 2021 &#169;  &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html> 