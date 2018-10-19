<?php
$page = 'obat';
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
	        <li class="breadcrumb-item active">Obat</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-heart"></i>
					  	Obat
						</h1>

	          <div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-obat">
		          	<i class="fa fa-plus"></i>
		          	New Obat
	          	</button>	
	          </div>
	          
						<table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th width="30%">Kode Obat</th>
									<th width="30%">Nama Obat</th>
									<th width="5%" colspan="2">Action</th>
								</tr>
							</thead>

<?php

include_once('../class/obat.php');
$obat = new Obat($koneksi);

$result = $obat->ReadAll();
$no = 1;

while($row = $result->fetch_object()){

?>

							<tbody>
								<tr>
									<td><?=$no?></td>
									<td class="text-lowercase"><?=$row->kd_obat?></td>
									<td><?=$row->nama_obat?></td>
									<td>
										<a href="update-obat.php?id=<?=$row->kd_obat?>" class="btn btn-sm btn-warning">
											<i class="fa fa-pencil-square-o"></i> Update
										</a>
									</td>
									<td>
										<a href="delete-obat.php?id=<?=$row->kd_obat?>" class="btn btn-sm btn-danger">
											<i class="fa fa-trash-o"></i> Delete
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

	   	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="add-obat" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
						<div class="ml-auto col-md-10 mr-auto">
	            <h1 class="display-3 text-center my-5">
		          	<i class="fa fa-heart"></i>
		          	New Obat
	          	</h1>
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
	          		<div class="form-group">
	          			<input type="text" class="form-control form-control-lg" placeholder="Kode Obat" name="kd_obat" required="">
	          			<small class="text-muted">Masukkan kode obat.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" class="form-control form-control-lg" placeholder="Nama Obat" name="nama_obat" required="">
	          			<small class="text-muted">Masukkan nama obat.</small>
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

	$obat = new Obat($koneksi);
	$obat->kd_obat = $_POST['kd_obat'];
	$obat->nama_obat = $_POST['nama_obat'];

	if($obat->AddObat() == TRUE){
		echo "
		<script>
			alert('Berhasil ditambah');
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

}

include_once('footer.php');

}

$koneksi->close();

?>