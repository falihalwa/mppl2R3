<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

require ('function.php');

$NIK = $_GET["NIK"];

if( isset($_POST["submit"]) ){
    // if(tambahkeluhan($_POST) > 0)
    // {
    //     echo"
    //         <script> 
    //         alert('keluhan berhasil ditambahkan');
    //         </script>
    //     ";
    // }else {
    //     echo"
    //     <script> 
    //         alert('keluhan gagal ditambahkan');
    //     </script>
    //     ";
    // }
    }
$date = date('d-m-y h:i:s');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah keluhan pasien</Title>
</head>
<body>
    <h1> Tambah data keluhan pasien</h1>
    <form action="" method="post">
    <input type="hidden" name="NIK" value="<?=$NIK; ?>">
    <input type="hidden" name="jam" value="date('h:i:s')">
    <input type="hidden" name="tanggal" value="date('d-m-y')">
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
                <label for="tinggibadan">tinggi badan : </label>
                <input type="number" name="tinggibadan" id="tinggibadan" required autocomplete="off">
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
    <form action="daftarpenyakit.php">
        <input type="hidden" name="NIK" value="<?=$NIK?>" />
        <input type="submit" value="AREP TOLOL MEMEK KONTOL">
    </form>
    </body>
</html>