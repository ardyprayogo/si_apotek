<?php
$page ='resep';
session_start();
if(!isset($_SESSION['pasien'])){
	header('location:../login.php');
}else{


include_once('../class/config.php');
include_once('../function/function.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();


$email = $_SESSION['pasien'];





include_once('header.php');

?>
	  <div class="content-wrapper bg-light">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="index.html">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item active">Periksa</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-heart-o"></i>
					  	Resep
						</h1>

<?php

include_once('../class/resep.php');

$resep = new Resep($koneksi);
$resep->email = $email;

$result = $resep->ReadQueryP();

if($result->num_rows==0){
	echo "
	<div class='alert alert-danger' role='alert'>
  Data tidak ditemukan.
	</div>
	";
}else{

	echo '
						<table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Obat</th>
									<th>Banyak</th>
									<th>Aturan Pakai</th>
								</tr>
							</thead>
	';

$no =1;

while($row = $result->fetch_assoc()){

?>
						
							<tbody>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['nama_obat']?></td>
									<td><?=$row['banyak']?></td>
									<td><?=$row['aturan_pakai']?></td>
								</tr>
							</tbody>
<?php
$no++;
}
?>
						</table>

<?php
}

?>

	        </div>
	      </div>
	    </div>

<?php


include_once('footer.php');

}

?>