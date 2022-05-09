<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data diurl
$no_transaksi = $_GET["no_transaksi"];

//query data obat
$data = query("SELECT * FROM faktur_penjualan WHERE no_transaksi = $no_transaksi")[0];

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //untuk cek apakan data berhasil diubah atau tidak
    //var_dump(mysqli_affected_rows($conn));
    if( ubahfaktur_penjualan($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubahkan');
            document.location.href='fakturpenjualan.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal diubahkan');
           document.location.href='fakturpenjualan.php'
        </script>
       ";
    }
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
    <title>Ubah Data Obat</title>
</head>
<body>
<h1>Ubah Menu</h1>
<form action="" method="post">
<input type="hidden" name="no_transaksi" value=" <?= $data["no_transaksi"]; ?>">
    <ul>

            <label for="kode_obat"> kode_obat : </label><br>
            <input type = "text" name="kode_obat" id="kode_obat"required value="<?= $data["kode_obat"] ?>"><br>
        <br>
            <label for="id_jenis"> jenis obat : </label><br>
            <input type = "text" name="id_jenis" id="id_jenis"required value="<?= $data["id_jenis"]; ?>"><br>
        <br>
            <label for="id_harga"> brand obat : </label><br>
            <input type = "text" name="id_harga" id="id_harga"required value="<?= $data["id_harga"]; ?>"><br>
        <br>
            <label for="quantity_jual"> quantity : </label><br>
            <input type = "text" name="quantity_jual" id="quantity_jual"required value="<?= $data["quantity_jual"]; ?>"><br>
        <br>
            <label for="jumlah_pembayaran"> manufactured obat : </label><br>
            <input type = "text" name="jumlah_pembayaran" id="jumlah_pembayaran"required value="<?= $data["jumlah_pembayaran"]; ?>"><br>
        <br>
            <label for="id_konsumen"> jenis obat : </label><br>
            <input type = "text" name="id_konsumen" id="id_konsumen"required value="<?= $data["id_konsumen"]; ?>"><br>
        <br>
            <label for="id_pegawai"> Pegawai : </label><br>
            <input type = "text" name="id_pegawai" id="id_pegawai"required value="<?= $data["id_pegawai"]; ?>"><br>
        <br>
            <label for="tgl_transaksi"> Tanggal Transaksi : </label><br>
            <input type = "date" name="tgl_transaksi" id="tgl_transaksi"required value="<?= $data["tgl_transaksi"]; ?>"><br>
        <br>
            <label for="id_produsen"> Produsen : </label><br>
            <input type = "text" name="id_produsen" id="id_produsen"required value="<?= $data["id_produsen"]; ?>"><br>
        <br>
            <button type="submit" name="submit">ubah data</button>
    </ul>
    </form>
    
</body>
</html>