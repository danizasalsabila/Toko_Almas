<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: indexkedua.html");
    exit;
}

require 'functions.php';

//koneksi kedatabase

//ambil data pegawai dalam tabel pegawai
$pegawai = query("SELECT * FROM pegawai
                INNER JOIN user ON pegawai.id_user = user.id_user
                ");

//ambil data fetch pegawai dari objek result
// mysqli_fetch_assoc()

//ketika search ditekan
if( isset($_POST["searchpegawai"]) ) {
    $pegawai = searchpegawai($_POST["keyword"]);
}


//COOKIE
//informasi yang diakses dimana saja dalam halaman browser/client
//jadi client bisa memanipulasi cookie CRUD hingga menjadi celah keamanan
//remember me? digunakan agar user tidak terus login 
//untuk mengenali user jadi browser tau siaapa yang sedang akses
//shopping cart fitur yang memungkinkan mencari barang kehalaman yang lain tanpa menghilangkan belanjaan yang dipilih sebelumnya
//personalisasi = mengetahui prilaku user, misal dalam iklan 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman Pegawai | Sistem Informasi Toko Almas</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" >Toko Almas</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.html" style="font-size: 15px;">Back to Menu</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    
    <p>Pegawai</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambahpegawai.php" style="color: Ivory;">+ add more</a></button> 

    <div class="box">
    <form action="" method="post">
        <input type="text" class="input" name="keyword" size="40" autofocus placeholder="insert keywords here" autocomplete="off">
        <button type="submit" class="btn btn-info" name="searchpegawai">search!</button>
        <br>
    </form>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
    <tr>
        <th>Nomor</th>
        <th><i>Action</i></th>
        <th>Id pegawai</th>
        <th>Nama pegawai</th>
        <th>Nomor Telp pegawai</th>
        <th>Jabatan</th>
        <th>username</th>

    </tr>
    
    <?php $i = 1; ?>
    <?php foreach($pegawai as $row) : ?>

    <tr>
    <td> <?= $i; ?></td>
    <td>
        <a href="ubahpegawai.php?id_pegawai= <?= $row["id_pegawai"]; ?>">change</a>
        <a href="hapuspegawai.php?id_pegawai= <?= $row["id_pegawai"]; ?>">delete</a>
    </td>
    <td><?= $row["id_pegawai"] ?></td>
    <td><?= $row["nama_pegawai"] ?> </td>
    <td><?= $row["nomor_telp_pegawai"] ?> </td>
    <td><?= $row["jabatan"] ?></td>
    <td><?= $row["username"] ?> </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </table>
</body>
<footer>
        <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
</footer>
</html>