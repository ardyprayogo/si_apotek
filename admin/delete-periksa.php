<?php

if(isset($_GET['id'])){

	include_once('../class/config.php');
	include_once('../class/periksa.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$periksa = new Periksa($koneksi);
	$periksa->kd_periksa = $_GET['id'];

	if($periksa->Delete()==TRUE){
		echo "
		<script>
			alert('Berhasil dihapus');
			window.location=('periksa.php');
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

	header('location:periksa.php');

}

?>