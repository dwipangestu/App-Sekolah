<?php include_once('../_header.php'); ?>
<?php 
if (!isset($_SESSION["user"])) 
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='../auth/login.php';</script>";
}
?>
      Dashboard
<?php include_once('../_footer.php'); ?>