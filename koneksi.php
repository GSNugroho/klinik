<?php
	$host="localhost";
	$user="root";
	$password="";	
	$koneksi=mysqli_connect($host,$user,$password) or 
	die("Gagal koneksi!");
	mysqli_select_db($koneksi, "balaipengobatan");
?>