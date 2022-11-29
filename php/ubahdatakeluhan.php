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
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- Bootsrap JS -->
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- My Style -->
        <link rel="stylesheet" href="style/style.css" />

        <!-- Fonts Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />

        <title>Ubah Data Diri pasien</Title>
    </head>
<body>
    <!-- <h1> Ubah data test pasien</h1>
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
    </form> -->


    <nav class="navbar bg-white">
        <div class="container-fluid d-flex justify-content-start">
            <!-- Tulisan Kapas -->
            <span class="navbar-brand mb-0 h1" style="font-family: 'Roboto', sans-serif"> <img src="" alt="" /> Kapas</span>
        </div>
    </nav>
    <section class="d-flex mt-3 bg-light" style="height: 85vh">
        <!-- navs&tabs -->
        <div class="container w-25 bg-white rounded-end rounded-3" style="margin-right: 15px; margin-top: 10px; padding-top: 20px">
            <nav class="nav flex-column">
                <a class="nav-link active nav-inactive border-black-50" style="margin-bottom: 25px" aria-current="page" href="daftarKunjungan.php"> <img src="img/calendar-inactive.png" alt="" /> Kunjungan</a>
                <a class="nav-link border-end border-3 nav-active" href="daftarpasien.php">
                    <img src="img/pasien-active.png" alt="" />
                    Pasien
                </a>
            </nav>
        </div>

        <!-- main content -->
        <div class="mct container bg-white rounded-3" style="margin-top: 10px; margin-right: 20px; padding-top: 20px ">
            <form action="" method="post">
            <input type="hidden" name="Idkeluhan" value="<?= $psn["Idkeluhan"]; ?>">
                <ul>
                    <h3 class="border-bottom" style="text-align: right; padding-bottom: 15px">Ubah Data Keluhan</h3>

                    <div class="mb-3 text-black-50">
                        <label for="TekananDarah" class="form-lable">Tekanan darah</label>
                        <input type="text" name="TekananDarah" id="TekananDarah" required autocomplete="off" class="form-control" value="<?= $psn["TekananDarah"]; ?>">
                    </div>
                    <div class="mb-3 text-black-50">
                        <label for="beratbadan" class="form-lable">Berat badan</label>
                        <input type="number" name="beratbadan" id="beratbadan" required autocomplete="off" class="form-control" value="<?= $psn["beratbadan"]; ?>">
                    </div>
                    <div class="mb-3 text-black-50">
                        <label for="tinggibadan" class="form-lable">Tinggi badan</label>
                        <input type="number" name="tinggibadan" id="tinggibadan" required autocomplete="off" class="form-control" value="<?= $psn["tinggibadan"]; ?>">
                    </div>
                    <div class="mb-3 text-black-50">
                        <label for="suhutubuh" class="form-lable">Suhu Tubuh</label>
                        <input type="number" name="suhutubuh" id="suhutubuh" required autocomplete="off" class="form-control" value="<?= $psn["suhutubuh"]; ?>">
                    </div>

                    <div class="mb-3 text-black-50">
                        <label for="keluhan" class="form-lable">Keluhan</label>
                        <input type="text" name="keluhan" id="keluhan" required autocomplete="off" class="form-control" value="<?= $psn["keluhan"]; ?>">
                    </div>

                    <div class="mb-3 text-black-50">
                        <button type="submit" name="submit" class="btn text-white" style="background-color: #6c5dd3">Submit</button>
                    </div>
                </ul>
            </form>
            <form action="daftarpenyakit.php" class="bg-white">
                <input type="hidden" name="NIK" value="<?=$psn["NIK"]?>" />
                <input type="submit" value="Daftar Keluhan" class="p-3 rounded-3" style="border: none">
            </form>
        </div>
    </section>

</body>
</html>