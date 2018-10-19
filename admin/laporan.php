<?php
$page = 'laporan';
include_once('../class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

session_start();
if(!isset($_SESSION['admin'])){
	header('location:login.php');
}else{

include_once('header.php');
include_once('../class/periksa.php');
include_once('../function/function.php');


?>
	  <div class="content-wrapper bg-light">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="../admin/">Beranda</a>
	        </li>
	        <li class="breadcrumb-item active">Laporan</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1 class="display-3 text-center my-5">
					  	<i class="fa fa-file"></i>
					  	Laporan
						</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<form action="" method="GET" class="form-row">
							<div class="form-row mr-auto ml-auto">
								<div class="form-group col-auto">
									<input type="date" class="form-control form-control-lg" name="ta" value="<?=$_GET['ta']?>" required>
									<small class="text-muted">Tanggal Awal</small>
								</div>
								<div class="form-group col-auto">
									<input type="date" class="form-control form-control-lg" name="tt" value="<?=$_GET['tt']?>" required>
									<small class="text-muted">Tanggal Akhir</small>
								</div>
								<div class="form-group col-auto">
									<button type="submit" class="btn btn-info btn-lg col">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>							
						</form> 
					</div>
				</div>
<?php

if(isset($_GET['ta']) && isset($_GET['tt'])){
$report = new Periksa($koneksi);
$report->ta = $_GET['ta'];
$report->tt = $_GET['tt'];
$result = $report->ReadTanggal();

?>				
				<div class="row">
					<div class="col-12">
						<table class="table table-hover text-center text-capitalize">
							<thead>
								<tr>
									<th>Tanggal Periksa</th>
									<th>Nama Pasien</th>
									<th>Poli</th>
									<th>Nama Dokter</th>
									<th>Biaya Periksa</th>
								</tr>
							</thead>

<?php
$biaya = 0;
while($row = $result->fetch_assoc()){

?>

							<tbody>
								<tr>
									<td><?=FormatTgl($row['tglperiksa'])?></td>
									<td><?=$row['nama_pasien']?></td>
									<td>Klinik Suaka Insan</td>
									<td><?=$row['nama_dokter']?></td>
									<td><?=number_format($row['biaya'])?></td>
								</tr>
							</tbody>

<?php
$biaya += $row['biaya'];
}

?>
<tbody>
								<tr>
									<td colspan="3"></td>
									<td><strong>TOTAL Rp.</strong></td>
									<td><?=number_format($biaya)?></td>
								</tr>
							</tbody>

						</table>
					</div>
				</div>

<?php

}

?>

	    </div>
		</div>

<?php

include_once('footer.php');

}

$koneksi->close();

?>