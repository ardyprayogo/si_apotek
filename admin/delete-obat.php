<?php

if(isset($_GET['id'])){

	include_once('../class/config.php');
	include_once('../class/obat.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$obat = new Obat($koneksi);
	$obat->kd_obat = $_GET['id'];

	if($obat->Delete()==TRUE){
		echo "
		<script>
			alert('Berhasil dihapus');
			window.location=('obat.php');
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

	header('location:obat.php');

}

?>