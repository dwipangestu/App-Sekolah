<?php 
require_once "../../../_config/config.php";

if(isset($_POST['add'])) {
    $kd_kelas = trim(mysqli_real_escape_string($con, $_POST['kd_kelas']));
    $nama_kelas = trim(mysqli_real_escape_string($con, $_POST['nama_kelas']));
    $kd_jurusan = trim(mysqli_real_escape_string($con, $_POST['kd_jurusan']));
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $th_ajar = trim(mysqli_real_escape_string($con, $_POST['th_ajar']));

    $sql_cek_identitas = mysqli_query($con,"SELECT * FROM tb_kelas WHERE kd_kelas = '$kd_kelas'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Sudah Terdaftar!'); window.location='data.php';</script>";
    } else { 

    mysqli_query($con, "INSERT INTO tb_kelas (kd_kelas, nama_kelas, kd_jurusan, nip, th_ajar) VALUES ('$kd_kelas', '$nama_kelas', '$kd_jurusan', '$nip', '$th_ajar')") or die (mysqli_error($con));
    echo "<script>alert('Data tersimpan');</script>";
    echo "<script>window.location='data.php';</script>";
}
} else if(isset($_POST['edit'])) {
    $kode = $_POST['kodejurusan'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['namajurusan']));
    mysqli_query($con, "UPDATE tb_jurusan SET nama_jurusan = '$nama' WHERE kd_jurusan = '$kode'") or die (mysqli_error($con));
    echo "<script>alert('Data diubah');</script>";
    echo "<script>window.location='data.php';</script>";
}
?>