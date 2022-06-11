<?php 
require_once "../_config/config.php";
?>
<?php 
if (isset($_SESSION["admin"])) 
{
  echo "<script>location='../dashboard';</script>";

}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Perpustakaan Elektronik">
    <meta name="author" content="Dwi Pangestu - STMIK Eresha">
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url('../assets/dist/css/bootstrap.min.css');?>"> <!-- v.421-->
    <link rel="stylesheet"  type="text/css" href="<?=base_url('_assets2/css/style.css');?>">
    <link href="<?=base_url('_assets2/fontawesome-free-5.13.0/css/all.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('img/logo nida.png')?>">
</head>
<body>
<!-- navbar atas -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand font-weight-bold text-white" href=""><img src="../img/logo nida.png" width="30" height="30" class="d-inline-block align-top" alt=""> <span style="font-size: 14px;"><span style="font-size: 20px;">e</span>-Library SMK NIDA EL-ADABI</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-white js-scroll-trigger" href="../index.php"><i class="fas fa-home"></i> HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="" aria-expanded="">
              <i class="fas fa-archive"></i> KOLEKSI
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../buku.php"><i class="fas fa-book-open"></i> BUKU</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../ebook.php"><i class="fas fa-book"></i> ELEKTRONIK BUKU</i></a><!-- 
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../usulan.php"><i class="fas fa-lightbulb"></i> USULAN BUKU</a>  -->          
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white js-scroll-trigger" href="../pengumuman.php"><i class="fas fa-bullhorn"></i> PENGUMUMAN<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white js-scroll-trigger" href=""><i class="fas fa-sign-in-alt"></i> LOGIN </a>
          </li>         
        </ul>
        </div>
</nav>

<br><br><br>
<section>
 <div class="container">
  <div class="row justify-content-center">
  <div class="col-lg-6 col-lg-offset-3"><br>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fas fa-lock"></i> Login System</h3>
          <div class="panel-body">
          <?php 
if (isset($_POST["login"])) {
  $user = mysqli_real_escape_string($con, $_POST['user']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
 if ($status == 'admin') {
    $sql1 = mysqli_query($con, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$password' AND level = 'admin'") or die (mysqli_error($con));
    $data1 = mysqli_fetch_assoc($sql1);;
    $cek1 = mysqli_num_rows($sql1);
    if($cek1 > 0) {
      $_SESSION['admin'] = $data1['id_admin'];
      echo"<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Berhasil Login !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";
      echo "<script>window.location='".base_url('dashboard')."';</script>";
    } else {
      echo "<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Login Gagal ! Periksa Username/Password</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";
    }
 } else if ($status == 'petugas') {
   $sql2 = mysqli_query($con, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$password' AND level = 'petugas'") or die (mysqli_error($con));
    $data2 = mysqli_fetch_assoc($sql2);;
    $cek2 = mysqli_num_rows($sql2);
    if($cek2 > 0) {
      $_SESSION['petugas'] = $data2['id_admin'];
      echo"<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Berhasil Login Berhasil!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";

      echo "<script>window.location='".base_url('petugas')."';</script>";
    } else {
      echo "<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Login Gagal ! Periksa Username/Password</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";
    }
 } else if ($status == 'siswa') {
   $sql1 = mysqli_query($con, "SELECT * FROM tb_anggota WHERE username = '$user' AND password = '$password'") or die (mysqli_error($con));
    $data1 = mysqli_fetch_assoc($sql1);;
    $cek1 = mysqli_num_rows($sql1);
    if($cek1 > 0) {
      $_SESSION['siswa'] = $data1['username'];
      echo"<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Login Berhasil !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";

      echo "<script>window.location='".base_url('')."';</script>";
    } else {
      echo "<br><div class='row justify-content-center'>
              <div class='col'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Login Gagal ! Periksa Username/Password</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                </div>
            </div>";
    }
 }  
}
?>
          <form action="" method="post">
            <div class="form-group">
              <label for="user">Username</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="user" id="user" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                </div>
                <input type="password" class="form-control" name="password" id="password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select type="status" class="form-control" name="status" id="status" required="">
                <option value=""> Pilih</option>
                <option value="admin"> Admin</option>
                <option value="petugas"> Petugas</option>
                <option value="siswa"> Anggota</option>
              </select>
            </div>
              <button class="btn btn-primary btn-xs" name="login">Login</button>
              <button class="btn btn-danger" type="reset" name="reset">Batal</button>
          </form>          
        </div>        
      </div>
    </div>
  </div> <!-- col -->
 </div><!-- row -->
</div><!-- container -->
</section>



</body>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>