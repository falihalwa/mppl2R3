<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
require ('function.php');
$Idkeluhan = $_GET["Idkeluhan"];
$pasien = query("SELECT * FROM tb_penyakit where Idkeluhan = $Idkeluhan");
if( isset($_POST["submit"]) ){
    if(diagnosis($_POST) > 0)
    {
        echo"
            <script> 
            alert('diagnosis berhasil ditambahkan');
            document.location.href = 'daftarpasien.php';
            </script>
        ";
    }else {
        echo"
        <script> 
            alert('diagnosis gagal ditambahkan');
            document.location.href = 'daftarpasien.php';
        </script>
        ";
    }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Diagnosis Keluhan</Title>
</head>
<body>
<table border ="1" cellpadding="10" cellspacing="0">
<tr>
    <th>change?</th>
    <th>watku</th>
    <th>ID</th>
    <th>Keluhan</th>
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
    <td><?= $row["keluhan"]; ?> </td>
    <td><?= $row["TekananDarah"]; ?></td>
    <td><?= $row["beratbadan"]; ?></td>
    <td><?= $row["suhutubuh"]; ?></td>

</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>

    <h1> Tambah Diagnosis keluhan</h1>
    <form action="" method="post">
        <ul>
            <li>
                <input type="hidden" name="Idkeluhan" value="<?=$Idkeluhan?>">
            </li>
            <li>
                <label for="diagnosis">Diagnosis : </label>
                <input type="text" name="diagnosis" id="diagnosis" required autocomplete="off">
            </li>
            <li>
                <label for="resepobat">Resep Obat : </label>
                <input type="text" name="resepobat" id="resepobat" required autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    
    </form>
    </body>
</html>