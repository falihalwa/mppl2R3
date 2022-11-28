<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

require 'function.php';
$NIK = $_GET["NIK"];
$pasien = query("SELECT * FROM tb_penyakit where NIK = $NIK");
$person = query("SELECT * FROM tb_pasien where NIK = $NIK")[0];

?>
<!DOCTYPE html>
<html lang="en">
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

    <title>halaman daftar kunjungan</title>

</head>
    <body>
        <!-- As a heading -->
        <nav class="navbar bg-white">
            <div class="container-fluid d-flex justify-content-start">
                <!-- Tulisan Kapas -->
                <span class="navbar-brand mb-0 h1" style="font-family: 'Roboto', sans-serif"> <img src="" alt="" /> Kapas</span>
            </div>
        </nav>

        <!-- tombol tambah penyakit -->
        <div class="container-fluid d-flex justify-content-end" style="margin-right: 10px">
            <form action="tambahkeluhan.php">
                <input type="hidden" name="NIK" value="<?=$NIK?>" />
                <input type="submit" value="Tambah Keluhan" class="btn rounded-4 p-3" style="background-color: #6c5dd3; color: white; font-size: 16px">
            </form>
        </div>
        

        
        <!-- Main Section -->
        <section class="d-flex mt-3 bg-light" style="height: 85vh">
            
            <!-- navs&tabs -->
            <div class="container w-25 bg-white rounded-end rounded-3" style="margin-right: 15px; margin-top: 10px; padding-top: 20px">
                <nav class="nav flex-column">
                    <a class="nav-link active nav-active border-black-50" style="margin-bottom: 25px" aria-current="page" href="tabel-kunjungan.html"> <img src="img/calendar-active.png" alt="" /> Kunjungan</a>
                    <a class="nav-link border-end border-3 nav-inactive" href="daftarpasien.php"> <img src="img/pasien-inactive.png" alt="" /> Pasien</a>
                </nav>
            </div>
            
            <!-- tabel -->
            <div class="container bg-white rounded-3" style="margin-top: 10px; margin-right: 20px; padding-top: 20px ">
                <table class="table table-light table-responsive">
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
                        <td><a href="diagnosis.php?Idkeluhan=<?= $row["Idkeluhan"]; ?>&NIK=<?=$NIK?>"><?= $row["keluhan"]; ?></a></td>
                        <td><?= $row["diagnosis"]; ?></td>
                        <td><?= $row["resepobat"]; ?></td>
                        <td><?= $row["TekananDarah"]; ?></td>
                        <td><?= $row["beratbadan"]; ?></td>
                        <td><?= $row["suhutubuh"]; ?></td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="container w-25 bg-white rounded-end rounded-3" style="margin-right: 15px; margin-top: 10px; padding-top: 20px">
                <nav class="nav flex-column">
                    <div>
                        <h6 class="fw-bold">NIK</h6>
                        <p><?=$person["NIK"]; ?></p>
                    </div>
                    <div>
                        <h6 class="fw-bold">Nama</h6>
                        <p><?=$person["Nama"]; ?></p>
                    </div>
                    <div>
                        <h6 class="fw-bold">Alamat</h6>
                        <p><?=$person["Alamat"]; ?></p>
                    </div>
                    <div>
                        <h6 class="fw-bold">Jenis Kelamin</h6>
                        <p><?=$person["Kelamin"]; ?></p>
                    </div><div>
                        <h6 class="fw-bold">Golongan Darah</h6>
                        <p><?=$person["Golongandarah"]; ?></p>
                    </div>
                    <div>
                        <h6 class="fw-bold">Usia</h6>
                        <p><?=$person["Usia"]; ?></p>
                    </div>
                </nav>

            </div>
        </section>
    </body>
</html>