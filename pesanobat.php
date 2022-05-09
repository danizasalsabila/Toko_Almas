<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}


//koneksi kedatabase
require 'functions.php';


//ambil data pesanobat dalam tabel faktur_penjualan
// $kode_obat = $_GET["kode_obat"];

$pesan_obat = query("SELECT * FROM pesan_obat 
                    INNER JOIN produsen ON pesan_obat.id_produsen = produsen.id_produsen
                    INNER JOIN obat ON pesan_obat.kode_obat = obat.kode_obat
                    INNER JOIN jenis ON pesan_obat.id_jenis = jenis.id_jenis
                    INNER JOIN stok_obat ON pesan_obat.id_stok = stok_obat.id_stok
                    INNER JOIN owner ON pesan_obat.id_owner = owner.id_owner
                    ");

//ambil data dari jenis dalam tabel jenis
// $jenis = query("SELECT * FROM jenis");
// query=("SELECT nama_obat FROM pesan_obat ");
//ambil data diurl

//query data obat
// $kod = query("SELECT pesan_obat.id_pesan,  FROM obat WHERE kode_obat = $kode_obat")[0];


//ambil data fetch pesanobat dari objek result
// mysqli_fetch_assoc()

// //ketika search ditekan
// if( isset($_POST["searchpesan_obat"]) ) {
//     $pesan_obat = searchpesan_obat($_POST["keywordpesan_obat"]);
// // }

// if( isset($_POST["searchpesan_obat"]) ) {
//     $pesan_obat = searchpesan_obat($_POST["keywordpesan_obat"]);
// }

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman Pesan Obat | Sistem Informasi Toko Almas</title>
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
    
    <p>Riwayat Pemesanan</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambahpo.php" style="color: Ivory;">+ add more</a></button> 

    <!-- <div class="box">
    <form action="" method="post">
        <input type="text" class="input" name="keywordpesan_obat" size="40"  autofocus placeholder="insert keywords here" autocomplete="off">
        <button type="submit" class="btn btn-info"  name="searchpesan_obat">search!</button>
        <br>
    </form>
    </div> -->

    <table border="1" cellpadding="10" cellspacing="0" align="center">
    <tr>
        <th>Nomor</th>
        <th><i>Action</i></th>
        <th>ID Pesan</th>
        <th> Produsen</th>
        <th> Jenis</th>
        <th> Quantity </th>
        <th>Stock</th>
        <th> Owner</th>
        <th>No Produksi Obat</th>
        <th>Tanggal Transaksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($pesan_obat as $data) : ?>
    

    <tr>
    <td> <?= $i; ?></td>
    <td>
        <a href="hapuspo.php?id_pesan=<?= $data["id_pesan"]; ?>"onclick="return confirm('apakan anda yakin akan menghapus data?');">delete </a>
    </td>
    <td><?= $data["id_pesan"] ?></td>
    <td><?= $data["brand_obat"] ?> </td>
    <td><?= $data["jenis_obat"] ?></td>
    <td><?= $data["quantity"] ?> </td>
    <td><?= $data["stok_obat_masuk"] ?> </td>
    <td><?= $data["nama_owner"] ?> </td>
    <td><?= $data["nomor_produksi_obat"] ?> </td>
    <td><?= $data["tanggal_pemesanan"] ?> </td>
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