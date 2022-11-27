<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
require 'function.php';
$pasien = query("SELECT * FROM tb_pasien");

if(isset($_POST["cari"]) ){
    $pasien = cari($_POST["keyword"]);
}
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
 <a href="logout.php">logout</a>   
<h1>Daftar pasien</h1>
<table border ="1" cellpadding="10" cellspacing="0">
<a href="tambahpasien.php">Tambah pasien</a>
<br><br>

<form action="" method="post">

    <input type="text" name="keyword" size="30" autofocus placeholder="Input Nama Pasien" autocomplete="off">
    <button type="submit" name="cari"> Search</button>

</form>
<tr>
    <th>change?</th>
    <th>Nama</th>
    <th>ID</th>
    <th>NIK</th>
    <th>Gender</th>
    <th>Age</th>
</tr>
<?php $i= 1; ?>
<?php foreach($pasien as $row )  : ?>
<tr>
    <td>
        <a href="ubahdatapasien.php?IDpasien= <?= $row["IDpasien"] ?>" >ubah</a>|
        <a href="hapuspasien.php?IDpasien= <?= $row["IDpasien"] ?>" 
        onclick= "return confirm('Anda yakin?');">hapus</a>
    </td>
    <td><?= $row["Nama"]; ?> </td>
    <td><?= $row["IDpasien"]; ?></td>
    <td><a href="daftarpenyakit.php?NIK= <?=$row["NIK"]?>"> <?= $row["NIK"]; ?></a></td>
    <td><?= $row["Kelamin"]; ?></td>
    <td><?= $row["Usia"]; ?></td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
        <li>
            <a  href="tambahpasien.php">
            <button>Tambah pasien</button>
        </a>
        </li>

</body>
</html>