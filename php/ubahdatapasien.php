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

        <title>Ubah Data Pasien</Title>
    </head>
<body>
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
          <a class="nav-link active nav-inactive border-black-50 disabled" style="margin-bottom: 25px" aria-current="page" href="tabel-kunjungan.html"> <img src="img/calendar-inactive.png" alt="" /> Kunjungan</a>
          <a class="nav-link border-end border-3 nav-active" href="daftarpasien.php"> <img src="img/pasien-active.png" alt="" /> Pasien</a>
        </nav>
      </div>

      <!-- tabel -->

      <div class="mct container bg-white rounded-3" style="margin-top: 10px; margin-right: 20px; padding-top: 20px ">
        <form action="" method="post">
            <input type="hidden" name="IDpasien" value="<?=$IDpasien; ?>">
                <ul>
                    <h3 class="border-bottom" style="text-align: right; padding-bottom: 15px">Ubah Data Pasien</h3>
                    
                    <div class="mb-3">
                        <label for="NIK" class="form-label text-black-50">NIK</label>
                        <input type="Number" name="NIK" id="NIK" required autocomplete="off" value="<?= $psn["NIK"]; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Nama" class="form-label text-black-50">Nama</label>
                        <input type="text" name="Nama" id="Nama" required autocomplete="off" value="<?= $psn["Nama"]; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label text-black-50">Alamat</label>
                        <input type="text" name="Alamat" id="alamat" required autocomplete="off" value="<?= $psn["Alamat"]; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Kelamin" class="form-label text-black-50">Jenis Kelamin</label>
                        <select name= "Kelamin"required value="<?= $psn["Kelamin"]; ?>" class="form-select">
                            <option value="<?= $psn["Kelamin"]; ?>"><?= $psn["Kelamin"]; ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Golongandarah" class="form-label text-black-50">Golongan darah</label>
                        <select name= "Golongandarah"required value="<?= $psn["Golongandarah"]; ?>" class="form-select">
                            <option value="<?= $psn["Golongandarah"]; ?>"><?= $psn["Golongandarah"]; ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Usia" class="form-label text-black-50">Usia</label>
                        <input type="number" name="Usia" id="Usia" required autocomplete="off" value="<?= $psn["Usia"]; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn text-white" style="background-color: #6c5dd3">Submit</button>
                    </div>
                </ul>
            </form>
      </div>
    </section>
</body>
</html>