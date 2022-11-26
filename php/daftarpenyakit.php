<?php
require 'function.php';
$NIK = $_GET["NIK"];
$pasien = query("SELECT * FROM tb_penyakit where NIK = $NIK");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Daftar pasien</title>

</head>
<body>
    
<h1>Daftar pasien</h1>
<table border ="1" cellpadding="10" cellspacing="0">

<tr>

    <th>watku</th>
    <th>ID</th>
    <th>Keluhan</th>
    <th>Diagnosis</th>
    <th>Obat</th>
    <th>Tekanan darah</th>
    <th>change?</th>
</tr>
<?php $i= 1; ?>
<?php foreach($pasien as $row )  : ?>
<tr>

    <td><?= $row["jam"]; ?> <?= $row["tanggal"]; ?></td>
    <td><?= $row["Idkeluhan"]; ?> </td>
    <td><?= $row["keluhan"]; ?></td>
    <td><?= $row["diagnosis"]; ?></td>
    <td><?= $row["resepobat"]; ?></td>
    <td><?= $row["TekananDarah"]; ?></td>
    <td>
        <a href="">hapus</a>
    </td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>

</body>
</html>