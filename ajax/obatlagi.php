<?php

require '../functions.php';

$keyword = $_GET["keyword"];


$query =  "SELECT * FROM obat 
            WHERE
            brand_obat LIKE '%$keyword%' OR 
            nama_obat LIKE '%$keyword%' OR
            jenis_obat LIKE '%$keyword%'
            ";
  
$obat = query($query);
?>


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