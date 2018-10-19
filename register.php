<?php

include_once('header.php');

?>


<div class="container">
	<div class="row">
		<div class="col"></div>
		<div class="col-8">
			<div class="my-5">
			<h1 class="display-3 text-center">
				<i class="fa fa-users"></i>
				Registrasi
			</h1>
			<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mt-5">
				<div class="form-group">
					<input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama" required="">
					<small class="text-muted">Nama lengkap pasien.</small>
				</div>
				<div class="form-group">
					<input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required="">
					<small class="text-muted">Email pasien (digunakan untuk login website).</small>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-lg" name="tmptlhr" placeholder="Tempat Lahir" required="">
					<small class="text-muted">Tempat lahir pasien.</small>
				</div>
				<div class="form-group">
					<input type="date" class="form-control form-control-lg" name="tgllhr" required="">
					<small class="text-muted">Tanggal lahir pasien.</small>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-lg" name="telp" placeholder="Nomor Telpon" required="">
					<small class="text-muted">Nomor telpon pasien.</small>
				</div>
				<div class="form-group">
					<textarea name="alamat" class="form-control form-control-lg" placeholder="Alamat" required="" rows="3"></textarea>
					<small class="text-muted">Alamat lengkap pasien.</small>
				</div>
				<div class="form-group">
					<select name="jk" class="form-control form-control-lg">
						<option selected="" disabled="">Jenis Kelamin</option>
						<option value="l">Laki-laki</option>
						<option value="p">Perempuan</option>
					</select>
					<small class="text-muted">Jenis kelamin pasien.</small>
				</div>
				<div class="form-group">
					<input type="file" class="custom-file" name="foto" required="">
					<small class="text-muted">Foto pasien (Format harus JPG/JPEG).</small>
				</div>
				<div class="form-group">
					<button type="submit" name="daftar" class="btn btn-info btn-block btn-lg">Daftar</button>
					<button class="btn btn-secondary btn-block btn-lg" onclick="window.history.back()">Back</button>
				</div>
			</form>
		</div>
		</div>
		<div class="col"></div>
	</div>
</div>



<?php

if(isset($_POST['daftar'])){

	//foto
	$from = $_FILES['foto']['tmp_name'];
	$to 	= 'upload/pasien/'.time().$_FILES['foto']['name'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];

	if($size>500000){
		die("
			<script>
			alert('Foto lebih dari 500Kb');
			window.history.back();
			</script>
			");
	}

	if($type!='image/jpeg'){
		die("
			<script>
			alert('Format foto harus jpg/jpeg');
			window.history.back();
			</script>
			");
	}

	include_once('class/pasien.php');

	$pasien = new Pasien($koneksi);
	$pasien->nama_pasien 	= $_POST['nama'];
	$pasien->email 				= $_POST['email'];
	$pasien->tmptlhr 			= $_POST['tmptlhr'];
	$pasien->tgllhr 			= $_POST['tgllhr'];
	$pasien->telp 				= $_POST['telp'];
	$pasien->alamat 			= $_POST['alamat'];
	$pasien->jk 					= $_POST['jk'];
	$pasien->foto 				= $to;

	if($pasien->AddPasien() == TRUE){
		move_uploaded_file($from, $to);
		echo 
		"
			<script>
			alert('Pendaftaran berhasil');
			window.location=('login.php');
			</script>
		";
	}else{
		echo 
		"
			<script>
			alert('Email sudah pernah dipakai');
			window.history.back();
			</script>
		";
	}


}


include_once('footer.php');

?>