<?php

include_once('class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="media/font/font-awesome/css/font-awesome.min.css">

    <title>Klinik Suaka Insan</title>
  </head>
  <body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-success py-3 sticky-top">
			<div class="container">
			  <a class="navbar-brand" href="../suakainsan/"><i class="fa fa-plus-square-o"></i> Klinik Suaka Insan</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="../suakainsan/">Beranda</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="register.php">Register</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="dokter.php">Dokter</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="login.php">Login Pasien</a>
			      </li>
			    </ul>
			  </div>
		  </div>
		</nav>