<?php
include '_config/config.php'; 
$nisn = $_GET['nisn'];
$query = mysqli_query($con, "SELECT * FROM tb_alumni WHERE nisn='$nisn'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'tahun_masuk'	=>  $mahasiswa['tahun_masuk'],
            'tahun_lulus'   =>  $mahasiswa['tahun_lulus'],
            'id'    =>  $mahasiswa['id'],);
 echo json_encode($data);
?>