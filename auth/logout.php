<?php 
session_start();
require_once "../_config/config.php";

session_destroy($_SESSION['user']);
session_destroy($_SESSION['admin']);

unset($_SESSION['user']);
unset($_SESSION['admin']);

echo "<script>alert('Berhasil Logout');</script>";
echo "<script>window.location='".base_url()."';</script>";
 ?>