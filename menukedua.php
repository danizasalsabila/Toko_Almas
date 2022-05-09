<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylemenu.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </head>
  <title>OBAT | Sistem Informasi Toko Almas</title>
</head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" >Toko Almas</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.php" style="font-size: 15px;">MENU</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container" id="project-1">
    <p style="text-align: center; padding-top: 110px; color: Black; text-shadow: 1px 1px 1px #696969;font-family: Arial, Sans-serif; font-size: 44px;">OBAT<br>Sistem Informasi Toko Almas
    </p>
  </div>
  <div class="projects" id="projects">
    <div class="Grid">
      <a data-aos="fade-up" href="index.php"  class="card">
        <h3 class="title">Data Obat</h3>
        <p class="desc">Memuat data obat Toko Almas; nama, brand, nomor produksi, mfg date, expired date, jenis, stok, dan harga. <br><br></p>
      </a>

      <a data-aos="fade-up"href="jenis.php"  class="card">
        <h3 class="title">Data Jenis</h3>
        <p class="desc">Memuat data jenis obat; id jenis dan jenis obat  </p>
      </a>

      <a data-aos="fade-up"href="produsen.php"  class="card">
        <h3 class="title">Brand Obat</h3>
        <p class="desc">Memuat data brand obat; id produsen, nomor produksi obat, brand obat, id jenis, alamat produsen, no telp produsen dan kode obat. </p>
      </a>

      <a data-aos="fade-up"href="stok.php"  class="card">
        <h3 class="title">Data Stok</h3>
        <p class="desc">Memuat data stok obat Toko Almas. <br><br></p>
      </a>

      <a data-aos="fade-up"href="harga.php"  class="card">
        <h3 class="title">Laporan harga</h3>
        <p class="desc">Memuat laporan Toko Almas.<br><br></p>
      </a>

    </div>
 
    <footer>
        <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init(); </script>

  </body>
</html>