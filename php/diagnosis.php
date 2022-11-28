<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
require ('function.php');
$NIK = $_GET["NIK"];
$Idkeluhan = $_GET["Idkeluhan"];
$pasien = query("SELECT * FROM tb_penyakit where Idkeluhan = $Idkeluhan");
$person = query("SELECT * FROM tb_pasien where NIK = $NIK")[0];
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

        <title>Tambah Diagnosis Keluhan</Title>
    </head>
    

    <body>
        
        <!-- As a heading -->
        <nav class="navbar bg-white">
            <div class="container-fluid d-flex justify-content-start">
                <!-- Tulisan Kapas -->
                <span class="navbar-brand mb-0 h1" style="font-family: 'Roboto', sans-serif"> <img src="" alt="" /> Kapas</span>
            </div>
        </nav>      
        
        <!-- Main Section -->
        <section class="d-flex mt-3 bg-light" style="height: 85vh">
            
            <!-- navs&tabs -->
            <div class="container w-25 bg-white rounded-end rounded-3" style="margin-right: 15px; margin-top: 10px; padding-top: 20px">
                <nav class="nav flex-column">
                    <a class="nav-link active nav-active border-black-50" style="margin-bottom: 25px" aria-current="page" href="tabel-kunjungan.html"> <img src="img/calendar-active.png" alt="" /> Kunjungan</a>
                    <a class="nav-link border-end border-3 nav-inactive" href="daftarpasien.php"> <img src="img/pasien-inactive.png" alt="" /> Pasien</a>
                </nav>
            </div>
            
            <!-- main section -->
            <div class="container bg-white rounded-3" style="margin-top: 10px; margin-right: 20px; padding-top: 20px ">
                <h3 class="border-bottom" style="text-align: right; padding-bottom: 15px">Tambah Diagnosa</h3>
                    <?php $i= 1; ?>
                    <?php foreach($pasien as $row )  : ?>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                <a href="ubahdatakeluhan.php?Idkeluhan=<?= $row["Idkeluhan"] ?>" >ubah</a>|
                <a href="hapusdatakeluhan.php?Idkeluhan=<?= $row["Idkeluhan"] ?>" 
                    onclick= "return confirm('Anda yakin?');">hapus
                </a>
                <div class="d-flex">
                    <div style="margin-right: 5%; width: 47%">
                        <div>
                            <h6 class="fw-bold">Keluhan</h6>
                            <p><?=$row["keluhan"]; ?></p>
                        </div>
                        <div>
                            <h6 class="fw-bold">ID</h6>
                            <p><?=$row["Idkeluhan"]; ?></p>
                        </div>
                        <div>
                            <h6 class="fw-bold">Waktu</h6>
                            <p><?=$row["jam"]; ?> | <?= $row["tanggal"]; ?></p>
                        </div>
                    </div>
                    <div style="width: 47%">
                        <div>
                            <h6 class="fw-bold">Tekanan Darah</h6>
                            <p><?=$row["TekananDarah"]; ?></p>
                        </div>
                        <div>
                            <h6 class="fw-bold">Berat Badan</h6>
                            <p><?=$row["beratbadan"]; ?></p>
                        </div>
                        <div>
                            <h6 class="fw-bold">Suhu Tubuh</h6>
                            <p><?=$row["suhutubuh"]; ?></p>
                        </div>
                    </div>
                </div>

                <form action="" method="post">
                    <ul>
                        <div>
                            <input type="hidden" name="Idkeluhan" value="<?=$Idkeluhan?>">
                        </div>

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnosa</label>
                            <textarea type="text" name="diagnosis" id="diagnosis" required autocomplete="off" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="resepobat" class="form-label">Resep Obat</label>
                            <textarea type="text" name="resepobat" id="resepobat" required autocomplete="off" class="form-control" rows="3"></textarea>
                        </div>

                        <div>
                            <button type="submit" name="submit" class="btn text-white" style="background-color: #6c5dd3">Submit</button>
                        </div>
                    </ul>
                
                </form>
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