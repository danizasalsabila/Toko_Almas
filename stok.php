<?php

session_start();
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//koneksi kedatabase
require 'functions.php';



//ambil data dari tabel sirestoran
// $stok = query("SELECT * FROM stok");
// $result = mysqli_query($conn, "SELECT * FROM harga")
$stok_obat = query("SELECT * FROM stok_obat");

//$stok = query("SELECT * FROM stok);

//kalau mau cek error
// if( !$result) {
//     echo mysqli_error($conn); }

//tombo search ditekan
// if( isset($_POST["search"]) ) {
//     $stok = search($_POST["keyword"]);
//   }
//ambil data tabel dari object rusult
//ambil data (fetch) mahasiswa dari object result
//mysqli_fetch_row() //mengembalikan array numerik menggunakan angka, elemen menggunakan angka sebagai nomor index
//contoh
// $a = mysqli_fetch_row($result);
// var_dump($a);
//mysqli_fetch_assoc() mengembalikan array semua datanya menggunakan huruf, misal jika ingin menampilkan kolom nama saja, maka (nama)
// while ($m = mysqli_fetch_assoc($result) ) {
//     var_dump($m);
// }
//mysqli_fetch_array() mengembalikan  array semua datanya mengggunakan huruf atau angka
//kekurangan data yang disajikan jadi double
//mysqli_fetch_object() seperti array tapi menggunakan panah, ex: (a->nama_stok) 

//saat tombol cari ditekan
// if( isset($_POST["search"]) ) {
//     $stok = search($_POST["keyword"]);
//   }
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman stok | Sistem Informasi Toko Almas</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" >Toko Almas</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menukedua.php" style="font-size: 15px;">Back to Menu Obat</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <p>STOK OBAT</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambahstok.php" style="color: Ivory;">+ add more</a></button> 
    


    <br> <br>

    <!-- <form action="" method="post">
        <input type="text" name="keyword"sixe="40" autofocus placeholder="insert keywords here" autocomplete="off">
        <button type="submit" name="search">search!</button>
        <br>
    </form> -->

    <br>
    <table align="center" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nomor</th>
            <th>ID stok</th>
            <th> Stok Obat Masuk</th>
            <th> Stok Obat Keluar</th>
            <th>actions</th>
           
        </tr>

        <?php $i = 1; ?>
        <?php //while($row = mysqli_fetch_assoc($result))  : ?>
        <?php foreach ($stok_obat as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            
            <td> <?= $row["id_stok"]; ?> </td>
            <td> <?= $row["stok_obat_masuk"]; ?> </td>
            <td> <?= $row["stok_obat_keluar"]; ?> </td>  
            <td>
            <a href="hapusstok.php?id_stok=<?= $row["id_stok"]; ?>"onclick="return confirm('apakan anda yakin akan meenghapus data?');">delete </a>

            </td>
        </tr>
        

        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
<footer>
    <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
    </div>   
</footer>
</html>