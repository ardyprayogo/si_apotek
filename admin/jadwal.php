<?php
$page = 'jadwal';
include_once('../class/config.php');
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
	        <li class="breadcrumb-item active">Jadwal Dokter</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-check-square-o"></i>
					  	Jadwal Dokter
						</h1>

	          <div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-jadwal">
		          	<i class="fa fa-plus"></i>
		          	New Jadwal
	          	</button>
	          </div>

	          <table class="table table-hover text-center text-capitalize">
	          	<thead>
	          		<tr>
	          			<th>No</th>
	          			<th>Nama Dokter</th>
	          			<th>Spesialis</th>
	          			<th>Hari</th>
	          			<th>Jam Praktek</th>
	          			<th width="5%">Action</th>
	          		</tr>
	          	</thead>

<?php

include_once('../class/jadwal.php');
$jadwal = new Jadwal($koneksi);
$result = $jadwal->ReadQuery();
$no =1;

while($row = $result->fetch_assoc()){
?>

	          	<tbody>
	          		<tr>
	          			<td><?=$no?></td>
	          			<td><?=$row['nama_dokter']?></td>
	          			<td><?=$row['spesialis']?></td>
	          			<td><?=$row['hari']?></td>
	          			<td><?=$row['jam_kerja']?></td>
	          			<td>
	          				<a href="delete-jadwal.php?id=<?=$row['id_jadwal']?>" class="btn btn-sm btn-danger">
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

	   	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="add-jadwal" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
						<div class="ml-auto col-md-10 mr-auto">
	            <h1 class="display-3 text-center my-5">
		          	<i class="fa fa-check-square-o"></i>
		          	New Jadwal
	          	</h1>
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
	          		<div class="form-row">
	          		<div class="form-group col-md-12">
	          			<select name="id_dokter" class="form-control form-control-lg custom-select">
	          				<option selected="" disabled="">Pilih Dokter</option>

<?php

include_once('../class/dokter.php');
$dokter = new Dokter($koneksi);
$result = $dokter->ReadAll();

while($row = $result->fetch_assoc()){

?>
	          				<option class="text-capitalize" value="<?=$row['id_dokter']?>"><?=$row['nama_dokter']?></option>

<?php

}

?>
	          			</select>
	          			<small class="text-muted">Pilih dokter.</small>
	          		</div>

	          		<div class="form-group col-md-12">
	          			<select name="hari" class="form-control-lg form-control custom-select">
	          				<option selected="" disabled="">Hari</option>
	          				<option value="senin">Senin</option>
	          				<option value="selasa">Selasa</option>
	          				<option value="rabu">Rabu</option>
	          				<option value="kamis">Kamis</option>
	          				<option value="jumat">Jumat</option>
	          				<option value="sabtu">Sabtu</option>
	          				<option value="minggu">Minggu</option>
	          			</select>
	          			<small class="text-muted">Hari kerja dokter.</small>
	          		</div>

	          		<div class="form-group col-md-6">
	          			<select name="masuk" class="form-control-lg form-control custom-select">
	          				<option selected="" disabled="">Jam Masuk</option>
	          				<option value="09.00">09.00</option>
	          				<option value="12.00">12.00</option>
	          				<option value="15.00">15.00</option>
	          			</select>
	          			<small class="text-muted">Jam masuk dokter.</small>
	          		</div>

	          		<div class="form-group col-md-6">
	          			<select name="pulang" class="form-control-lg form-control custom-select">
	          				<option selected="" disabled="">Jam Pulang</option>
	          				<option value="12.00">12.00</option>
	          				<option value="15.00">15.00</option>
	          				<option value="18.00">18.00</option>
	          			</select>
	          			<small class="text-muted">Jam pulang dokter.</small>
	          		</div>

								<div class="form-group col-md-12">
									<button type="submit" name="add" class="btn btn-info btn-block btn-lg">Add</button>
									<button class="btn btn-secondary btn-block btn-lg" data-dismiss="modal">Back</button>
								</div>
							</div>
							</form>
						</div>
			    </div>
			  </div>
			</div>
		</div>

<?php

if(isset($_POST['add'])){

	$masuk = $_POST['masuk'];
	$pulang = $_POST['pulang'];

	$addjadwal = new Jadwal($koneksi);
	$addjadwal->id_dokter = $_POST['id_dokter'];
	$addjadwal->hari = $_POST['hari'];
	$addjadwal->jam = $masuk.'-'.$pulang;

	if($addjadwal->AddJadwal()==TRUE){
		echo "
		<script>
		alert('Jadwal berhasil di tambah');
		window.location=('jadwal.php');
		</script>
		";
	}else{
		echo "
		<script>
		alert('Jadwal gagal di tambah');
		window.history.back();
		</script>
		";
	}

}

include_once('footer.php');

}

$koneksi->close();

?>