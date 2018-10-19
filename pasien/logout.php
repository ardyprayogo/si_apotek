<?php

session_start();
session_unset($_SESSION['pasien']);
header('location:../login.php')


?>