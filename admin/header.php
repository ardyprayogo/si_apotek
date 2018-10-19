<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <title>Suaka Insan | Admin</title>
	  <!-- Bootstrap core CSS-->
	  <link rel="stylesheet" href="../media/bootstrap/css/sb-admin.css">
	  <link rel="stylesheet" href="../media/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../media/font/font-awesome/css/font-awesome.min.css">
	</head>

	<body class="fixed-nav sticky-footer bg-light text-dark" id="page-top">
	  <!-- Navigation-->
	  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
	    <a class="navbar-brand" href="../admin/">Admin | Suaka Insan</a>
	    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	        <li class="nav-item 
	        <?php
	        if($page == 'home'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Dashboard">
	          <a class="nav-link" href="../admin/">
	            <i class="fa fa-home"></i>
	            <span class="nav-link-text">Beranda</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'pasien'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Pasien">
	          <a class="nav-link" href="pasien.php">
	            <i class="fa fa-bed"></i>
	            <span class="nav-link-text">Pasien</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'dokter'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Dokter">
	          <a class="nav-link" href="dokter.php">
	            <i class="fa fa-user-o"></i>
	            <span class="nav-link-text">Dokter</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'jadwal'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Jadwal Dokter">
	          <a class="nav-link" href="jadwal.php">
	            <i class="fa fa-check-square-o"></i>
	            <span class="nav-link-text">Jadwal Dokter</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'obat'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Obat">
	          <a class="nav-link" href="obat.php">
	            <i class="fa fa-heart"></i>
	            <span class="nav-link-text">Obat</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'resep'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Data Resep">
	          <a class="nav-link" href="resep.php">
	            <i class="fa fa-table"></i>
	            <span class="nav-link-text">Data Resep</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'periksa'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Data Periksa">
	          <a class="nav-link" href="periksa.php">
	            <i class="fa fa-sliders"></i>
	            <span class="nav-link-text">Data Periksa</span>
	          </a>
	        </li>

	        <li class="nav-item
	        <?php
	        if($page == 'laporan'){
	        	echo 'active';
	        }
	        ?>
	        " data-toggle="tooltip" data-placement="right" title="Laporan">
	          <a class="nav-link" href="laporan.php">
	            <i class="fa fa-file"></i>
	            <span class="nav-link-text">Laporan</span>
	          </a>
	        </li>

	      </ul>
	      <ul class="navbar-nav ml-auto">

	        <li class="nav-item">
	          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
	            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
	        </li>
	      </ul>
	    </div>
	  </nav>

