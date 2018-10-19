<?php

$page = 'dokter';

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
	        <li class="breadcrumb-item active">Dokter</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-user-o"></i>
					  	Dokter
						</h1>
						<div class="form-group">
	          	<button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#add-resep">
		          	<i class="fa fa-plus"></i>
		          	New Dokter
	          	</button>
	          </div>
						<table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Spesialis</th>
									<th>Telp</th>
									<th colspan="2" width="5%">Action</th>
								</tr>
							</thead>

<?php

include_once('../class/dokter.php');

$dokter = new Dokter($koneksi);
$result = $dokter->ReadAll();

$no=1;

while($row = $result->fetch_object()){
?>

							<tbody>
								<tr>
									<td><?=$no?></td>
									<td><?=$row->nama_dokter?></td>
									<td><?=$row->alamat?></td>
									<td><?=$row->spesialis?></td>
									<td><?=$row->telp?></td>
									<td>
										<a href="update-dokter.php?id=<?=$row->id_dokter?>" class="btn btn-sm btn-warning">
											<i class="fa fa-pencil-square-o"></i>
											Update
										</a>
									</td>
									<td>
										<a href="delete-dokter.php?id=<?=$row->id_dokter?>" class="btn btn-sm btn-danger">
											<i class="fa fa-pencil-square-o"></i>
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
		          	<i class="fa fa-user-o"></i>
		          	New Dokter
	          	</h1>
	          	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="mb-5">
	          		<div class="form-group">
	          			<input type="text" placeholder="Nama Dokter" required="" class="form-control form-control-lg" name="nama">
	          			<small class="text-muted">Nama lengkap dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<textarea name="alamat" placeholder="Alamat" class="form-control form-control-lg" rows="3" required=""></textarea>
	          			<small class="text-muted">Alamat dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" placeholder="Spesialis" required="" class="form-control form-control-lg" name="spesialis">
	          			<small class="text-muted">Spesialis dokter.</small>
	          		</div>
	          		<div class="form-group">
	          			<input type="text" placeholder="Telp Dokter" required="" class="form-control form-control-lg" name="telp">
	          			<small class="text-muted">Nomor telepon dokter.</small>
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

	$newdokter = new Dokter($koneksi);

	$newdokter->nama_dokter = $_POST['nama'];
	$newdokter->alamat = $_POST['alamat'];
	$newdokter->spesialis = $_POST['spesialis'];
	$newdokter->telp = $_POST['telp'];

	if($newdokter->AddDokter()== TRUE){
		echo "
		<script>
		alert('Berhasil');
		window.location=('dokter.php');
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