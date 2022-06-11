<?php require_once "_config/config.php"; ?>
<?php 
if (!isset($_SESSION["user"])) 
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='../auth/login.php';</script>";
}
// if (!isset($_SESSION["admin"])) 
// {
//   echo "<script>alert('silahkan login');</script>";
//   echo "<script>location='../auth/login.php';</script>";
// }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/dist/css/dashboard.css');?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SIA Fest</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?=base_url('index.php')?>">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?=base_url('admin')?>">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/datauser/data.php')?>">
              <span data-feather="file"></span>
              Data User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/dataalumni/data.php')?>">
              <span data-feather="shopping-cart"></span>
              Data Alumni
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/datasiswa/data.php')?>">
              <span data-feather="shopping-cart"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/dataguru/data.php')?>">
              <span data-feather="users"></span>
              Data Guru
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/jurusan/data.php')?>">
              <span data-feather="bar-chart-2"></span>
              Data Jurusan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/kelas/data.php')?>">
              <span data-feather="layers"></span>
              Data Kelas
            </a>
          </li>
        </ul>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/pendaftaran/data.php')?>">
              <span data-feather="file-text"></span>
              Pendaftaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/pembayaran/data.php')?>">
              <span data-feather="file-text"></span>
              Pembayaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/galeri/data.php')?>">
              <span data-feather="file-text"></span>
              Galery
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/page/post/data.php')?>">
              <span data-feather="file-text"></span>
              Post
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


        

      	
      