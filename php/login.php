<?php
session_start();
require 'function.php';

if(isset($_POST["login"]) ){

    $uername = $_POST["username"];
    $password = $_POST["password"];

    mysqli_query($conn, "SELECT * FROM tb_user Where username = '$username' ");

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label {display: block;}
    </style>
</head>
<body>
    <h1> Halaman Login </h1>
    <?php if(isset($error) ) : ?>
        <p style="color: red; font-style: ">username / pasword salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username : </label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">password : </label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="login">login</button>             <a  href="register.php">
            <button>registrasi</button>
             </a>
            </li>
            
        
</ul>
</body>
</html>