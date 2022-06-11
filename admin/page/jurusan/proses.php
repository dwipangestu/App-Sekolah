<?php 
require_once "../../../_config/config.php";

if(isset($_POST['addjurusan'])) {
    $kode = trim(mysqli_real_escape_string($con, $_POST['kodejurusan']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['namajurusan']));

    $sql_cek_identitas = mysqli_query($con,"SELECT * FROM tb_jurusan WHERE kd_jurusan = '$kode'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Kode Jurusan Sudah Terdaftar!'); window.location='addjurusan.php';</script>";
    } else { 

    mysqli_query($con, "INSERT INTO tb_jurusan (kd_jurusan, nama_jurusan) VALUES ('$kode', '$nama')") or die (mysqli_error($con));
    echo "<script>alert('Data tersimpan');</script>";
    echo "<script>window.location='data.php';</script>";
}
} else if(isset($_POST['editjurusan'])) {
    $kode = $_POST['kodejurusan'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['namajurusan']));
    mysqli_query($con, "UPDATE tb_jurusan SET nama_jurusan = '$nama' WHERE kd_jurusan = '$kode'") or die (mysqli_error($con));
    echo "<script>alert('Data diubah');</script>";
    echo "<script>window.location='data.php';</script>";
}
?>