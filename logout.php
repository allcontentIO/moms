<?php  
	session_start();
	
	$_SESSION['moms_uid'] = "";
	session_destroy();
	session_unset();
	$res= 'logout';
	header("Location:login.php?res=".$res);
?>