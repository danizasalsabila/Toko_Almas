<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.html");
    exit;
}



require 'functions.php';

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    $kode_obat = trim(mysqli_real_escape_string($conn,$_POST['kode_obat']));
    $nomor_produksi_obat = trim(mysqli_real_escape_string($conn,$_POST['nomor_produksi_obat']));
    $nama_obat =  trim(mysqli_real_escape_string($conn,$_POST['nama_obat']));
    $produsen = trim(mysqli_real_escape_string($conn,$_POST['produsen']));
    $expired_obat =  trim(mysqli_real_escape_string($conn,$_POST['expired_obat']));
    $manufactured_obat = trim(mysqli_real_escape_string($conn,$_POST['manufactured_obat']));
    $jenis = trim(mysqli_real_escape_string($conn,$_POST['jenis']));
    $stok = trim(mysqli_real_escape_string($conn,$_POST['stok']));
    $harga = trim(mysqli_real_escape_string($conn,$_POST['harga']));



    mysqli_query($conn, "INSERT INTO obat(kode_obat, nomor_produksi_obat, nama_obat, brand_obat, expired_obat, manufactured_obat, jenis_obat, stok_obat, harga_obat)
                        VALUES ('', '$nomor_produksi_obat', '$nama_obat', '$produsen', '$expired_obat', '$manufactured_obat','$jenis','$stok', '$harga')
                     ") or die(mysqli_error($conn));

    
    //untuk cek apakan data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn));
    // if( tambah($_POST) > 0) {
    //     echo "
    //     <script>
    //         alert('data berhasil ditambahkan');
    //         document.location.href='index.php'
    //     </script>
    //     ";
    // }else  {
       echo "
        <script>
           alert('data berhasi ditambahkan');
           document.location.href='index.php'
        </script>
       ";
    // }
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styletambahobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Tambah Obat | Sistem Informasi Toko Almas</title>
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

<form action="" method="post" align="center" action="/action_page.php" style="margin-top: 145px; margin-bottom: 30px;">
    <ul>
            <label type = "hidden" for="kode_obat" style="font-size: 15px; color: CadetBlue; font-family: Arial, Sans-serif; "> Masukkan sesuai dengan data obatnya! </label><br>
            <input type = "hidden" name="kode_obat" id="kode_obat" class="form-control" required>

        <div  align="center"  >
            <label  for="nomor_produksi_obat"> nomor produksi obat : </label><br>
            <input   style="width: 300px;" type = "text" name="nomor_produksi_obat" id="nomor_produksi_obat" class="form-control" required>
        </div>

            <label  for="nama_obat"> nama obat : </label><br>
            <input  style="width: 300px;"  type = "text" name="nama_obat" id="nama_obat"  autocomplete="off" required><br>
        <br>

            <!-- TABEL PRODUSEN  -->
            <div  align="center" class = "form-group">
            <label for="produsen"> Nama produsen : </label> <br>
            <select  name="produsen"  style="width: 300px;"  id="produsen" class="form-control" required><br>
                <option value="">choose</option> <br>
                <?php 
                    $sql_produsen = mysqli_query($conn, "SELECT * FROM produsen") or die
                    (mysqli_error($conn));

                    while($data_produsen = mysqli_fetch_assoc($sql_produsen)) {
                        echo '<option value="'.$data_produsen['brand_obat'].'">
                        '.$data_produsen['brand_obat'].'
                        </option>';
                    }
                ?>
            </select>
            </div>

            <!-- <label for="brand_obat"> brand obat : </label><br>
            <input type = "text" name="brand_obat" id="brand_obat"  autocomplete="off" required><br> -->
        
            <label for="expired_obat"> expired obat : </label><br>
            <input   style="width: 300px;" type = "date" name="expired_obat" id="expired_obat"  autocomplete="off" required><br>
        <br>
            <label for="manufactured_obat"> manufactured obat : </label><br>
            <input  style="width: 300px;"  type = "date" name="manufactured_obat" id="manufactured_obat"  autocomplete="off" required><br>
        <br>
            <!-- <label for="jenis_obat"> jenis obat : </label><br>
            <input type = "text" name="jenis_obat" id="jenis_obat"  autocomplete="off" required><br> -->
            <!-- JENIS OBAT -->
            <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="jenis">Jenis Obat : </label>  <br>          
            <select  style="width: 300px;" name="jenis" id="jenis" class="form-control" required><br>
                <option value="">choose</option> <br>
                <?php 
                $sql_jenis = mysqli_query($conn, "SELECT * FROM jenis") or die
                (mysqli_error($conn));

                while($data_jenis = mysqli_fetch_assoc($sql_jenis)) {
                    echo '<option value="'.$data_jenis['jenis_obat'].'">
                    '.$data_jenis['jenis_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>
        <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="quantity"> quantity obat : </label><br>
            <input  style="width: 300px;" type = "text" name="quantity" id="quantity" class="form-control" required>
        </div>
        
        <!-- TABEL STOK  -->
        <div  align="center"  class = "form-group">
        <label  style="width: 300px;"  for="stok">  stok obat masuk : </label> <br>
        <select  style="width: 300px;" name="stok" id="stok" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_stok = mysqli_query($conn, "SELECT * FROM stok_obat") or die
                (mysqli_error($conn));

                while($data_stok = mysqli_fetch_assoc($sql_stok)) {
                    echo '<option value="'.$data_stok['stok_obat_masuk'].'">
                    '.$data_stok['stok_obat_masuk'].'
                    </option>';
                }
            ?>
        </select>
        </div>
        


            <!-- <label for="harga_obat"> harga obat : </label><br>
            <input type = "text" name="harga_obat" id="harga_obat"  autocomplete="off" required><br> -->
            <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="harga">  harga obat : </label> <br>
            <select  style="width: 300px;" name="harga" id="harga" class="form-control" required><br>
                <option value="">choose</option> <br>
                <?php 
                    $sql_harga = mysqli_query($conn, "SELECT * FROM harga") or die
                (mysqli_error($conn));

                while($data_harga = mysqli_fetch_assoc($sql_harga)) {
                    echo '<option value="'.$data_harga['harga_obat'].'">
                    '.$data_harga['harga_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>

        <br><br>
            <button type="submit" class="btn btn-light" name="submit" style="width: 150px; background-color: CadetBlue; color: Ivory;">tambah data</button>
    </ul>
    </form>
    
</body>
  <footer>
        <div class='footer-left' style="text-align: center;">
        Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>