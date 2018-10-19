<?php


if(isset($_GET['id'])){
	include_once('../class/config.php');
	include_once('../class/dokter.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$dokter = new Dokter($koneksi);
	$dokter->id_dokter = $_GET['id'];

	if($dokter->Delete()==TRUE){
		echo "
		<script>
		alert('Berhasil dihapus');
		window.location=('dokter.php');
		</script>
		";
	}else{
		echo "
		<script>
		alert('Gagal dihapus');
		window.history.back();
		</script>
		";
	}
}else{
	header('location:dokter.php');
}




?>