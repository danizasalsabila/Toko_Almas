<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}


require 'functions.php';

//cek apakah tobol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    $id_pegawai = trim(mysqli_real_escape_string($conn,$_POST['id_pegawai']));
    $nama_pegawai =  trim(mysqli_real_escape_string($conn,$_POST['nama_pegawai']));
    $nomor_telp_pegawai = trim(mysqli_real_escape_string($conn,$_POST['nomor_telp_pegawai']));
    $jabatan =  trim(mysqli_real_escape_string($conn,$_POST['jabatan']));
    $user = trim(mysqli_real_escape_string($conn,$_POST['user'])); 
    
    mysqli_query($conn, "INSERT INTO pegawai(id_pegawai, nama_pegawai, nomor_telp_pegawai, jabatan, id_user)
    VALUES ('', '$nama_pegawai', '$nomor_telp_pegawai', '$jabatan', '$user')
 ") or die(mysqli_error($conn));

echo "<script>  alert('data berhasil ditambahkan');
document.location.href='pegawai.php' </script>";
    //untuk cek apakan data berhasil ditambahkan atau tidak
    //var_dump(mysqli_affected_rows($conn));
    // if( tambahpegawai($_POST) > 0) {
    //     echo "
    //     <script>
    //         alert('data berhasil ditambahkan');
    //         document.location.href='pegawai.php'
    //     </script>
    //     ";
    // }else  {
    //    echo "
    //     <script>
    //        alert('data gagal ditambahkan');
    //        document.location.href='pegawai.php'
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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styletambahobat.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Tambah Pegawai | Sistem Informasi Toko Almas</title>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-black" style="font-size: 28px; color: CadetBlue; text-shadow: 1px 1px 1px #696969; font-family: Arial, Sans-serif; border-bottom-style: solid; border-style: CadetBlue; " >Tambah Pegawai</a>
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
            <label type = "hidden" for="id_pegawai">  </label><br>
            <input type = "hidden" name="id_pegawai" id="id_pegawai" class="form-control" required><br>
        <br>
            <label for="nama_pegawai"> nama pegawai : </label><br>
            <input type = "text" name="nama_pegawai" id="nama_pegawai"required><br>
        <br>
            <label for="nomor_telp_pegawai"> nomor telp pegawai : </label><br>
            <input type = "text" name="nomor_telp_pegawai" id="nomor_telp_pegawai"required><br>
        <br>
            <label for="jabatan"> jabatan : </label><br>
            <input type = "text" name="jabatan" id="jabatan"required><br>
        <br> 

        <!-- NAMA Pegawai -->
        <div align="center"  class = "form-group">
        <label   style="width: 300px;" for="user">id user : </label><br>
        <select   style="width: 300px;" name="user" id="user" class="form-control" required><br>
            <br><option value="" size="10px">your username</option> <bsr>
            <?php 
                $sql_user = mysqli_query($conn, "SELECT * FROM user") or die
                (mysqli_error($conn));

                while($data_user = mysqli_fetch_assoc($sql_user)) {
                    echo '<option value="'.$data_user['id_user'].'">
                    '.$data_user['username'].'
                    </option>';
                }
            ?>
        </select>
        </div>
                <br>
        <br>
            <button type="submit" class="btn btn-light"  style="width: 150px; background-color: CadetBlue; color: Ivory;"  name="submit">tambah data</button>
    </ul>
    </form>
    
</body>

<footer>
        <div class='footer-left' style="text-align: center;">
        Copyright  &#169; 2021 &nbsp;&nbsp;|&nbsp;&nbsp;  All right Reserved
        </div>   
    </footer>
</html>