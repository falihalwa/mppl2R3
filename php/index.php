<?php
if(isset ($_SESSION["login"]) ){
    header("location: login.php");
    exit;
} else header("location: daftarpasien.php");
require 'function.php';

?>