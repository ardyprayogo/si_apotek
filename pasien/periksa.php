<?php
$page ='periksa';
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
					  	<i class="fa fa-table"></i>
					  	History Periksa
						</h1>
<?php

include_once('../class/periksa.php');

$periksa = new Periksa($koneksi);
$periksa->email = $email;
$result = $periksa->ReadQueryP();

if($result->num_rows == 0){
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
									<th>Tanggal Periksa</th>
									<th>Nama Dokter</th>
									<th>Biaya</th>
								</tr>
							</thead>

';
$no = 1;

while($row = $result->fetch_assoc()){

?>


							<tbody>
								<tr>
									<td><?=$no?></td>
									<td><?=FormatTgl($row['tglperiksa'])?></td>
									<td><?=$row['nama_dokter']?></td>
									<td><?=number_format($row['biaya'])?></td>
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