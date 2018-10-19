<?php
$page = 'resep';
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
	        <li class="breadcrumb-item active">Resep</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-table"></i>
					  	Data Resep
						</h1>
	          <div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-resep">
		          	<i class="fa fa-plus"></i>
		          	New Resep
	          	</button>
	          </div>
	          
	          <table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Pasien</th>
									<th>Pasien</th>
									<th>Obat</th>
									<th>Banyak</th>
									<th>Aturan</th>
									<th width="5%">Action</th>
								</tr>
							</thead>
<?php

include_once('../class/resep.php');
$resep = new Resep($koneksi);
$result = $resep->ReadQuery();
$no =1;

while($row = $result->fetch_assoc()){
?>
							<tbody>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['id_pasien']?></td>
									<td><?=$row['nama_pasien']?></td>
									<td><?=$row['nama_obat']?></td>
									<td><?=$row['banyak']?></td>
									<td><?=$row['aturan_pakai']?></td>
									<td>
										<a href="delete-resep.php?id=<?=$row['kd_resep']?>" class="btn btn-sm btn-danger">
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
		          	<i class="fa fa-table"></i>
		          	New Resep
	          	</h1>
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
	          		<div class="form-group">
	          			<select name="id_pasien" required="" class="form-control form-control-lg custom-select" required="">
	          				<option disabled="" selected="">Pilih Pasien</option>

<?php

include_once('../class/pasien.php');

$pasien = new Pasien($koneksi);
$result = $pasien->ReadAll();

while($row = $result->fetch_object()){

?>

	          				<option class="text-capitalize" value="<?=$row->id_pasien?>"><?=$row->nama_pasien?></option>

<?php

}

?>

	          			</select>
	          			<small class="text-muted">Pilih pasien.</small>
	          		</div>
	          		<div class="form-group">
	          			<select name="kd_obat" required="" class="form-control form-control-lg custom-select" required="">
	          				<option disabled="" selected="">Pilih Obat</option>

<?php

include_once('../class/obat.php');

$obat = new Obat($koneksi);
$resulto = $obat->ReadAll();

while($row = $resulto->fetch_object()){

?>

	          				<option class="text-capitalize" value="<?=$row->kd_obat?>"><?=$row->nama_obat?></option>

<?php

}

?>

	          			</select>
	          			<small class="text-muted">Pilih obat.</small>
	          		</div>

	          		<div class="form-group">
	          			<input type="text" class="form-control form-control-lg" placeholder="Banyak Obat" name="banyak" required="">
	          			<small class="text-muted">Masukkan banyak obat.</small>
	          		</div>

	          		<div class="form-group">
	          			<textarea name="aturan" class="form-control-lg form-control" placeholder="Aturan Pakai"></textarea>
	          			<small class="text-muted">Aturan pakai obat.</small>
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

	$newresep = new Resep($koneksi);
	$newresep->id_pasien = $_POST['id_pasien'];
	$newresep->kd_obat = $_POST['kd_obat'];
	$newresep->banyak = $_POST['banyak'];
	$newresep->aturan_pakai = $_POST['aturan'];

	if($newresep->AddResep()== TRUE){
		echo "
		<script>
			alert('Berhasil ditambah');
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

}

include_once('footer.php');

}

$koneksi->close();

?>