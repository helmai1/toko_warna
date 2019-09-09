<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "toko_warna";

$koneksi = mysqli_connect("localhost","root","","toko_warna");
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>