<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}


require 'functions.php';

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    $id_pesan = trim(mysqli_real_escape_string($conn,$_POST['id_pesan']));
    $quantity =  trim(mysqli_real_escape_string($conn,$_POST['quantity']));
    $nomor_produksi_obat = trim(mysqli_real_escape_string($conn,$_POST['nomor_produksi_obat']));
    $tanggal_pemesanan =  trim(mysqli_real_escape_string($conn,$_POST['tanggal_pemesanan']));
    $obat = trim(mysqli_real_escape_string($conn,$_POST['obat']));
    $stok = trim(mysqli_real_escape_string($conn,$_POST['stok']));
    $jenis = trim(mysqli_real_escape_string($conn,$_POST['jenis']));
    $owner = trim(mysqli_real_escape_string($conn,$_POST['owner']));
    $produsen = trim(mysqli_real_escape_string($conn,$_POST['produsen']));



    mysqli_query($conn, "INSERT INTO pesan_obat(id_pesan, id_produsen, kode_obat, id_jenis, quantity, id_stok, id_owner, nomor_produksi_obat, tanggal_pemesanan)
                        VALUES ('', '$produsen', '$obat', '$jenis', '$quantity','$stok','$owner', '$nomor_produksi_obat',  '$tanggal_pemesanan')
                     ") or die(mysqli_error($conn));

        // $obat = $_POST['obat'];
        // foreach ($obat as $row){
        //     mysqli_query($conn, "INSERT INTO obat(kode_obat)  VALUES ('', '$row')
        //  ") or die(mysqli_error($conn));
        // }

    echo "<script>  alert('data berhasil ditambahkan');
            document.location.href='pesanobat.php' </script>";


        
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
    <title>Tambah Pesanan Obat | Sistem Informasi Toko Almas</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " >Tambah Pesanan</a>
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
            <label type = "hidden" for="id_pesan"style="font-size: 15px; color: CadetBlue; font-family: Arial, Sans-serif; "> Masukkan sesuai dengan data obatnya! </label><br>
            <input type = "hidden" name="id_pesan" id="id_pesan" class="form-control" required><br>
        </div>
        <br>

        <!-- TABEL PRODUSEN  -->
        <div  align="center" class = "form-group">
        <label for="produsen"> Nama produsen : </label> <br>
        <select  style="width: 300px;" name="produsen"  style="width: 300px;"  id="produsen" class="form-control" required><br>
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
        <div  align="center"  class = "form-group">
        <label  style="width: 300px;"  for="jenis">Jenis Obat : </label>  <br>          
        <select  style="width: 300px;" name="jenis" id="jenis" class="form-control" required><br>
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

                
                <br>
        <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="quantity"> quantity obat : </label><br>
            <input  style="width: 300px;" type = "text" name="quantity" id="quantity" class="form-control" required><br>
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
                    echo '<option value="'.$data_stok['id_stok'].'">
                    '.$data_stok['stok_obat_masuk'].'
                    </option>';
                }
            ?>
        </select>
        </div>

        
        <!-- TABEL PRODUSEN  -->
        <div  align="center"  class = "form-group">
        <label   style="width: 300px;"  for="owner"> Nama owner : </label> <br>
        <select  style="width: 300px;" name="owner" id="owner" class="form-control" required><br>
            <option value="">choose</option> <br>
            <?php 
                $sql_owner = mysqli_query($conn, "SELECT * FROM owner") or die
                (mysqli_error($conn));

                while($data_owner = mysqli_fetch_assoc($sql_owner)) {
                    echo '<option value="'.$data_owner['id_owner'].'">
                    '.$data_owner['nama_owner'].'
                    </option>';
                }
            ?>
        </select>
        </div>
        

        <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="nomor_produksi_obat"> bayar obat : </label><br>
            <input   style="width: 300px;" type = "text" name="nomor_produksi_obat" id="nomor_produksi_obat" class="form-control" required><br>
        </div>


        
       

            <div  align="center"  class = "form-group">
            <label  style="width: 300px;"  for="tanggal_pemesanan"> transaksi obat : </label><br>
            <input  style="width: 300px;" type = "date" name="tanggal_pemesanan" id="tanggal_pemesanan" value="<?=date('Y-m-d')?>" class="form-control" required><br>
            </div>
        <br>


        <br> <br>
        

        <br>
            <button type="submit" name="submit">tambah data</button><br>
</form>
</body>
</html>