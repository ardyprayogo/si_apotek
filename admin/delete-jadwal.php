<?php

if(isset($_GET['id'])){

	include_once('../class/config.php');
	include_once('../class/jadwal.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$jadwal = new Jadwal($koneksi);
	$jadwal->id_jadwal = $_GET['id'];

	if($jadwal->Delete()==TRUE){
		echo "
		<script>
			alert('Berhasil dihapus');
			window.location=('jadwal.php');
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

	header('location:jadwal.php');

}

?>