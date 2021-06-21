<?php
include 'config.php';
session_start(); 
$npm = $_POST['npm'];
$password = $_POST['password'];
$database = mysqli_query($link, "SELECT * FROM students where npm = '$npm' and password = '$password'");

$ceklogin = mysqli_num_rows($database);
if($ceklogin>0){
	$ambil_data_pengguna = mysqli_query($link, "SELECT * FROM students where npm = '$npm' and password = '$password'");
	while ($row = $ambil_data_pengguna->fetch_assoc()){
		// $id_pendaftar = $row['id_pendaftar'];
		$id_major = $row['id_major'];
		$id_lecturer = $row['id_lecturer'];
		$semester = $row['semester'];
		$sks = $row['sks'];
		$tahun_masuk = $row['tahun_masuk'];
		$npm = $row['npm'];
	}
	$_SESSION['id_major'] = $id_major;
	$_SESSION['npm'] = $npm;
	$_SESSION['id_lecturer'] = $id_lecturer;
	$_SESSION['semester'] = $semester;
	$_SESSION['tahun_masuk'] = $tahun_masuk;
	$_SESSION['status'] = "login";
	header("location:../index.php");
}
else{
	header("location:login.php?pesan=gagal");
}
?>