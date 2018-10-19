<?php

session_start();

if(isset($_SESSION['admin'])){
  header('location:../admin');
}else{

  include_once('../class/config.php');

  $conn = new Koneksi();
  $koneksi = $conn->GetKoneksi();



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../media/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../media/font/font-awesome/css/font-awesome.min.css">

    <title>Klinik Suaka Insan</title>
  </head>
  <body class="bg-dark text-light">

  	<div class="container-fluid">
      <div class="d-flex align-items-center flex-column justify-content-center">
      	<h1 class="display-4 my-5">Login Admin</h1>
      	<form action="" method="POST">
      		<div class="form-group">
      			<input class="form-control form-control-lg" placeholder="ID Admin" type="text" name="id" required="">
            <small class="text-muted">Masukkan ID Admin.</small>
      		</div>
      		<div class="form-group">
      			<input class="form-control form-control-lg" placeholder="Password" type="password" name="pass" required="">
            <small class="text-muted">Password.</small>
      		</div>
      		<div class="form-group">
      			<button class="btn btn-info btn-lg btn-block" name="login">Login</button>
      			<button class="btn btn-warning btn-lg btn-block" onclick="window.location=('../')">Batal</button>
      		</div>
      	</form>
      </div>
  	</div>

  	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../media/bootstrap/js/bootstrap.min.js"></script>

<?php

  if(isset($_POST['login'])){

    include_once('../class/admin.php');
    $admin = new Admin($koneksi);
    $admin->id = $_POST['id'];
    $admin->pass = $_POST['pass'];
    if($admin->Login()==TRUE){
      header('location:../admin');
    }else{
      echo "
      <script>
      alert('ID atau Password salah!');
      window.history.back();
      </script>
      ";
    }


  }

  $koneksi->close();

}

?>


  </body>
</html>