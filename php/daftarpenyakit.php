<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

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
<h1>Daftar Keluhan</h1>
<table border ="1" cellpadding="10" cellspacing="0">
<input type="hidden" name="NIK" value="<?=["NIK"]; ?>">
<tr>
    <th>change?</th>
    <th>watku</th>
    <th>ID</th>
    <th>Keluhan</th>
    <th>Diagnosis</th>
    <th>Obat</th>
    <th>Tekanan darah</th>
    <th>berat badan</th>
    <th>suhu tubuh</th>

</tr>
<?php $i= 1; ?>
<?php foreach($pasien as $row )  : ?>
<tr>
    <td>
        <a href="ubahdatakeluhan.php?Idkeluhan=<?= $row["Idkeluhan"] ?>" >ubah</a>|
        <a href="hapusdatakeluhan.php?Idkeluhan=<?= $row["Idkeluhan"] ?>" 
        onclick= "return confirm('Anda yakin?');">hapus</a>
    </td>
    <td><?= $row["jam"]; ?> | <?= $row["tanggal"]; ?></td>
    <td><?= $row["Idkeluhan"]; ?> </td>
    <td><a href="diagnosis.php?Idkeluhan=<?=$row["Idkeluhan"]?>"><?= $row["keluhan"]; ?></a></td>
    <td><?= $row["diagnosis"]; ?></td>
    <td><?= $row["resepobat"]; ?></td>
    <td><?= $row["TekananDarah"]; ?></td>
    <td><?= $row["beratbadan"]; ?></td>
    <td><?= $row["suhutubuh"]; ?></td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>
<form action="tambahkeluhan.php">
        <input type="hidden" name="NIK" value="<?=$NIK?>" />
        <input type="submit" value="tambah keluhan">
</form>

</body>
</html>