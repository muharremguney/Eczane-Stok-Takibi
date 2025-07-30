<?php
 
$silinecekID= $_GET['id'];
 
$baglan=mysqli_connect("localhost","root","","eczane");
mysqli_set_charset($baglan, "utf8");
 
$sonuc=mysqli_query($baglan,"DELETE from musteri
where musteri_id=".$silinecekID);
 
if($sonuc>0){
header( "refresh:0;url=soru-ekle.php" ); 
 }
else
echo "Bir sorun oluştu silinemedi";
 
?>