<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}

require 'functions.php';

//pagination
//konfigurasinya
// $jumlahdataperhalaman = 5;
// $jumlahdata = count(query("SELECT * FROM konsumen"));
// $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
// $halamanaktif = (isset ($_GET["halaman"]) ) ? $_GET["halaman"] : 1 ;
// //halaman = 2, awaldata = 3
// //KONFIGURASI
// $awaldata = ($jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;


//koneksi kedatabase

//ambil data konsumen dalam tabel konsumen
$konsumen = query("SELECT * FROM konsumen");
// LIMIT $awaldata, $jumlahdataperhalaman

//ambil data fetch konsumen dari objek result
// mysqli_fetch_assoc()

//ketika search ditekan
if( isset($_POST["searchkonsumen"]) ) {
    $konsumen = searchkonsumen($_POST["keyword"]);
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
    <title>Halaman Konsumen | Sistem Informasi Toko Almas</title>
  </head>
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

    <p>Konsumen</p>
    <button type="button" class="btn btn-info" style="margin-top: 70px; margin-left: 101px; background-color: CadetBlue;"> <a href="tambahkonsumen.php" style="color: Ivory;">+ add more</a></button> 


    <div class="box">
    <form action="" method="post">
        <input type="text" name="keyword" class="input" size="40" autofocus placeholder="insert keywords here" autocomplete="off" id="keyword">
        <button type="submit"  class="btn btn-info" name="searchkonsumen" id="tombol-search">search!</button>
        <br>
    </form>
    </div>


    <div id="container"></div>
    <table border="1" cellpadding="10" cellspacing="0" align="center">
    <tr>
        <th>Nomor</th>
        <th><i>Action</i></th>
        <th>Id Konsumen</th>
        <th>Nama konsumen</th>
        <th>No Telepon konsumen</th>
    </tr>
    
    <?php $i = 1; ?>
    <?php foreach($konsumen as $row) : ?>

    <tr>
    <td> <?= $i; ?></td>
    <td>
        <a href="ubahkonsumen.php?id_konsumen= <?= $row["id_konsumen"]; ?>">change</a>
        <a href="hapuskonsumen.php?id_konsumen=<?= $row["id_konsumen"]; ?>"onclick="return confirm('apakan anda yakin akan meenghapus data?');">delete </a>
    </td>
    <td><?= $row["id_konsumen"] ?></td>
    <td><?= $row["nama_konsumen"] ?> </td>
    <td><?= $row["nomor_telp_konsumen"] ?> </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </table>
    </div>
    <!-- <script src="js/scriptkon.js"></script> -->
</body>
    <footer>
        <div class='footer-left' style="text-align: center;">
        Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>




</html>