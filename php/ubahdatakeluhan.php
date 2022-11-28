<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

require ('function.php');

$Idkeluhan = $_GET["Idkeluhan"];

$psn = query("SELECT * FROM tb_penyakit Where Idkeluhan = $Idkeluhan")[0];

if( isset($_POST["submit"]) ){
    if(ubahdataKeluhan($_POST) > 0)
    {
        echo"
            <script> 
            alert('Keluhan berhasil diubah');
            </script>
        ";
    }else {
        echo"
        <script> 
            alert('Keluhan gagal diubah');
        </script>
        ";
    }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Data Diri pasien</Title>
</head>
<body>
    <h1> Ubah data test pasien</h1>
    <form action="" method="post">
    <input type="hidden" name="Idkeluhan" value="<?= $psn["Idkeluhan"]; ?>">
        <ul>
            <li>
                <label for="TekananDarah">Tekanan darah : </label>
                <input type="text" name="TekananDarah" id="TekananDarah" required autocomplete="off">
            </li>
            <li>
                <label for="beratbadan">Berat badan : </label>
                <input type="number" name="beratbadan" id="beratbadan" required autocomplete="off">
            </li>
            <li>
                <label for="suhutubuh">Suhu Tubuh : </label>
                <input type="number" name="suhutubuh" id="suhutubuh" required autocomplete="off">
            </li>

            <li>
                <label for="keluhan">Keluhan : </label>
                <input type="text" name="keluhan" id="keluhan" required autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
    <form action="daftarpenyakit.php">
        <input type="hidden" name="NIK" value="<?=$psn["NIK"];?>" />
        <input type="submit" value="daftar keluhan">
    </form>
</body>
</html>