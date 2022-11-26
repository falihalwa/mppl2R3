<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_kapas");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}

	return $rows;
}

function tambahpasien($data){
	global $conn;
	$NIK = htmlspecialchars($data["NIK"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
	$Kelamin = htmlspecialchars($data["Kelamin"]);
	$Usia = htmlspecialchars($data["Usia"]);
    $Golongandarah = htmlspecialchars($data["Golongandarah"]);
    

	$query = "INSERT INTO tb_pasien
	VALUES ('','$NIK','$Nama','$Alamat','$Kelamin','$Usia','$Golongandarah')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapuspasien($IDpasien){
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_pasien where IDpasien = $IDpasien");
	return mysqli_affected_rows($conn);
}
function ubahdatapasien($data){
	global $conn;
	$IDpasien = $data["IDpasien"];
	$NIK = htmlspecialchars($data["NIK"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
	$Kelamin = htmlspecialchars($data["Kelamin"]);
	$Usia = htmlspecialchars($data["Usia"]);
    $Golongandarah = htmlspecialchars($data["Golongandarah"]);
    

	$query = "UPDATE tb_pasien SET 
	NIK = '$NIK',
	Nama ='$Nama',
	Alamat = '$Alamat',
	Kelamin ='$Kelamin',
	Usia = '$Usia'
	Where IDpasien = $IDpasien
	";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}



/////PENYAKIT/////


function tambahkeluhan($data){
	global $conn;
	$NIK = htmlspecialchars($data["NIK"]);
	$Tekanandarah = htmlspecialchars($data["Tekanandarah"]);
    $beratbadan = htmlspecialchars($data["beratbadan"]);
    $tinggibadan = htmlspecialchars($data["tinggibadan"]);
	$suhutubuh = htmlspecialchars($data["suhutubuh"]);
	$keluhan = htmlspecialchars($data["keluhan"]);
	$time = htmlspecialchars($data["jam"]);
	$date = htmlspecialchars($data["tanggal"]);

	$query = "INSERT INTO tb_penyakit
	VALUES ('','$NIK','$tekanandarah','$beratbadan','$tinggibadan','$suhutubuh','$time','$date','','')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapuskeluhan($NIK){
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_penyakit where NIK = $NIK");
	return mysqli_affected_rows($conn);
}

function ubahdatakeluhan($data){
	global $conn;
	$IDpasien = $data["IDpasien"];
	$NIK = htmlspecialchars($data["NIK"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
	$Kelamin = htmlspecialchars($data["Kelamin"]);
	$Usia = htmlspecialchars($data["Usia"]);
    $Golongandarah = htmlspecialchars($data["Golongandarah"]);
    

	$query = "UPDATE tb_pasien SET 
	NIK = '$NIK',
	Nama ='$Nama',
	Alamat = '$Alamat',
	Kelamin ='$Kelamin',
	Usia = '$Usia'
	Where IDpasien = $IDpasien
	";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}



?>