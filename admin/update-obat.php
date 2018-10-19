<?php
$page = 'obat';
include_once('../class/config.php');
include_once('../function/function.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

session_start();
if(!isset($_SESSION['admin'])){
	header('location:login.php');
}else{

	if(isset($_GET['id'])){
		include_once('header.php');
		include_once('../class/obat.php');

?>


<div class="content-wrapper bg-light">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../admin/">Beranda</a>
      </li>
      <li class="breadcrumb-item active">Obat</li>
    </ol>
    <div class="row">
      <div class="col-12">
				<div class="ml-auto col-md-10 mr-auto">
				  <h1 class="display-3 text-center my-5">
				  	<i class="fa fa-pencil-square-o"></i>
				  	Update Obat
					</h1>

<?php

			$obat = new Obat($koneksi);
			$obat->kd_obat = $_GET['id'];
			$result = $obat->ReadOne();

			while($row = $result->fetch_object()){

?>

					<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
						<div class="form-group">
        			<input type="text" class="form-control form-control-lg" placeholder="Kode Obat" name="kd_obat" disabled="" value="<?=$row->kd_obat?>" required="">
        			<small class="text-muted">Kode obat.</small>
        		</div>
        		<div class="form-group">
        			<input type="text" class="form-control form-control-lg" placeholder="Nama Obat" name="nama_obat" required="" value="<?=$row->nama_obat?>">
        			<small class="text-muted">Masukkan nama obat.</small>
        		</div>
						<div class="form-group">
							<button type="submit" name="update" class="btn btn-info btn-block btn-lg">Update</button>
							<a class="btn btn-secondary btn-block btn-lg" href="obat.php">Back</a>
						</div>
					</form>

<?php

}

?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php

		if(isset($_POST['update'])){

			$obat->nama_obat = $_POST['nama_obat'];

			if($obat->Update()==TRUE){
				echo "
				<script>
				alert('Berhasil diubah');
				window.location=('obat.php');
				</script>
				";
			}else{
				echo "
				<script>
				alert('Gagal diubah');
				window.history.back();
				</script>
				";
			}

		}



	}else{
		header('location:obat.php');
	}
}

	$koneksi->close();

?>