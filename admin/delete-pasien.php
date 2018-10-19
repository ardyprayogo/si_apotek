<?php

if(isset($_GET['id'])){

	include_once('../class/config.php');
	include_once('../class/pasien.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$pasien = new Pasien($koneksi);
	$pasien->id = $_GET['id'];

	if($pasien->Delete() == TRUE){
		echo "
		<script>
			alert('Berhasil');
			window.location=('pasien.php');
		</script>
		";
	}else{
	echo "
		<script>
			alert('Gagal');
			window.history.back();
		</script>
		";
	}

$koneksi->close();


}else{
	header('location:pasien.php');
}

?>