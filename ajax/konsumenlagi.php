<?php

require '../functions.php';

$keyword = $_GET["keyword"];


$query = "SELECT * FROM konsumen 
            WHERE
            nama_konsumen LIKE '%$keyword%' 
            ";
  
$konsumen = query($query);
?>


<table border="1" cellpadding="10" cellspacing="0">
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