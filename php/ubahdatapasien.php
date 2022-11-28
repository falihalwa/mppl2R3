<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

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
    <h1> Tambah data pasien</h1>
    <form action="" method="post">
    <input type="hidden" name="IDpasien" value="<?=$IDpasien; ?>">
        <ul>
            <li>
                <label for="NIK">NIK : </label>
                <input type="Number" name="NIK" id="NIK" required autocomplete="off">
            </li>
            <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required autocomplete="off">
            </li>
            <li>
                <label for="Alamat">Alamat : </label>
                <input type="text" name="Alamat" id="alamat" required autocomplete="off">
            </li>
            <li>
                <label for="Kelamin">Kelamin : </label>
                <select name= "Kelamin"required>
                    <option value="">Pilih </option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </li>
            <li>
                <label for="Golongandarah">Golongan darah : </label>
                <select name= "Golongandarah"required>
                    <option value="">Pilih </option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="-">-</option>
                </select>
            </li>
            <li>
                <label for="Usia">Usia : </label>
                <input type="number" name="Usia" id="Usia" required autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>