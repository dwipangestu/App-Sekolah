<?php 
require_once "../_config/config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Log In System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        padding-top: 150px;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../style.css" rel="stylesheet">
  </head>
<main role="main" class="container">
<body class="text-center">
  <div class="row">
    <div class="col-md-12 blog-main">
      <div class="blog-post">
        <h2 class="blog-post-title"></h2>
        <body class="text-center">
          <form class="form-signin" action="" method="post">
          <?php 
              if (isset($_POST["login"])) {
                $user = mysqli_real_escape_string($con, $_POST['username']);
                $pass = mysqli_real_escape_string($con, $_POST['password']);
                $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass' AND level = 'admin'") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_login) > 0) {
                  $_SESSION['user'] = $user;
                  echo"<br><div class='row justify-content-center'>
                            <div class='col'>
                              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Berhasil Login !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                              </div>
                              </div>
                          </div>";
                  echo "<script>window.location='".base_url('admin')."';</script>";
              }else { ?>
                  <div class="row">
                    <div class="col">
                      <div class="alert alert-danger alert-dismissable" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <strong>Login gagal!</strong> Username / Password salah
                      </div>
                    </div>
                  </div>  
                <?php           
                }
              }
            ?>
            <img class="mb-4" src="../_doc/img/img.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Log In System</h1>            
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" id="username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" id="password" required>
            <!-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> -->
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
          </form>
        </body>
      </div><!-- /.blog-post  -->

    </div><!-- /.blog-main -->
  </div>
</body>
</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://facebook.com/dwi.smpn1" target="_blank">@dwi</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
</body>
</html>
