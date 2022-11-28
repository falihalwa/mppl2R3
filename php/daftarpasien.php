<?php

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
require 'function.php';
$pasien = query("SELECT * FROM tb_pasien");

if(isset($_POST["cari"]) ){
    $pasien = cari($_POST["keyword"]);
}

if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}


if( isset($_POST["submit"]) ){
    if(tambahpasien($_POST) > 0)
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


    <title>halaman Daftar pasien</title>

</head>
<body>   
     
    <!-- As a heading -->
    <nav class="navbar bg-white">
      <div class="container-fluid d-flex justify-content-start">
        <!-- Tulisan Kapas -->
        <span class="navbar-brand mb-0 h1" style="font-family: 'Roboto', sans-serif"> <img src="" alt="" /> Kapas</span>
        <!-- Search Bar -->
        <form action="" method="post" class="d-flex w-50" role="search">

            <input type="text" name="keyword" size="30" autofocus placeholder="Input Nama Pasien" autocomplete="off" class="form-control me-2 bg-light" style="border: none">
            <button type="submit" name="cari"style="border: none; padding: 5px,5px"> Search</button>

        </form>
        
      </div>
    </nav>
    <a href="logout.php">logout</a>

    <!-- Tombol Tambah Pasien -->
    <div class="d-flex justify-content-end" style="margin-right: 10px">
        <a  href="tambahpasien.php">
            <button type="button" class="btn rounded-4 p-3" style="background-color: #6c5dd3; color: white; font-size: 16px">
            <img src="img/plus.png" alt="" />
                Tambah Pasien
            </button>
        </a>
    </div>

    <!-- Main Section -->
    <section class="d-flex mt-3 bg-light" style="height: 85vh">

      <!-- navs&tabs -->
      <div class="container w-25 bg-white rounded-end rounded-3" style="margin-right: 15px; margin-top: 10px; padding-top: 20px">
        <nav class="nav flex-column">
          <a class="nav-link active nav-inactive border-black-50 disabled" style="margin-bottom: 25px" aria-current="page" href="tabel-kunjungan.html"> <img src="img/calendar-inactive.png" alt="" /> Kunjungan</a>
          <a class="nav-link border-end border-3 nav-active" href="#"> <img src="img/pasien-active.png" alt="" /> Pasien</a>
        </nav>
      </div>

      <!-- tabel -->

      <div class="container bg-white rounded-3" style="margin-top: 10px; margin-right: 20px; padding-top: 20px ">
        <table class="table table-light table-responsive">
            <tr>
                <th>change</th>
                <th>Nama</th>
                <th>ID</th>
                <th>NIK</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
            <?php $i= 1; ?>
            <?php foreach($pasien as $row )  : ?>
            <tr>
                <td>
                    <a href="ubahdatapasien.php?IDpasien=<?=$row["IDpasien"] ?>" >ubah</a>|
                    <a href="hapuspasien.php?IDpasien=<?=$row["IDpasien"] ?>" 
                    onclick= "return confirm('Anda yakin?');">hapus</a>
                </td>
                <td><?= $row["Nama"]; ?> </td>
                <td><?= $row["IDpasien"]; ?></td>
                <td><a href="daftarpenyakit.php?NIK=<?=$row["NIK"]?>"><?=$row["NIK"]; ?></a></td>
                <td><?= $row["Kelamin"]; ?></td>
                <td><?= $row["Usia"]; ?></td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

        </table>
      </div>
    </section>

        
</body>
</html>