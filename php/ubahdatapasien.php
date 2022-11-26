<?php
require ('function.php');

$IDpasien = $_GET["IDpasien"];

$psn = query("SELECT * FROM tb_pasien Where IDpasien = $IDpasien")[0];

if( isset($_POST["submit"]) ){
    if(ubahdatapasien($_POST) > 0)
    {
        echo"
            <script> 
            alert('pasien berhasil diubah');
            document.location.href = 'daftarpasien.php';
            </script>
        ";
    }else {
        echo"
        <script> 
            alert('pasien gagal diubah');
            document.location.href = 'daftarpasien.php';
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
    <h1> Ubah data pasien</h1>
    <form action="" method="post">
        <input type="hidden" name="IDpasien" value="<?= $psn["IDpasien"]; ?>">
        <ul>
            <li>
                <label for="NIK">NIK : </label>
                <input type="Number" name="NIK" id="NIK" required
                value ="<?=$psn["NIK"]?>">
            </li>
            <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required
                value ="<?=$psn["Nama"]?>">
            </li>
            <li>
                <label for="Alamat">Alamat : </label>
                <input type="text" name="Alamat" id="alamat" required
                value ="<?=$psn["Alamat"]?>">
            </li>
            <li>
                <label for="Kelamin">Kelamin : </label>
                <select name= "Kelamin"required value ="<?=$psn["Kelamin"]?>">
                    <option value="">Pilih </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    
                </select>
            </li>
            <li>
                <label for="Golongandarah">Golongan darah : </label>
                <select name= "Golongandarah"required value ="<?=$psn["Golongandarah"]?>">
                    <option value="">Pilih </option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="-">-</option>
                </select>
            </li>
            <li>
                <label for="Usia">Usia : </label>
                <input type="number" name="Usia" id="Usia" required
                value ="<?=$psn["Usia"]?>">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    
    </form>