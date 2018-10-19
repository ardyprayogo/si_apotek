<?php

if(isset($_GET['id'])){

	include_once('../class/config.php');
	include_once('../class/resep.php');

	$conn = new Koneksi();
	$koneksi = $conn->GetKoneksi();

	$resep = new Resep($koneksi);
	$resep->kd_resep = $_GET['id'];

	if($resep->Delete()==TRUE){
		echo "
		<script>
			alert('Berhasil dihapus');
			window.location=('resep.php');
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

	header('location:resep.php');

}

?>