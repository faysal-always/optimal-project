<?php
ob_start();
session_start();
include "config.php";
if(isset($_COOKIE['amiloginkoreachi'])){
	$_SESSION['amibangali'] = $_COOKIE['amiloginkoreachi']; 
}

if(!isset($_SESSION['amibangali'])){
	header('location: login.php');
	exit();
}

$secure = 1;
$site_url = 'http://localhost/phpclass'; 

if(isset($_GET['page'])){
  $inc = 'inc/'.$_GET['page'].'.php';
  if(!file_exists($inc)){
    $inc = 'inc/404.php';
  }
}else{
  $inc = 'inc/dashboard.php';
}

include "inc/header.php";
include $inc;
include "inc/footer.php";
ob_flush();
?>