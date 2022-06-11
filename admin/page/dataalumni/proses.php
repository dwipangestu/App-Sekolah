<?php 
require_once "../../../_config/config.php";

if(isset($_POST['add'])) {
    $nisn = trim(mysqli_real_escape_string($con, $_POST['nisn']));
    $tahun_masuk = trim(mysqli_real_escape_string($con, $_POST['tahun_masuk']));
    $tahun_lulus = trim(mysqli_real_escape_string($con, $_POST['tahun_lulus']));

    $sql_cek_identitas = mysqli_query($con,"SELECT * FROM tb_alumni WHERE id = '$nisn'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Sudah Terdaftar!'); window.location='data.php';</script>";
    } else { 

    mysqli_query($con, "INSERT INTO tb_alumni (id, nisn, tahun_masuk, tahun_lulus) VALUES ('', '$nisn', '$tahun_masuk', '$tahun_lulus')") or die (mysqli_error($con));
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
$nisn = $_GET['nisn'];
$query = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nisn='$nisn'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'nama_siswa'   =>  $mahasiswa['nama_siswa'],
            'tahun_masuk'   =>  $mahasiswa['tahun_masuk'],);
 echo json_encode($data);
?>