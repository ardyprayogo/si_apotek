<?php

$page ='jadwal';

session_start();
if(!isset($_SESSION['pasien'])){
	header('location:../login.php');
}else{


include_once('../class/config.php');

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
	        <li class="breadcrumb-item active">Jadwal</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	        	<h1 class="display-3 text-center my-5">
					  	<i class="fa fa-check-square-o"></i>
					  	Jadwal Dokter
						</h1>

						<table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Spesialis</th>
									<th>Hari</th>
									<th>Jam Praktek</th>
								</tr>
							</thead>

<?php

include_once('../class/jadwal.php');

$jadwal = new Jadwal($koneksi);
$result = $jadwal->ReadQuery();
$no = 1;
while($row = $result->fetch_assoc()){
?>

							<tbody>
								<tr>
									<td><?=$no?></td>
									<td><?=$row['nama_dokter']?></td>
									<td><?=$row['spesialis']?></td>
									<td><?=$row['hari']?></td>
									<td><?=$row['jam_kerja']?></td>
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

<?php


include_once('footer.php');

}

?>