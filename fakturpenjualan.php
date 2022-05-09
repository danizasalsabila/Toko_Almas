<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}

require 'functions.php';

//koneksi kedatabase

//ambil data faktur_penjualan dalam tabel faktur_penjualan
$faktur_penjualan = query("SELECT * FROM faktur_penjualan         
                            INNER JOIN obat ON faktur_penjualan.kode_obat = obat.kode_obat
                            INNER JOIN jenis ON faktur_penjualan.id_jenis = jenis.id_jenis
                            INNER JOIN harga ON faktur_penjualan.id_harga = harga.id_harga
                            INNER JOIN konsumen ON faktur_penjualan.id_konsumen = konsumen.id_konsumen
                            INNER JOIN pegawai ON faktur_penjualan.id_pegawai = pegawai.id_pegawai
                            INNER JOIN produsen ON faktur_penjualan.id_produsen = produsen.id_produsen
                            ORDER BY no_transaksi ASC
                            ");

//ambil data dari jenis dalam tabel jenis
// $jenis = query("SELECT * FROM jenis");

//ambil data diurl
// $id_jenis = $_GET["jenis_obat"];

//query data obat
// $faktur_penjualan = query("SELECT * FROM faktur_penjualan INNER JOIN faktur_penjualan ON ");

// $faktur_penjualan = ("SELECT faktur_penjualan.no_transaksi, obat.kode_obat, jenis.jenis_obat FROM  faktur_penjualan, obat, jenis WHERE faktur_penjualan.no_transaksi,obat.kode_obat, jenis.id_jenis")[0];


//ambil data fetch faktur_penjualan dari objek result
// mysqli_fetch_assoc()

//ketika search ditekan
if( isset($_POST["searchfaktur_penjualan"]) ) {
    $faktur_penjualan = searchfaktur_penjualan($_POST["keywordfaktur_penjualan"]);
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
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman Laporan | Sistem Informasi Toko Almas</title>
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

    <p>Laporan Penjualan</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambahfp.php" style="color: Ivory;">Transaksi</a></button> 

    <div class="box">
    <form action="" method="post">
        <input type="text" class="input"  name="keywordfaktur_penjualan" size="40" autofocus placeholder="insert keywords here" autocomplete="off">
        <button type="submit" class="btn btn-info" name="searchfaktur_penjualan">search!</button>
        <br>
    </form>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
    <tr>
        <th>Nomor</th>
        <th><i>Action</i></th>
        <th>Nomor Transaksi</th>
        <th> Obat</th>
        <th> Jenis</th>
        <th> Harga</th>
        <th> Quantity </th>
        <th>Jumlah Pembayaran</th>
        <th> Konsumen</th>
        <th> Pegawai</th>
        <th>Tanggal Transaksi</th>
        <th> Produsen</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($faktur_penjualan as $data) : ?>
   
    
    <tr>
    <td> <?= $i; ?></td>
    <td>
        <a href="hapusfp.php?no_transaksi=<?= $data["no_transaksi"]; ?>"onclick="return confirm('apakan anda yakin akan menghapus data?');">delete </a>
    </td>
    <td><?= $data["no_transaksi"] ?></td>
    <td><?= $data["nama_obat"] ?> </td>
    <td><?= $data["jenis_obat"] ?> </td>
    <td><?= $data["harga_obat"] ?> </td>
    <td><?= $data["quantity_jual"] ?> </td>
    <td><?= $data["jumlah_pembayaran"] ?> </td>
    <td><?= $data["nama_konsumen"] ?> </td>
    <td><?= $data["nama_pegawai"] ?> </td>
    <td><?= $data["tgl_transaksi"] ?> </td>
    <td><?= $data["brand_obat"] ?> </td>
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