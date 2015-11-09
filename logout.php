<?php
	session_start();
	unset($_SESSION['amibangali']);
	session_destroy();
	header('location: index.php');
	setcookie('amiloginkoreachi', '', time()-1);
	exit();
?>