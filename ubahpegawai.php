<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data diurl
$id_pegawai = $_GET["id_pegawai"];

//query data obat
$data = query("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //untuk cek apakan data berhasil diubah atau tidak
    //var_dump(mysqli_affected_rows($conn));
    if( ubahpegawai($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubahkan');
            document.location.href='pegawai.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal diubahkan');
           document.location.href='pegawai.php'
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
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title> Ubah Data Pegawai | Sistem Informasi Toko Almas</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" >Toko Almas</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.php" style="font-size: 15px;">Back to Menu</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<form action="" align="center"style="margin-top: 145px; margin-bottom: 30px;"  method="post">
<input type="hidden" name="id_pegawai" value=" <?= $data["id_pegawai"]; ?>">
<input type="hidden" name="id_user" value=" <?= $data["id_user"]; ?>">
    <ul>
            <label for="nama_pegawai"> nama pegawai : </label><br>
            <input type = "text" name="nama_pegawai" id="nama_pegawai"required value="<?= $data["nama_pegawai"]; ?>"><br>
        <br>
            <label for="nomor_telp_pegawai"> nomor telp pegawai : </label><br>
            <input type = "text" name="nomor_telp_pegawai" id="nomor_telp_pegawai"required value="<?= $data["nomor_telp_pegawai"]; ?>"><br>
        <br>
            <label for="jabatan"> jabatan : </label><br>
            <input type = "text" name="jabatan" id="jabatan"required value="<?= $data["jabatan"]; ?>"><br>
        <br>
    
            <button type="submit" style="width: 150px; background-color: CadetBlue; color: Ivory;" name="submit">ubah data</button>
    </ul>

    </form>
    
</body>
</html>