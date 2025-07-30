<?php 



$conn = mysqli_connect("localhost","root","","eczane") or die("hata");
function baglan(){
	 $conn = mysqli_connect("localhost","root","","eczane") or die("hata");
return $conn;
}

mysqli_query($conn,"SET NAMES UTF8");



 

?>