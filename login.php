<?php

include_once('class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();

session_start();
if(isset($_SESSION['pasien'])){

  header('location:../suakainsan/pasien/');

}else{
  

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

  	<div class="container-fluid">
      <div class="d-flex align-items-center flex-column justify-content-center">
        
      	<h1 class="display-4 my-5">- Login -</h1>
      	<form action="" method="POST">
      		<div class="form-group">
      			<input class="form-control form-control-lg" placeholder="Email" type="email" name="email" required="">
            <small class="text-muted">Masukkan email.</small>
      		</div>
      		<div class="form-group">
      			<input class="form-control form-control-lg" placeholder="Tanggal Lahir" type="password" name="pass" required="">
            <small class="text-muted">(DDMMYYYY)</small>
      		</div>
      		<div class="form-group">
      			<button class="btn btn-info btn-lg btn-block" name="login">Login</button>
      			<button class="btn btn-warning btn-lg btn-block" onclick="window.location=('../suakainsan/')">Batal</button>
      		</div>
      	</form>
      </div>
  	</div>

  	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="media/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>

<?php

  if(isset($_POST['login'])){
        echo md5($_POST['email']);
    // $tgl = substr($_POST['pass'],0,2);
    // $bln = substr($_POST['pass'],2,2);
    // $thn = substr($_POST['pass'],4,4);

    // $tgllhr = $thn.'-'.$bln.'-'.$tgl;

    // include_once('class/pasien.php');
    // $login = new Pasien($koneksi);

    // $login->email   = $_POST['email'];
    // $login->tgllhr  = $tgllhr;

    // if($login->Login()==TRUE){
    //   $_SESSION['pasien'] = $_POST['email'];
    //   header('location:../suakainsan/pasien/');
    // }else{
    //   echo "
    //   <script>
    //   alert('Login Gagal');
    //   window.history.back();
    //   </script>
    //   ";
    // }


}


}
$koneksi->close();

?>