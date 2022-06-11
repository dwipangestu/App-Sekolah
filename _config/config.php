<?php 
//setting default timezone
date_default_timezone_set('Asia/Jakarta');

session_start();

include_once "conn.php";

$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

function base_url($url = null) {
    $base_url = "http://localhost/Fest";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>