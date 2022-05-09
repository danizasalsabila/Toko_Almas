<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}

require 'functions.php';

//ambil data diurl
$id_jenis = $_GET["id_jenis"];

//query data obat
$data = query("SELECT * FROM jenis WHERE id_jenis = $id_jenis")[0];

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //untuk cek apakan data berhasil diubah atau tidak
    //var_dump(mysqli_affected_rows($conn));
    if( ubahjenis($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubahkan');
            document.location.href='jenis.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal diubahkan');
           document.location.href='jenis.php'
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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styletambahobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Ubah Jenis | Sistem Informasi Toko Almas</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " >Tambah Obat</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.html" style="font-size: 15px;">Back to Menu</a></button><br><br>
                        <button type="button" class="btn btn-light"><a href="index.php" style="font-size: 15px;">Back to Obat</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<form action="" method="post" align="center"  style="margin-top: 145px; margin-bottom: 30px;">
<input type="hidden" name="id_jenis" value=" <?= $data["id_jenis"]; ?>">
    <ul>

           
            <label for="jenis_obat"> jenis obat : </label><br>
            <input type = "text" name="jenis_obat" id="jenis_obat"required value="<?= $data["jenis_obat"]; ?>"><br>
        <br>
            <button type="submit" name="submit">ubah data</button>
    </ul>
    </form>
    
</body>
</html>