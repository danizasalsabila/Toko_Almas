<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}

//koneksi kedatabase
require 'functions.php';

//pagination
//konfigurasinya
$jumlahdataperhalaman = 8;
$jumlahdata = count(query("SELECT * FROM obat"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset ($_GET["halaman"]) ) ? $_GET["halaman"] : 1 ;
//halaman = 2, awaldata = 3
//KONFIGURASI
$awaldata = ($jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

// if(isset($_GET["halaman"])){
//     $halamanaktif = $_GET["halaman"];
// } else {
//     $halamanaktif = 1;
// }


// $result = mysqli_query($conn, "SELECT * FROM obat");
// $jumlahdata = mysqli_num_rows($result);
// var_dump($jumlahdata);


//ambil data obat dalam tabel obat
$obat = query("SELECT * FROM obat LIMIT $awaldata, $jumlahdataperhalaman");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Halaman Login | Sistem Informasi Toko Almas</title>
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

    <p>OBAT</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambah.php" style="color: Ivory;">+ add more</a></button> 
    




    <div class="box">
    <form action="" method="post">
        <input type="text" name="keyword" class="input" autofocus placeholder="insert keywords here" autocomplete="off" id="keyword">
        <!-- <button type="submit" name="search" id="tombol-search">search!</button> -->
        <br>
    </form>
    </div>


    <!-- NAVIGASI HALAMAN -->
    <?php if($halamanaktif>1) : ?>
        <a href="?halaman= <?= $halamanaktif - 1; ?> "> &laquo; </a>
    <?php endif; ?>

    <?php for($i=1; $i<=$jumlahhalaman; $i++) : ?>
        <?php if($i == $halamanaktif) : ?>
            <a href="?halaman= <?= $i;  ?>" style="font-weight :bold; 
            "> <?= $i; ?> </a>
        <?php else : ?>
            <a href="?halaman= <?= $i;  ?>"> <?= $i; ?> </a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanaktif<$jumlahhalaman) : ?>
        <a href="?halaman= <?= $halamanaktif + 1; ?> "> &raquo; </a>
    <?php endif; ?>



    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0" align="center">
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

    </div>
    <script src="script.js"></script>
    <!-- <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="jenis.php" style="color: Ivory;">+ jenis</a></button> 
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="harga.php" style="color: Ivory;">+ harga</a></button>  -->

    <!-- <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="brand.php" style="color: Ivory;">+ brand</a></button>  -->
    <!-- <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="stok.php" style="color: Ivory;">+ stok</a></button> 
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="harga.php" style="color: Ivory;">+ harga</a></button> 
    <script src="script.js"> </script>
    
</body>
    <footer>
        <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html> 
</body>
    <footer>
        <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html> -->

</body>
<footer>

<div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>