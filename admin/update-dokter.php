<?php
$page = 'dokter';
include_once('../class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

session_start();
if(!isset($_SESSION['admin'])){
	header('location:login.php');
}else{

	if(isset($_GET['id'])){

		include_once('header.php');

?>
	  <div class="content-wrapper bg-light">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="../admin/">Beranda</a>
	        </li>
	        <li class="breadcrumb-item active">Dokter</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	        	<div class="ml-auto col-md-10 mr-auto">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-pencil-square-o"></i>
					  	Update Dokter
						</h1>
<?php

		include_once('../class/dokter.php');
		$dokter = new Dokter($koneksi);
		$dokter->id_dokter = $_GET['id'];

		$result = $dokter->ReadOne();

		while($row = $result->fetch_object()){

?>

							<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
								<div class="form-group">
	          			<input type="text" placeholder="Nama Dokter" readonly="" class="form-control form-control-lg" name="id" value="<?=$row->id_dokter?>">
	          			<small class="text-muted">ID dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" placeholder="Nama Dokter" required="" class="form-control form-control-lg" name="nama" value="<?=$row->nama_dokter?>">
	          			<small class="text-muted">Nama lengkap dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<textarea name="alamat" placeholder="Alamat" class="form-control form-control-lg" rows="3" required=""><?=$row->alamat?></textarea>
	          			<small class="text-muted">Alamat dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" placeholder="Spesialis" required="" class="form-control form-control-lg" value="<?=$row->spesialis?>" name="spesialis">
	          			<small class="text-muted">Spesialis dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" placeholder="Telp Dokter" required="" class="form-control form-control-lg" value="<?=$row->telp?>" name="telp">
	          			<small class="text-muted">Nomor telepon dokter.</small>
	          		</div>
								<div class="form-group">
									<button type="submit" name="update" class="btn btn-info btn-block btn-lg">Update</button>
									<button class="btn btn-secondary btn-block btn-lg" onclick="window.location=('dokter.php')">Back</button>
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

			$dokter->nama_dokter = $_POST['nama'];
			$dokter->alamat = $_POST['alamat'];
			$dokter->spesialis = $_POST['spesialis'];
			$dokter->telp = $_POST['telp'];

			if($dokter->Update()==TRUE){
				echo "
				<script>
				alert('Berhasil diubah');
				window.location=('dokter.php');
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

		include_once('footer.php');

		$koneksi->close();


}else{
	header('location:dokter.php');
}
}


?>