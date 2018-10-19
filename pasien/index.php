<?php
$page='home';
session_start();
if(!isset($_SESSION['pasien'])){
	header('location:../login.php');
}else{


include_once('../class/config.php');
include_once('../class/pasien.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();
$pasien = new Pasien($koneksi);

$pasien->email = $_SESSION['pasien'];
$result = $pasien->ReadEmail();

while($row = $result->fetch_object()){


include_once('header.php');

?>
	  <div class="content-wrapper bg-light">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="index.html">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item active">Beranda</li>
	      </ol>
	      <div class="row">
	        <div class="col-12">
	          <h1>Beranda</h1>
	          <p>Selamat datang <?=$row->nama_pasien?></p>
	        </div>
	      </div>
	    </div>

<?php


include_once('footer.php');
}
}

?>