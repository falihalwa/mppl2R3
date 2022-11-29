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



///////USER//////

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password1 = mysqli_real_escape_string($conn, $data["password1"]);
	$nama = htmlspecialchars($data["nama"]);
	$job = htmlspecialchars($data["job"]);

	$result = mysqli_query($conn, "SELECT username FROM tb_user Where username = '$username'");
	
	if(mysqli_fetch_assoc($result) ) {
		echo "<script> alert('username sudah terdaftar!')</script>";
		return false;
	}

	if( $password !== $password1){
		echo "<script>
			alert('password konfirmasi tidak sesusai');
		</script>";
		return false;
	}
	
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO tb_user VALUES('','$password','$username','$nama','$job')");
	return true;
}



/////PASIEN//////

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
	Golongandarah = '$Golongandarah',
	Usia = '$Usia'
	WHERE IDpasien = $IDpasien
	";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM tb_pasien where Nama Like '%$keyword%' 
	OR
	NIK LIKE'%$keyword%'
	";
	return query($query);
}



/////PENYAKIT/////


function tambahkeluhan($data){
	global $conn;
	$NIK = ($data["NIK"]);
	$TekananDarah = htmlspecialchars($data["TekananDarah"]);
    $beratbadan = htmlspecialchars($data["beratbadan"]);
    $tinggibadan = htmlspecialchars($data["tinggibadan"]);
	$suhutubuh = htmlspecialchars($data["suhutubuh"]);
	$keluhan = htmlspecialchars($data["keluhan"]);
	$time = htmlspecialchars($data["jam"]);
	$date = htmlspecialchars($data["tanggal"]);

	$query = "INSERT INTO tb_penyakit
	VALUES ('','$NIK','$TekananDarah','$beratbadan','$tinggibadan','$suhutubuh','$keluhan','$time','$date','','')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function diagnosis($data){
	global $conn;
	$Idkeluhan = $data["Idkeluhan"];
	$diagnosis = htmlspecialchars($data["diagnosis"]);
	$resepobat = htmlspecialchars($data["resepobat"]);

	$query = " UPDATE tb_penyakit SET
	diagnosis ='$diagnosis',
	resepobat = '$resepobat'
	Where Idkeluhan = '$Idkeluhan'
	";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapuskeluhan($Idkeluhan){
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_penyakit where Idkeluhan = $Idkeluhan");
	return mysqli_affected_rows($conn);
}

function ubahdatakeluhan($data){
	global $conn;
	$Idkeluhan = $data["Idkeluhan"];
	// $NIK = ($data["NIK"]);
    $Tekanandarah = htmlspecialchars($data["TekananDarah"]);
    $beratbadan = htmlspecialchars($data["beratbadan"]);
	$suhutubuh = htmlspecialchars($data["suhutubuh"]);
	$keluhan = htmlspecialchars($data["keluhan"]);
    

	$query = "UPDATE tb_penyakit SET 
	Tekanandarah ='$Tekanandarah',
	beratbadan = '$beratbadan',
	suhutubuh ='$suhutubuh',
	keluhan = '$keluhan'
	Where Idkeluhan = $Idkeluhan
	";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}



?>