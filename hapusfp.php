<?php

require 'functions.php';

$no_transaksi=$_GET["no_transaksi"];

if( hapusfaktur_penjualan($no_transaksi) > 0) {
    // var_dump(mysqli_affected_rows($conn));
    // 
    //      if( mysqli_affected_rows($conn) > 0) {
    //     echo "data berhasil masuk";
    // }else  {
    //     echo "data gagal masuk";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }
    echo "
        <script>
            alert('data berhasil dihapuskan');
            document.location.href='fakturpenjualan.php'
        </script>
        ";
    }else  {
       echo "
        <script>
           alert('data gagal dihapuskan');
           document.location.href='fakturpenjualan.php'
        </script>
       ";
}



?>