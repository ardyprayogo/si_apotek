<?php
$page = 'home';
include_once('../class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

session_start();
if(!isset($_SESSION['admin'])){
	header('location:login.php');
}else{

include_once('header.php');

include_once('../class/pasien.php');
include_once('../class/dokter.php');
include_once('../class/obat.php');

$pasien = new Pasien($koneksi);
$dokter = new Dokter($koneksi);
$obat 	= new Obat($koneksi);

?>
	  <div class="content-wrapper bg-light">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="../admin/">Beranda</a>
	        </li>
	        <li class="breadcrumb-item active"></li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	        	<h1 class="display-3 text-center my-5">
					  	<i class="fa fa-home"></i>
					  	Beranda
						</h1>
	          <div class="row text-center">
						  <div class="col-sm-4">
						    <div class="card bg-light">
						      <div class="card-body">
						        <h1 class="card-title">
						        	<i class="fa fa-bed fa-3x"></i>
						        </h1>
						        <p class="display-4">
						        	<?php

						        	$p = $pasien->ReadAll();
						        	echo $p->num_rows.' Pasien';

						        	?>
						        </p>
						        <a href="pasien.php" class="btn btn-info btn-block">
						        	<i class="fa fa-table"></i>
						        	Pasien
						        </a>
						      </div>
						    </div>
						  </div>
						  <div class="col-sm-4">
						    <div class="card bg-light">
						      <div class="card-body">
						        <h1 class="card-title">
						        	<i class="fa fa-user-o fa-3x"></i>
						        </h1>
						        <p class="display-4">
						        	<?php

						        	$d = $dokter->ReadAll();
						        	echo $d->num_rows.' Dokter';

						        	?>
						        </p>
						        <a href="dokter.php" class="btn btn-info btn-block">
						        	<i class="fa fa-table"></i>
						        	Dokter
						        </a>
						      </div>
						    </div>
						  </div>
						  <div class="col-sm-4">
						    <div class="card bg-light">
						      <div class="card-body">
						        <h1 class="card-title">
						        	<i class="fa fa-heart fa-3x"></i>
						        </h1>
						        <p class="display-4">
						        	<?php

						        	$o = $obat->ReadAll();
						        	echo $o->num_rows.' Obat';

						        	?>
						        </p>
						        <a href="obat.php" class="btn btn-info btn-block">
						        	<i class="fa fa-table"></i>
						        	Obat
						        </a>
						      </div>
						    </div>
						  </div>
						</div>
	        </div>
	      </div>
	    </div>

<?php

include_once('footer.php');

}

$koneksi->close();

?>