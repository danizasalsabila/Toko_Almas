<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}


require 'functions.php';

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    $no_transaksi = trim(mysqli_real_escape_string($conn,$_POST['no_transaksi']));
    $quantity_jual =  trim(mysqli_real_escape_string($conn,$_POST['quantity_jual']));
    $jumlah_pembayaran = trim(mysqli_real_escape_string($conn,$_POST['jumlah_pembayaran']));
    $tgl_transaksi =  trim(mysqli_real_escape_string($conn,$_POST['tgl_transaksi']));
    $obat = trim(mysqli_real_escape_string($conn,$_POST['obat']));

    $jenis = trim(mysqli_real_escape_string($conn,$_POST['jenis']));
    $harga = trim(mysqli_real_escape_string($conn,$_POST['harga']));
    $konsumen = trim(mysqli_real_escape_string($conn,$_POST['konsumen']));
    $pegawai = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
    $produsen = trim(mysqli_real_escape_string($conn,$_POST['produsen']));



    mysqli_query($conn, "INSERT INTO faktur_penjualan(no_transaksi, kode_obat, id_jenis, id_harga, quantity_jual, jumlah_pembayaran, id_konsumen, id_pegawai, tgl_transaksi, id_produsen)
                        VALUES ('', '$obat', '$jenis', '$harga', '$quantity_jual', '$jumlah_pembayaran',  '$konsumen', '$pegawai', '$tgl_transaksi', '$produsen')
                     ") or die(mysqli_error($conn));

        // $obat = $_POST['obat'];
        // foreach ($obat as $row){
        //     mysqli_query($conn, "INSERT INTO obat(kode_obat)  VALUES ('', '$row')
        //  ") or die(mysqli_error($conn));
        // }

    echo "<script>  alert('data berhasil ditambahkan');
            document.location.href='fakturpenjualan.php' </script>";


        
    //untuk cek apakan data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn));\\


    // if( tambahfaktur_penjualan($_POST) > 0) {
    //     echo "
    //     <script>
    //         alert('data berhasil ditambahkan');
    //         document.location.href='fakturpenjualan.php'
    //     </script>
    //     ";
    // }else  {
    //    echo "
    //     <script>
    //        alert('data gagal ditambahkan');
    //        document.location.href='fakturpenjualan.php'
    //     </script>
    //    ";
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styletambahobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Transaksi | Sistem Informasi Toko Almas</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " > Halaman Transaksi</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-light"><a href="menu.php" style="font-size: 15px;">Back to Menu</a></button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


<form action="" method="post" align="center" style="margin-top: 145px; margin-bottom: 30px;">
    <ul>
    <div class = "form-group">
            <label type = "hidden" for="no_transaksi" style="font-size: 15px; color: CadetBlue; font-family: Arial, Sans-serif; "> Masukkan sesuai dengan data obatnya! </label><br>
            <input type = "hidden" name="no_transaksi" id="no_transaksi" class="form-control" required>
        </div>
        
        <!-- NAMA OBAT -->
        <div  align="center" class = "form-group">
        <label for="obat">Nama Obat : </label><br>
        <select name="obat" style="width: 300px;"  id="obat" class="form-control" required><br>
            <br><option   style="width: 30px;"  value="" size="10px">choose</option> <bsr>
            <?php 
                $sql_obat = mysqli_query($conn, "SELECT * FROM obat") or die
                (mysqli_error($conn));

                while($data_obat = mysqli_fetch_assoc($sql_obat)) {
                    echo '<option value="'.$data_obat['kode_obat'].'">
                    '.$data_obat['nama_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>
            
        

        <!-- JENIS OBAT -->
        <div align="center"  class = "form-group">
        <label for="jenis">Jenis Obat : </label>  <br>          
        <select name="jenis" style="width: 300px;"  id="jenis" class="form-control" required><br>
             <option value="">choose</option> <br>
                <?php 
                $sql_jenis = mysqli_query($conn, "SELECT * FROM jenis") or die
                (mysqli_error($conn));

                while($data_jenis = mysqli_fetch_assoc($sql_jenis)) {
                    echo '<option value="'.$data_jenis['id_jenis'].'">
                    '.$data_jenis['jenis_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>

                
        <!-- TABEL HARGA  -->
        <div align="center" class = "form-group">
        <label for="harga">Harga Obat : </label><br>
        <select name="harga" style="width: 300px;"  id="harga" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_harga = mysqli_query($conn, "SELECT * FROM harga") or die
                (mysqli_error($conn));

                while($data_harga = mysqli_fetch_assoc($sql_harga)) {
                    echo '<option value="'.$data_harga['id_harga'].'">
                    '.$data_harga['harga_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>

        
        
        <div align="center" class = "form-group">
            <label style="width: 300px;"  for="quantity_jual"> quantity obat : </label><br>
            <input style="width: 300px;"  type = "text" style="width: 300px;"  name="quantity_jual" id="quantity_jual" class="form-control" required>
        </div>
        <div align="center" class = "form-group">
            <label style="width: 300px;"  for="jumlah_pembayaran"> bayar obat : </label><br>
            <input style="width: 300px;"  type = "text" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" required>
        </div>
    


        
        <!-- TABEL KONSUMEN  -->
        <div align="center" class = "form-group">
        <label for="konsumen"> Nama konsumen : </label> <br>
        <select name="konsumen" style="width: 300px;"  id="konsumen" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_konsumen = mysqli_query($conn, "SELECT * FROM konsumen") or die
                (mysqli_error($conn));

                while($data_konsumen = mysqli_fetch_assoc($sql_konsumen)) {
                    echo '<option value="'.$data_konsumen['id_konsumen'].'">
                    '.$data_konsumen['nama_konsumen'].'
                    </option>';
                }
            ?>
        </select>
        </div>



        <!-- TABEL PEGAWAI  -->
        <div align="center" class = "form-group">
        <label for="pegawai"> Nama pegawai : </label> <br>
        <select name="pegawai" style="width: 300px;"  id="pegawai" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_pegawai = mysqli_query($conn, "SELECT * FROM pegawai") or die
                (mysqli_error($conn));

                while($data_pegawai = mysqli_fetch_assoc($sql_pegawai)) {
                    echo '<option value="'.$data_pegawai['id_pegawai'].'">
                    '.$data_pegawai['nama_pegawai'].'
                    </option>';
                }
            ?>
        </select>
        </div>

        

            <div align="center" class = "form-group">
            <label style="width: 300px;"  for="tgl_transaksi"> transaksi obat : </label><br>
            <input style="width: 300px;"  type = "date" name="tgl_transaksi" id="tgl_transaksi" value="<?=date('Y-m-d')?>" class="form-control" required>
            </div>
        


        
        <!-- TABEL PRODUSEN  -->
        <div align="center" class = "form-group">
        <label style="width: 300px;"   style="width: 300px;"  for="produsen"> Nama produsen : </label> <br>
        <select style="width: 300px;"  name="produsen" id="produsen" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_produsen = mysqli_query($conn, "SELECT * FROM produsen") or die
                (mysqli_error($conn));

                while($data_produsen = mysqli_fetch_assoc($sql_produsen)) {
                    echo '<option value="'.$data_produsen['id_produsen'].'">
                    '.$data_produsen['brand_obat'].'
                    </option>';
                }
            ?>
        </select>
        </div>

        <br>
            <button type="submit"  class="btn btn-light" name="submit" style="width: 150px; background-color: CadetBlue; color: Ivory;">tambah data</button><br>
</form>
</body>
<footer>
        <div class='footer-left' style="text-align: center;">
          Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>