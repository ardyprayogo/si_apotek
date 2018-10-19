<?php

session_start();
session_unset($_SESSION['admin']);
header('location:login.php');

?>