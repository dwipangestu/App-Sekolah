<?php 
require_once "../../../_config/config.php";

if(isset($_POST['add'])) {
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $nama_guru = trim(mysqli_real_escape_string($con, $_POST['nama_guru']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    $sql_cek_identitas = mysqli_query($con,"SELECT * FROM tb_guru WHERE nip = '$nip'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Sudah Terdaftar!'); window.location='data.php';</script>";
    } else { 

    mysqli_query($con, "INSERT INTO tb_guru (nip, nama_guru, alamat, no_telp) VALUES ('$nip', '$nama_guru', '$alamat', '$no_telp')") or die (mysqli_error($con));
    echo "<script>alert('Data tersimpan');</script>";
    echo "<script>window.location='data.php';</script>";
}
} else if(isset($_POST['edit'])) {
    $kode = $_POST['kodejurusan'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['namajurusan']));
    mysqli_query($con, "UPDATE tb_alumni SET nama_jurusan = '$nama' WHERE tahun_lulus = '$kode'") or die (mysqli_error($con));
    echo "<script>alert('Data diubah');</script>";
    echo "<script>window.location='data.php';</script>";
}
?>