<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//koneksi kedatabase

//ambil data obat dalam tabel obat
$obat = query("SELECT * FROM obat");

//ambil data fetch obat dari objek result
// mysqli_fetch_assoc()

//ketika search ditekan
if( isset($_POST["search"]) ) {
    $obat = search($_POST["keyword"]);
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Toko Almas</title>
</head>
<body>
    <h1>Daftar Obat</h1>
    <a href="tambah.php">add more</a>
    <a href="registrasi.php">sign up</a>
    <a href="logout.php">log out</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="insert keywords here" autocomplete="off">
        <button type="submit" name="search">search!</button>
        <br>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nomor</th>
        <th><i>Action</i></th>
        <th>Kode Obat</th>
        <th>Nomor Produksi Obat</th>
        <th>Nama obat</th>
        <th>Brand Obat</th>
        <th>Expired obat</th>
        <th>Manufactured obat</th>
        <th>Jenis obat</th>
        <th>Stok obat</th>
        <th>Harga Obat</th>
    </tr>
    
    <?php $i = 1; ?>
    <?php foreach($obat as $row) : ?>

    <tr>
    <td> <?= $i; ?></td>
    <td>
        <a href="ubah.php?kode_obat= <?= $row["kode_obat"]; ?>">change</a>
        <a href="hapus.php?kode_obat=<?= $row["kode_obat"]; ?>"onclick="return confirm('apakan anda yakin akan meenghapus data?');">delete </a>
    </td>
    <td><?= $row["kode_obat"] ?></td>
    <td><?= $row["nomor_produksi_obat"] ?> </td>
    <td><?= $row["nama_obat"] ?> </td>
    <td><?= $row["brand_obat"] ?> </td>
    <td><?= $row["expired_obat"] ?> </td>
    <td><?= $row["manufactured_obat"] ?> </td>
    <td><?= $row["jenis_obat"] ?> </td>
    <td><?= $row["stok_obat"] ?> </td>
    <td><?= $row["harga_obat"] ?> </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </table>
</body>
</html>