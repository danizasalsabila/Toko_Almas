<?php 

//koneksi kedatabase
$conn = mysqli_connect("localhost", "root", "", "almassistem");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }



//----------------------------------------------------------------------------
//UNTUK TABEL OBAT
function tambah($data){
    global $conn;
    $nomor_produksi_obat = $data["nomor_produksi_obat"];
    $nama_obat = $data["nama_obat"];
    $brand_obat = $data["brand_obat"];
    $expired_obat = $data["expired_obat"];
    $manufactured_obat = $data["manufactured_obat"];
    $jenis_obat = $data["jenis_obat"];
    $stok_obat = $data["stok_obat"];
    $harga_obat = $data["harga_obat"];

    $query = "INSERT INTO obat VALUES
    ('', '$nomor_produksi_obat', '$nama_obat', '$brand_obat', '$expired_obat', '$manufactured_obat', '$jenis_obat', '$stok_obat', '$harga_obat')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function hapus($kode_obat){
    global $conn;
    mysqli_query($conn, "DELETE FROM obat WHERE kode_obat = $kode_obat");
    return mysqli_affected_rows($conn);
} 


function ubah($data){
    global $conn;

    $kode_obat = $data["kode_obat"];
    $nomor_produksi_obat = $data["nomor_produksi_obat"];
    $nama_obat = $data["nama_obat"];
    $brand_obat = $data["brand_obat"];
    $expired_obat = $data["expired_obat"];
    $manufactured_obat = $data["manufactured_obat"];
    $jenis_obat = $data["jenis_obat"];
    $stok_obat = $data["stok_obat"];
    $harga_obat = $data["harga_obat"];

    $query = "UPDATE obat SET
                nomor_produksi_obat = $nomor_produksi_obat,
                nama_obat = '$nama_obat', 
                brand_obat ='$brand_obat',
                expired_obat = '$expired_obat', 
                manufactured_obat ='$manufactured_obat', 
                jenis_obat = '$jenis_obat', 
                stok_obat = $stok_obat, 
                harga_obat = $harga_obat
                WHERE kode_obat = $kode_obat
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function ubahjenis($data){
  global $conn;

  $id_jenis = $data["id_jenis"];
  
  $jenis_obat = $data["jenis_obat"];

  $query = "UPDATE jenis SET
             
              jenis_obat = '$jenis_obat'
              WHERE id_jenis = $id_jenis
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function search($keyword) {
  $query = "SELECT * FROM obat 
            WHERE
            brand_obat LIKE '%$keyword%' OR 
            nama_obat LIKE '%$keyword%' OR
            jenis_obat LIKE '%$keyword%'
            ";
  return query($query);
}



//----------------------------------------------------------------------------
//UNTUK TABEL USER
function registrasi($data) {
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  //cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  
  if(mysqli_fetch_assoc($result)){
      echo "<script>
      alert('username already exists');
      </script>";
      return false;
  }

  //cek konfrimasi password
  if( $password !== $password2) {
      echo "<script>
      alert('incorrect password');
      </script>";
      return false;
  }
  
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan password baru kedatabase
  mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

  return mysqli_affected_rows($conn);

}



//----------------------------------------------------------------------------
//UNTUK TABEL PEGAWAI
function ubahpegawai($data){
  global $conn;

  $id_pegawai = $data["id_pegawai"];
  $nama_pegawai = $data["nama_pegawai"];
  $nomor_telp_pegawai = $data["nomor_telp_pegawai"];
  $jabatan = $data["jabatan"];
  $id_user = $data["id_user"];

  $query = "UPDATE pegawai SET
              nama_pegawai = '$nama_pegawai', 
              nomor_telp_pegawai = $nomor_telp_pegawai,
              jabatan = '$jabatan'
              WHERE id_pegawai = $id_pegawai AND id_user = $id_user
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}



function tambahpegawai($data){
  global $conn;

  $nama_pegawai = $data["nama_pegawai"];
  $nomor_telp_pegawai = $data["nomor_telp_pegawai"];
  $jabatan= $data["jabatan"];

  $query = "INSERT INTO pegawai VALUES
  ('', '$nama_pegawai', '$nomor_telp_pegawai', '$jabatan')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function hapuspegawai($id_pegawai){
  global $conn;
  mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");
  return mysqli_affected_rows($conn);

}


function ubahprodusen($data){
  global $conn;

  $id_produsen = $data["id_produsen"];
  $brand_obat = $data["brand_obat"];
  $alamat = $data["alamat"];
  $no_telp = $data["no_telp"];

  $query = "UPDATE produsen SET
              brand_obat = '$brand_obat', 
              alamat = '$alamat',
              no_telp = $no_telp
              WHERE id_produsen = $id_produsen
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusprodusen($id_produsen){
  global $conn;
  mysqli_query($conn, "DELETE FROM produsen WHERE id_produsen = $id_produsen");
  return mysqli_affected_rows($conn);

}


function hapusstok($id_stok){
  global $conn;
  mysqli_query($conn, "DELETE FROM stok WHERE id_stok = $id_stok");
  return mysqli_affected_rows($conn);

}

function tambahprodusen($data){
  global $conn;

  $nomor_produksi_obat = $data["nomor_produksi_obat"];
  $brand_obat = $data["brand_obat"];
  $id_jenis= $data["id_jenis"];
  $alamat= $data["alamat"];
  $no_telp= $data["no_telp"];
  $kode_obat= $data["kode_obat"];


  $query = "INSERT INTO produsen VALUES
  ('', '$nomor_produksi_obat', '$brand_obat', '$id_jenis', '$alamat', '$no_telp', '$kode_obat')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// function hapuspegawai($id_pegawai){
//   global $conn;
//   mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");
//   return mysqli_affected_rows($conn);

// }


function hapusjenis($id_jenis){
  global $conn;
  mysqli_query($conn, "DELETE FROM jenis WHERE id_jenis = $id_jenis");
  return mysqli_affected_rows($conn);

}




function searchpegawai($keyword) {
  $query = "SELECT * FROM pegawai
            INNER JOIN user ON pegawai.id_user = user.id_user
            WHERE
            nama_pegawai LIKE '%$keyword%' OR
            jabatan LIKE '%$keyword%' OR
            username  LIKE '%$keyword%'
            ";
  return query($query);
}



//----------------------------------------------------------------------------
//UNTUK TABEL KONSUMEN
function ubahkonsumen($data){
  global $conn;

  $id_konsumen = ($data["id_konsumen"]);
  $nama_konsumen = htmlspecialchars($data["nama_konsumen"]);
  $nomor_telp_konsumen = htmlspecialchars($data["nomor_telp_konsumen"]);

  $query = "UPDATE konsumen SET
              nama_konsumen = '$nama_konsumen', 
              nomor_telp_konsumen = $nomor_telp_konsumen
              
              WHERE id_konsumen = $id_konsumen
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function tambahkonsumen($data){
  global $conn;

  $nama_konsumen = $data["nama_konsumen"];
  $nomor_telp_konsumen = $data["nomor_telp_konsumen"];

  $query = "INSERT INTO konsumen VALUES
  ('', '$nama_konsumen', '$nomor_telp_konsumen')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function tambahharga($data){
  global $conn;

  $harga_obat = $data["harga_obat"];

  $query = "INSERT INTO harga VALUES
  ('', '$harga_obat')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}



function tambahstok($data){
  global $conn;

  $stok_obat_masuk = $data["stok_obat_masuk"];
  $stok_obat_keluar = $data["stok_obat_keluar"];
  $kode_obat = $data["kode_obat"];
  $nama_obat = $data["nama_obat"];


  $query = "INSERT INTO stok_obat VALUES
  ('', '$stok_obat_masuk', '$stok_obat_keluar', '$kode_obat', '$nama_obat')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


//UNTUK TABEL JENIS
function tambahjenis($data){
  global $conn;
  $jenis_obat = $data["jenis_obat"];

  $query = "INSERT INTO jenis VALUES
  ('', '$jenis_obat')
  ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function hapuskonsumen($id_konsumen){
  global $conn;
  mysqli_query($conn, "DELETE FROM konsumen WHERE id_konsumen = $id_konsumen");
  return mysqli_affected_rows($conn);

}


function searchkonsumen($keyword) {
  $query = "SELECT * FROM konsumen 
            WHERE
            nama_konsumen LIKE '%$keyword%' 
            ";
  return query($query);
}




//----------------------------------------------------------------------------
//UNTUK TABEL FAKTUR PENJUALAN
function ubahfaktur_penjualan($data){
  global $conn;

  //ambil data dari elemen tiap faktur penjualan
  $no_transaksi = $data["no_transaksi"];
  $kode_obat = $data["kode_obat"];
  $id_jenis = $data["id_jenis"];
  $id_harga = $data["id_harga"];
  $quantity_jual = $data["quantity_jual"];
  $jumlah_pembayaran = $data["jumlah_pembayaran"];
  $id_konsumen = $data["id_konsumen"];
  $id_pegawai = $data["id_pegawai"];
  $tgl_transaksi = $data["tgl_transaksi"];
  $id_produsen = $data["id_produsen"];

  $query = "UPDATE faktur_penjualan 
              SET
              kode_obat = $kode_obat, 
              id_jenis = $id_jenis,
              id_harga = $id_harga,
              quantity_jual = $quantity_jual,
              jumlah_pembayaran = $jumlah_pembayaran,
              id_konsumen = $id_konsumen,
              id_pegawai = $id_pegawai,
              tgl_transaksi = $tgl_transaksi,
              id_produsen = $id_produsen

              WHERE no_transaksi = $no_transaksi 
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapusfaktur_penjualan($no_transaksi){
  global $conn;
  mysqli_query($conn, "DELETE FROM faktur_penjualan WHERE no_transaksi = $no_transaksi");
  return mysqli_affected_rows($conn);

}



function searchfaktur_penjualan($keyword) {
  $query = "SELECT * FROM faktur_penjualan                      
            INNER JOIN obat ON faktur_penjualan.kode_obat = obat.kode_obat
            INNER JOIN jenis ON faktur_penjualan.id_jenis = jenis.id_jenis
            INNER JOIN harga ON faktur_penjualan.id_harga = harga.id_harga
            INNER JOIN konsumen ON faktur_penjualan.id_konsumen = konsumen.id_konsumen
            INNER JOIN pegawai ON faktur_penjualan.id_pegawai = pegawai.id_pegawai
            INNER JOIN produsen ON faktur_penjualan.id_produsen = produsen.id_produsen
            WHERE 
            nama_pegawai LIKE '%$keyword%' OR
            nama_obat LIKE '%$keyword%' OR
            nama_konsumen LIKE '%$keyword%' OR
            tgl_transaksi LIKE '%$keyword%' 
            ";
  return query($query);
}

// function tambahfaktur_penjualan($data){
//   $quantity_jual =  trim(mysqli_real_escape_string($conn,$POST['quantity_jual']));
//   $jumlah_pembayaran = trim(mysqli_real_escape_string($conn,$POST['jumlah_pembayaran']));
//   $tgl_transaksi =  trim(mysqli_real_escape_string($conn,$POST['tgl_transaksi']));
//   $jenis = trim(mysqli_real_escape_string($conn,$POST['jenis']));
//   $harga = trim(mysqli_real_escape_string($conn,$POST['harga']));
//   $konsumen = trim(mysqli_real_escape_string($conn,$POST['konsumen']));
//   $pegawai = trim(mysqli_real_escape_string($conn,$POST['pegawai']));
//   $produsen = trim(mysqli_real_escape_string($conn,$POST['produsen']));



//   mysqli_query($conn, "INSERT INTO faktur_penjualan(id_jenis, id_harga, quantity_jual, jumlah_pembayaran, id_konsumen, id_pegawai, tgl_transaksi, id_produsen)
//                       VALUES ('', '$jenis', '$harga', '$quantity_jual', '$jumlah_pembayaran',  '$konsumen', '$pegawai', '$tgl_transaksi', '$id_produsen')
//                    ") or die(mysqli_error($conn));

//       $obat = $_POST['obat'];
//       foreach ($obat as $row){
//           mysqli_query($conn, "INSERT INTO obat(kode_obat)  VALUES ('', '$row')
//        ") or die(mysqli_error($conn));
//       }

//   echo "<script>  alert('data berhasil ditambahkan');
//           document.location.href='fakturpenjualan.php' </script>";
//     }

// function tambahfaktur_penjualan($data){
//   global $conn;
//   $query="SELECT * FROM faktur_penjualan                      
//                             INNER JOIN obat ON faktur_penjualan.kode_obat = obat.kode_obat
//                             INNER JOIN jenis ON faktur_penjualan.id_jenis = jenis.id_jenis
//                             INNER JOIN harga ON faktur_penjualan.id_harga = harga.id_harga
//                             INNER JOIN konsumen ON faktur_penjualan.id_konsumen = konsumen.id_konsumen
//                             INNER JOIN pegawai ON faktur_penjualan.id_pegawai = pegawai.id_pegawai
//                             INNER JOIN produsen ON faktur_penjualan.id_produsen = produsen.id_produsen
//                             ";

//   $kode_obat = $data["nama_obat"];
//   $id_jenis = $data["jenis_obat"];
//   $id_harga = $data["harga_obat"];
//   $quantity_jual = $data["quantity_jual"];
//   $jumlah_pembayaran = $data["jumlah_pembayaran"];
//   $id_konsumen = $data["nama_konsumen"];
//   $id_pegawai = $data["nama_pegawai"];
//   $tgl_transaksi = $data["tgl_transaksi"];
//   $id_produsen = $data["brand_obat"];

//   $query = "INSERT INTO faktur_penjualan VALUES
//   ('', '$kode_obat','$id_jenis','$id_harga','$quantity_jual', 
//   '$jumlah_pembayaran', '$id_konsumen', '$id_pegawai', '$tgl_transaksi', '$id_produsen')";

//   mysqli_query($conn, $query);
//   return mysqli_affected_rows($conn);
// }





//----------------------------------------------------------------------------
//UNTUK TABEL PESAN OBAT
function searchpesan_obat($keyword) {
  $query = "SELECT * FROM pesan_obat 
            INNER JOIN produsen ON pesan_obat.id_produsen = produsen.id_produsen
            INNER JOIN obat ON pesan_obat.kode_obat = obat.kode_obat
            INNER JOIN jenis ON pesan_obat.id_jenis = jenis.id_jenis
            INNER JOIN stok_obat ON pesan_obat.id_stok = stok_obat.id_stok
            INNER JOIN owner ON pesan_obat.id_owner = owner.id_owner
            WHERE 
            brand_obat LIKE '%$keyword%' OR
            nama_obat LIKE '%$keyword%' OR
            jenis_obat LIKE '%$keyword%' OR
            tanggal_pemesanan LIKE '%$keyword%' 
            ";
  return query($query);
}



function hapuspesan_obat($id_pesan){
  global $conn;
  mysqli_query($conn, "DELETE FROM pesan_obat WHERE id_pesan = $id_pesan");
  return mysqli_affected_rows($conn);

}



// function ubah($data) {
//     global $conn;
//     //ambil data dari tiap elemen dalam form
//    $kode_obat =$data["kode_obat"];
//    $nomor_produksi_obat =htmlspecialchars($data["nomor_produksi_obat"]);
//    $nama_obat =htmlspecialchars($data["nama_obat"]);
//    $brand_obat =htmlspecialchars($data["brand_obat"]);
//    $expired_obat =htmlspecialchars($data["expired_obat"]);
//    $manufactured_obat =htmlspecialchars($data["manufactured_obat"]);
//    $jenis_obat =htmlspecialchars($data["jenis_obat"]);
//    $stok_obat =htmlspecialchars($data["stok_obat"]);
//    $harga_obat =htmlspecialchars($data["harga_obat"]);
 
//     $query = "UPDATE obat SET
//     nomor_produksi_obat = $nomor_produksi_obat,
//     nama_obat='$nama_obat',
//     brand_obat ='$brand_obat',
//     expired_obat = '$expired_obat',
//     manufactured_obat = '$manufactured_obat',
//     jenis_obat = '$jenis_obat',
//     stok_obat = $stok_obat,
//     harga_obat = $harga_obat
//     WHERE 
//     kode_obat = $kode_obat
//     ";
    
//      mysqli_query($conn, $query);

//      return mysqli_affected_rows($conn);
// }
?>