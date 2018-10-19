<?php
$page = 'pasien';
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
		include_once('../class/pasien.php');

?>


<div class="content-wrapper bg-light">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../admin/">Beranda</a>
      </li>
      <li class="breadcrumb-item active">Pasien</li>
    </ol>
    <div class="row">
      <div class="col-12">
				<div class="ml-auto col-md-10 mr-auto">
				  <h1 class="display-3 text-center my-5">
				  	<i class="fa fa-pencil-square-o"></i>
				  	Update Pasien
					</h1>

<?php

			$pasien = new Pasien($koneksi);
			$pasien->id = $_GET['id'];
			$result = $pasien->ReadOne();

			while($row = $result->fetch_object()){

?>

					<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
						<div class="form-group">
							<input type="text" class="form-control form-control-lg" name="id_pasien" placeholder="ID Pasien" readonly=""
							value="<?=$row->id_pasien?>">
							<small class="text-muted">ID pasien.</small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama" required="" 
							value="<?=$row->nama_pasien?>">
							<small class="text-muted">Nama lengkap pasien.</small>
						</div>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required="" value="<?=$row->email?>">
							<small class="text-muted">Email pasien (digunakan untuk login website).</small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-lg" name="tmptlhr" placeholder="Tempat Lahir" required="" value="<?=$row->tmptlhr?>">
							<small class="text-muted">Tempat lahir pasien.</small>
						</div>
						<div class="form-group">
							<input type="date" class="form-control form-control-lg" name="tgllhr" required="" value="<?=$row->tgllhr?>">
							<small class="text-muted">Tanggal lahir pasien.</small>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-lg" name="telp" placeholder="Nomor Telpon" required="" value="<?=$row->telp?>">
							<small class="text-muted">Nomor telpon pasien.</small>
						</div>
						<div class="form-group">
							<textarea name="alamat" class="form-control form-control-lg" placeholder="Alamat" required="" rows="3"><?=$row->alamat?></textarea>
							<small class="text-muted">Alamat lengkap pasien.</small>
						</div>
						<div class="form-group">
							<select name="jk" class="form-control form-control-lg">
								<option disabled="">Jenis Kelamin</option>
								<option value="l"
<?php
if($row->jk == 'l'){
	echo "selected";
}
?>
								>Laki-laki</option>
								<option value="p"
<?php
if($row->jk == 'p'){
	echo "selected";
}
?>
								>Perempuan</option>
							</select>
							<small class="text-muted">Jenis kelamin pasien.</small>
						</div>
						<div class="form-group">
							<button type="submit" name="update" class="btn btn-info btn-block btn-lg">Update</button>
							<a class="btn btn-secondary btn-block btn-lg" href="pasien.php">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
			}

		if(isset($_POST['update'])){

			$pasien->nama_pasien = $_POST['nama'];
			$pasien->email = $_POST['email'];
			$pasien->tmptlhr = $_POST['tmptlhr'];
			$pasien->tgllhr = $_POST['tgllhr'];
			$pasien->telp = $_POST['telp'];
			$pasien->alamat = $_POST['alamat'];
			$pasien->jk = $_POST['jk'];


			if($pasien->Update() == TRUE){
				echo "
				<script>
				alert('Berhasil di ubah');
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

		}

	}else{
		header('location:pasien.php');
	}
}

	$koneksi->close();

?>