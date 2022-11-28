<?php
session_start();
require 'function.php';

if(isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user Where username = '$username' ");

    if( mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ){
            
            $_SESSION["login"] = true;

            header("Location: daftarpasien.php");
            exit;
        }

    }
    $error = true;
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

    <title>Halaman Login</title>

    
</head>
<body>
    
<!-- Top Section -->
    <nav class="navbar font" style="height: 25vh; background: rgba(200, 207, 218, 0.2)">
      <div class="container-fluid">
        <span class="kapas-text navbar-text"> Kapas </span>
      </div>
    </nav>
    <!-- Main Section -->
    <section class="login d-flex" style="height: 75vh">
      <!-- left splitted page -->
      <div class="login-left w-50 h-100">
        <div class="row justify-content-center h-100">
          <div class="col-10" style="margin-top: 100px">
            <h2>Kapas Profile</h2>
            <p>Kapas adalah blablabla</p>
          </div>
        </div>
      </div>

      <!-- right splitted page -->
      <div class="login-right w-50 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <!-- login form -->
          <div class="col-8 border rounded p-5">
            <div class="header">
              <h1>Login</h1>
            </div>

            <!-- form login -->
            <div class="login-form">
                
                <form action="" method="post">
                    <!-- input username -->
                    <div>
                        <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    </div>
                    <!-- input password -->
                    <div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                    <!-- tombol login -->
                    <div>
                        <button  class="signin bg-primary" style="border: none" type="submit" name="login">login</button> 
                    </div>
                </form>
                <?php if(isset($error) ) : ?>
                    <p style="color: red; font-style: ">username / pasword salah</p>
                <?php endif; ?>
                
                <form action="register.php">
                    <input type="submit" value = "register">
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>