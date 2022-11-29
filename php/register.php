<?php
require 'function.php';

if(isset($_POST["register"]) ){
    if( $temp = registrasi($_POST) ){
        echo"
        <script> 
        alert( berhasil registrasi');";
        header("location:login.php");
}else {
    echo mysqli_error($conn);
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

    <title>Halaman Registrasi</title>
    <style>
        label {display: block;}
    </style>
</head>
<body>
    
    <!-- Main Section -->
    <section class="login d-flex justify-content-center" style="height: 75vh">
      <!-- right splitted page -->
      <div class="login-right w-50 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <!-- login form -->
          <div class="col-8 border rounded p-5 mt-5">
            <div class="header">
              <h1>Registrasi</h1>
            </div>

            <div class="login-form">
                <form action="" method="post">
                    
                        <div>
                            <label class="form-label" for="username">username</label>
                            <input class="form-control" type="text" name="username" id="username" required>
                        </div>
                        <div>
                            <label class="form-label" for="password">password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div>
                            <label class="form-label" for="password1">konfirmasi password</label>
                            <input class="form-control" type="password" name="password1" id="password1" required>
                        </div>
                        <div>
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama">
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="job">Pekerjaan</label>
                            <select class="form-select"name= "job"required>
                                <option value="">Pilih </option>
                                <option value="Perawat">Perawat</option>
                                <option value="Dokter">Dokter</option>
                                <option value="Apoteker">Apoteker</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="register" class="signin bg-primary" style="border: none">Register</button>
                        </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>