<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}



require 'functions.php';

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //untuk cek apakan data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn));
    if( tambahharga($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href='harga.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal ditambahkan');
           document.location.href='harga.php'
        </script>
       ";
    }
    // if( mysqli_affected_rows($conn) > 0) {
    //     echo "data berhasil masuk";
    // }else  {
    //     echo "data gagal masuk";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styletambahobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Tambah Harga Obat | Sistem Informasi Toko Almas</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " >Tambah Obat</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="harga.php" style="font-size: 15px;">Back to harga</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<form action="" method="post" align="center" action="/action_page.php" style="margin-top: 145px; margin-bottom: 30px;">
    <ul>
            <label for="id_harga"> </label><br>
            <input type = "hidden" name="id_harga" id="id_harga"  autocomplete="off" required><br>
        <br>
            <label for="harga_obat"> harga obat : </label><br>
            <input type = "text" name="harga_obat" id="harga_obat"  autocomplete="off" required><br>
        <br>
      
            <button type="submit" class="btn btn-light" name="submit" style="width: 150px; background-color: CadetBlue; color: Ivory;">tambah data</button>
    </ul>
    </form>
    
</body>
  <footer>
        <div class='footer-left' style="text-align: center;">
        Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>