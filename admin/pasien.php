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

include_once('header.php');

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
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-bed"></i>
					  	Pasien
						</h1>

	          <div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-pasien">
		          	<i class="fa fa-plus"></i>
		          	New Pasien
	          	</button>
	          	
	          </div>
	          

	          <table class="table table-hover table-responsive w-100 text-center text-capitalize">
	          	<thead>
	          		<tr>
	          			<th width="5%">No</th>
	          			<th width="20%">Nama</th>
	          			<th width="10%">Email</th>
	          			<th width="10%">Telp</th>
	          			<th width="20%">Alamat</th>
	          			<th width="15%">Tanggal Lahir</th>
	          			<th width="10%"=>Gender</th>
	          			<th width="10%" colspan="2">Action</th>
	          		</tr>
	          	</thead>
<?php

include_once('../class/pasien.php');
$pasien = new Pasien($koneksi);
$result = $pasien->ReadAll();
$no = 1;
while($row = $result->fetch_object()){

?>
	          	<tbody>
	          		<tr>
	          			<td><?=$no;?></td>
	          			<td><?=$row->nama_pasien;?></td>
	          			<td class="text-lowercase"><?=$row->email;?></td>
	          			<td><?=$row->telp;?></td>
	          			<td><?=$row->alamat;?></td>
	          			<td><?=FormatTgl($row->tgllhr);?></td>
	          			<td><?=FormatJK($row->jk);?></td>
	          			<td>
	          				<a href="update-pasien.php?id=<?=$row->id_pasien;?>" class="btn btn-warning btn-sm btn-block" title="">
	          					<i class="fa fa-pencil-square-o"></i>
	          					Update
	          				</a>
	          			</td>
	          			<td>
	          				<a href="delete-pasien.php?id=<?=$row->id_pasien;?>" class="btn btn-danger btn-sm btn-block" title="">
	          					<i class="fa fa-trash-o"></i>
	          					Delete
	          				</a>
	          			</td>
	          		</tr>
	          	</tbody>
<?php

$no++;

}

?>
	          </table>

	        </div>
	      </div>
	    </div>

	   	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="add-pasien" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
						<div class="ml-auto col-md-10 mr-auto">
	            <h1 class="display-3 text-center my-5">
		          	<i class="fa fa-plus"></i>
		          	New Pasien
	          	</h1>
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
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
									<button type="submit" name="add" class="btn btn-info btn-block btn-lg">Add</button>
									<button class="btn btn-secondary btn-block btn-lg" data-dismiss="modal">Back</button>
								</div>
							</form>
						</div>
			    </div>
			  </div>
			</div>
		</div>
		
<?php

include_once('footer.php');

if(isset($_POST['add'])){
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
		move_uploaded_file($from, '../'.$to);
		echo 
		"
			<script>
			alert('Pendaftaran berhasil');
			window.location=('pasien.php');
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



}

$koneksi->close();

?>