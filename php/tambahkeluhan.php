<?php
require ('function.php');
if( isset($_POST["submit"]) ){
    if(tambahkeluhan($_POST) > 0)
    {
        echo"
            <script> 
            alert('pasien berhasil ditambahkan');
            document.location.href = 'daftarpasien.php';
            </script>
        ";
    }else {
        echo"
        <script> 
            alert('pasien gagal ditambahkan');
            document.location.href = 'daftarpasien.php';
        </script>
        ";
    }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Diri pasien</Title>
</head>
<body>
    <h1> Tambah data pasien</h1>
    <form action="" method="post">
    <input type="hidden" name="NIK" value="<?= $psn["NIK"]; ?>">
    <input type="hidden" name="jam" value="<?= $psn["jam"]; ?> ">
    <input type="hidden" name="tanggal" value="<? $psn["tanggal"]; ?>">
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
                <input type="text" name="keluhan" id="suhutubuh" required autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    
    </form>
    </body>
</html>