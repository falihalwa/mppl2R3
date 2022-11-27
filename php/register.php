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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {display: block;}
    </style>
</head>
<body>
    <h1> Halaman Regristrasi</h1>
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
                <label for="password1">konfirmasi password : </label>
                <input type="password" name="password1" id="password1" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="job">Pekerjaan : </label>
                <select name= "job"required>
                    <option value="">Pilih </option>
                    <option value="Perawat">Perawat</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Apoteker">Apoteker</option>
                </select>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        
</ul>
</body>
</html>