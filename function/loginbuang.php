<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include"config.php";

$login=mysql_query("select * from students where npm='$_POST[npm]' and password='$_POST[npm]'");
$rowcount=mysql_num_rows($login);
$r=mysql_fetch_array($login);
if($rowcount > 0) {
	
	$_SESSION['npm']=$_POST['npm'];
	$_SESSION['password']=$_POST['password'];
		
		
	echo"<script>setTimeout(function(){document.location='home.php'},5000);</script>";
	echo"<br><br><br><br><h3 align=center> LOADING SEBAGAI ".strtoupper($_POST[npm])." </h3>";
	echo"<center><img src='loading.gif'></center>";
	
	// sisipkan jika di perlukan
	
	
	}
	else {
				
		echo"<script>alert('Anda gagal masuk');window.location.href='index.php';</script>";
	}
ob_end_flush();	

?>