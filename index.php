<?php
if(isset ($_SESSION["login"]) ){
    header("location: php/login.php");
    exit;
} else header("location: php/daftarpasien.php");
require 'function.php';

?>