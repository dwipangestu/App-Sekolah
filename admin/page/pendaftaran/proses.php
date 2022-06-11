<?php 
require_once "../../../_config/config.php";

if(isset($_POST['add'])) {
    $no_daftar = trim(mysqli_real_escape_string($con, $_POST['no_daftar']));
    $nama_siswa = trim(mysqli_real_escape_string($con, $_POST['nama_siswa']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telpn = trim(mysqli_real_escape_string($con, $_POST['no_telpn']));
    $nama_wali = trim(mysqli_real_escape_string($con, $_POST['nama_wali']));
    $status = trim(mysqli_real_escape_string($con, $_POST['status']));

    $sql_cek_identitas = mysqli_query($con,"SELECT * FROM tb_pendaftaran WHERE no_daftar = '$no_daftar'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Sudah Terdaftar!'); window.location='data.php';</script>";
    } else { 

    mysqli_query($con, "INSERT INTO tb_pendaftaran (no_daftar, nama_siswa, alamat, no_telpn, nama_wali, status) VALUES ('$no_daftar', '$nama_siswa', '$alamat', '$no_telpn', '$nama_wali', '$status')") or die (mysqli_error($con));
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