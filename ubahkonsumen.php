<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data diurl
$id_konsumen = $_GET["id_konsumen"];

//query data obat
$data = query("SELECT * FROM konsumen WHERE id_konsumen = $id_konsumen")[0];

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //untuk cek apakan data berhasil diubah atau tidak
    //var_dump(mysqli_affected_rows($conn));
    if( ubahkonsumen($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubahkan');
            document.location.href='konsumen.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal diubahkan');
           document.location.href='konsumen.php'
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
    <title>Ubah Konsumen | Sistem Informasi Toko Almas</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " >Ubah Konsumen</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.php" style="font-size: 15px;">Back to Menu</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<form action="" method="post" align="center" style="margin-top: 145px; margin-bottom: 30px;">
<input type="hidden" name="id_konsumen" value=" <?= $data["id_konsumen"]; ?>">
    <ul>
            <label for="nama_konsumen"> nama konsumen : </label><br>
            <input type = "text" name="nama_konsumen" id="nama_konsumen" required value="<?= $data["nama_konsumen"]; ?>"><br>
        <br>
            <label for="nomor_telp_konsumen"> Nomor Telpon konsumen : </label><br>
            <input type = "text" name="nomor_telp_konsumen" id="nomor_telp_konsumen" required value="<?= $data["nomor_telp_konsumen"]; ?>"><br>
        <br>
            <button type="submit" style="width: 150px; background-color: CadetBlue; color: Ivory;" class="btn btn-light" name="submit">ubah data</button>
    </ul>
    </form>
    
</body>

<footer>
        <div class='footer-left' style="text-align: center;">
        Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>