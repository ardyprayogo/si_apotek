<?php
$page = 'periksa';
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
	        <li class="breadcrumb-item active">Data Periksa</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-sliders"></i>
					  	Data Periksa
						</h1>

	          <div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-resep">
		          	<i class="fa fa-plus"></i>
		          	New Data
	          	</button>
	          </div>
	          
	          <table class="table table-hover text-center text-capitalize">
	          	<thead>
	          		<tr>
	          			<th>No</th>
	          			<th>Tanggal Periksa</th>
	          			<th>Nama Pasien</th>
	          			<th>Nama Dokter</th>
	          			<th>Biaya Periksa</th>
	          			<th width="5%">Action</th>
	          		</tr>
	          	</thead>

<?php

include_once('../class/periksa.php');
$periksa = new Periksa($koneksi);
$result = $periksa->ReadQuery();

$no = 1;

while($row = $result->fetch_assoc()){

?>

	          	<tbody>
	          		<tr>
	          			<td><?=$no?></td>
	          			<td><?=FormatTgl($row['tglperiksa'])?></td>
	          			<td><?=$row['nama_pasien']?></td>
	          			<td><?=$row['nama_dokter']?></td>
	          			<td><?=number_format($row['biaya'])?></td>
	          			<td>
	          				<a href="delete-periksa.php?id=<?=$row['kd_periksa']?>" class="btn btn-sm btn-danger">
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

	   	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="add-resep" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
						<div class="ml-auto col-md-10 mr-auto">
	            <h1 class="display-3 text-center my-5">
		          	<i class="fa fa-sliders"></i>
		          	New Data
	          	</h1>
	          	
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
	          		<div class="form-group">
	          			<select name="id_pasien" class="form-control-lg form-control custom-select" required="">
	          				<option selected="" disabled="">Pilih Pasien</option>
<?php

include_once('../class/pasien.php');
$pasien = new Pasien($koneksi);
$dftrp = $pasien->ReadAll();

while($row = $dftrp->fetch_object()){

?>

	          				<option value="<?=$row->id_pasien?>"><?=$row->nama_pasien?></option>
<?php
}
?>

	          			</select>
	          			<small class="text-muted">Pilih pasien.</small>
	          		</div>
	          		<div class="form-group">
	          			<select name="id_dokter" class="form-control-lg form-control custom-select" required="">
	          				<option selected="" disabled="">Pilih Dokter</option>
<?php

include_once('../class/dokter.php');
$dokter = new Dokter($koneksi);
$dftrd = $dokter->ReadAll();

while($row = $dftrd->fetch_object()){

?>

	          				<option value="<?=$row->id_dokter?>"><?=$row->nama_dokter?></option>
<?php
}
?>

	          			</select>
	          			<small class="text-muted">Pilih dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="date" class="form-control form-control-lg" name="tgl" required="">
	          			<small class="text-muted">Tanggal periksa.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" class="form-control form-control-lg" name="biaya" required="" placeholder="Biaya Periksa">
	          			<small class="text-muted">Biaya periksa.</small>
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


if(isset($_POST['add'])){

	$newdata = new Periksa($koneksi);
	$newdata->id_pasien = $_POST['id_pasien'];
	$newdata->id_dokter = $_POST['id_dokter'];
	$newdata->tgl = $_POST['tgl'];
	$newdata->biaya = $_POST['biaya'];

	if($newdata->Add()==TRUE){
		echo "
		<script>
		alert('Data periksa berhasil ditambah');
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

}

include_once('footer.php');

}

$koneksi->close();

?>