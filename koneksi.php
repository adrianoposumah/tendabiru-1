<?php 
$koneksi = mysqli_connect("localhost","root","020804apip","user_level");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>