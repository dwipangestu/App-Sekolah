<?php 
require_once "../../../_config/config.php";

$kode = @$_GET['id'];

$sql = $con->query("DELETE FROM tb_jurusan WHERE kd_jurusan = '$kode'");

if($sql) {
	echo "<script>alert('data berhasil dihapus'); window.location='data.php';</script>";
	} else { 
 echo "<script>alert('Gagal dihapus'); window.location='data.php';</script>";
}


 ?>