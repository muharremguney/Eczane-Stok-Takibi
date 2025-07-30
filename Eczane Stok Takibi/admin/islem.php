<?php 

include 'baglan.php';
date_default_timezone_set('Europe/Istanbul');

function SEO($s) {

 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',',' ','!','?');

 $eng= array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','-','','');

 $s = str_replace($tr,$eng,$s);

 $s = strtolower($s);

 $s = preg_replace('/&.+?;/', '', $s);

 $s = preg_replace('|-+|', '-', $s);

 $s = preg_replace('/#/', '', $s);

 $s = str_replace('.', '', $s);

$s = str_replace(' ', '', $s);

 $s = trim($s, '-');

 return $s;

} 

//Fotoğraf Kesin Ayarları
 $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');
 $dizin=     "../img/portfolio";


session_start();

if (!isset($_SESSION["user"])) { header("Location: giris.php"); exit; }


if (isset($_POST['soru-ekle'])) {
	$ekleyen	=	$_SESSION["userid"];
  $soru       = $_POST['soru'];
    $soru = str_replace("'", "\'", $soru);
	echo $soru;
  $cevaplar   = $_POST['cevap'];
  $dogruCevap = $_POST['dogru'];
  $konu       = $_POST['konu'];
  $tarih      = date('d-m-Y');
  $cevap = $_POST['dogru'];
  	$dosyayolu=NULL;
	//resim al





if(!empty($_FILES["dosya"]["name"]))
{
	$maxboyut=500000000;
//$dosyauzantisi=substr($_FILES["dosya"]["name"], -4,4);

 $dosyauzantisi=explode (".",$_FILES["dosya"]["name"]);
 $dosyauzantisi=$dosyauzantisi[count($dosyauzantisi)-1];
 
$dosyaadi=rand(0,99999999)."_".rand(0,99999999).".".$dosyauzantisi;
$dosyayolu="img/".$dosyaadi;
if($_FILES["dosya"]["size"]>$maxboyut)
	{
    	echo "Dosya boyutu en fazla <b>50000 KB olabilir</b>";
	}
else{
    $d=$_FILES["dosya"]["type"];
	if($d=="image/jpeg" || $d="images/png" || $d="images/gif")
	{
		if(is_uploaded_file($_FILES["dosya"]["tmp_name"]))
		{
            $tasi=move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyayolu);
            if(!$tasi)
			{
		  header("Location: soru-ekle.php?durum=no");
		 
				}
					
 		}
	else{
            echo"Dosya Yüklenirken bir sorun oluştu.".$dosyayolu;
        }
  }
else{
        echo "Dosya formatı <b>GİF, JPEG ya da PNG</b> olmalıdır";
   }
}
}
$sorgusoruekle="insert into sorular(sr_icerik,sr_ekleyen,sr_konu,sr_tarih,sr_resim) values('$soru',$ekleyen,'$konu',NOW(),'$dosyayolu')";

echo "<br>$sorgusoruekle<br>";
   if (mysqli_query($conn,$sorgusoruekle)) {
  	$id = mysqli_insert_id($conn);
		for ($i=0; $i < count($cevaplar) ; $i++) { 
			if ($dogruCevap == $i ) $durum = 1; else $durum = 0;
			$cevap = $cevaplar[$i];
				if (mysqli_query($conn,"insert into soru_siklar(sk_icerik,sk_srid,sk_durum) values('$cevap',$id,$durum)")) {
					header("Location: soru-ekle.php?durum=ok");
				}
				else 
					header("Location: soru-ekle.php?durum=no");
 		}
  }


}


if (isset($_POST['soru-guncelle'])) {
  $soru       = $_POST['soru'];
    $soru = str_replace("'", "\'", $soru);
	echo $soru;
  $cevaplar   = $_POST['cevap'];
  $dogruCevap = $_POST['dogru'];
  $konu       = $_POST['konu'];
  $tarih      = date('d-m-Y');
  $cevap      = $_POST['dogru'];
  $id         = $_POST['id'];
  if (mysqli_query($conn,"update sorular set sr_icerik = '$soru', sr_konu = '$konu',sr_tarih = NOW() where sr_id = $id")) {
     if(mysqli_query($conn,"delete from soru_siklar where sk_srid = $id")){

		for ($i=0; $i < count($cevaplar); $i++) { 
			if ($dogruCevap == $i ) $durum = 1; else $durum = 0;
			$cevap = $cevaplar[$i];
				if (mysqli_query($conn,"insert into soru_siklar(sk_icerik,sk_srid,sk_durum) values('$cevap',$id,$durum)")) {
					header("Location: soru-ekle.php?durum=ok&id=$id");
				}
				else 
					header("Location: soru-ekle.php?durum=no&id=$id");
  		}
  }
}
}

if(isset($_POST["uye-ekle"])){
	
  $kladi   = $_POST['kladi'];
  $klsifre = $_POST['klsifre'];
  $klyetki = $_POST['klyetki'];
	
		if(mysqli_num_rows(mysqli_query($conn,"select * from user where user_kadi='$kladi'"))==0){
						
			if(mysqli_query($conn,"insert into user(user_kadi,user_sifre,user_yetki) values('$kladi','$klsifre',$klyetki)")){ header("Location: uye-ekle.php?durum=ok");}
			else header("Location: uye-ekle.php?durum=no");
			}	
}

// KATEGORİ-URUN EKLE VE GÜNCELLE

if (isset($_POST['kategori-ekle'])) {
	$kategori = addslashes($_POST['kategori-adi']);

	if (mysqli_query($conn,"insert into kategori(kategori_ad) values('$kategori')")) {
		header("Location: dersler.php?durum=ok");

	}else header("Location: dersler.php?durum=no");
}

if (isset($_POST['kategori-guncelle'])) {
	$id   = $_POST['kategori-id'];
	$kategori = addslashes($_POST['kategori-adi']);
	if (mysqli_query($conn,"update kategori set kategori_ad = '$kategori' where kategori_id=$id")) {
		header("Location: dersler.php?durum=ok&id=$id");

	}else header("Location: dersler.php?durum=no&id=$id");
}


if (isset($_POST['urun-ekle'])) {
	$urun = addslashes($_POST['urun-adi']);
	$fiyat = addslashes($_POST['urun-fiyat']);
	$skt = addslashes($_POST['urun-skt']);
	$stok = addslashes($_POST['urun-stok']);
	$kat = addslashes($_POST['kategori-id']);

	if (mysqli_query($conn,"insert into urunler(urun_ad,urun_fiyat,urun_skt,urun_stok,kategori_id) values('$urun','$fiyat','$skt','$stok','$kat')")) {
		header("Location: konular.php?durum=ok");

	}else header("Location: konular.php?durum=no");
}

if (isset($_POST['urun-guncelle'])) {
	$id   = $_POST['urun-id'];
	$urun_ad = addslashes($_POST['urun-adi']);
	$urun_fiyat = addslashes($_POST['urun-fiyat']);
	$urun_skt = addslashes($_POST['urun-skt']);
	$urun_stok = addslashes($_POST['urun-stok']);
	$kategori_id = addslashes($_POST['kategori-id']);
	if (mysqli_query($conn,"update urunler set urun_ad = '$urun_ad',urun_fiyat = '$urun_fiyat',urun_skt = '$urun_skt',urun_stok = '$urun_stok',kategori_id = '$kategori_id' where urun_id=$id")) {
		header("Location: konular.php?durum=ok&id=$id");

	}else header("Location: konular.php?durum=no&id=$id");
}







//müsteri ekle ve güncelle


if (isset($_POST['musteri-ekle'])) {
	$musteri_ad = addslashes($_POST['musteri_ad']);
	$musteri_soyad = addslashes($_POST['musteri_soyad']);
	$musteri_yas = addslashes($_POST['musteri_yas']);
	$musteri_telefon = addslashes($_POST['musteri_telefon']);
	$musteri_adres = addslashes($_POST['musteri_adres']);
	$musteri_cinsiyet = addslashes($_POST['musteri_cinsiyet']);
	
	
	if (mysqli_query($conn,"insert into musteri(musteri_ad,musteri_soyad,musteri_yas,musteri_telefon,musteri_adres,musteri_cinsiyet) values('$musteri_ad','$musteri_soyad','$musteri_yas','$musteri_telefon','$musteri_adres','$musteri_cinsiyet')")) {
		header("Location: soru-ekle.php?durum=ok");

	}else header("Location: soru-ekle.php?durum=no");
}






if (isset($_POST['musteri-guncelle'])) {
	$id   = $_POST['musteri_id'];
	$musteri_ad = addslashes($_POST['musteri_ad']);
	$musteri_soyad = addslashes($_POST['musteri_soyad']);
	$musteri_yas = addslashes($_POST['musteri_yas']);
	$musteri_telefon = addslashes($_POST['musteri_telefon']);
	$musteri_adres = addslashes($_POST['musteri_adres']);
	$musteri_cinsiyet = addslashes($_POST['musteri_cinsiyet']);
	
	if (mysqli_query($conn,"update musteri set musteri_ad = '$musteri_ad',musteri_soyad = '$musteri_soyad',musteri_yas = '$musteri_yas',musteri_telefon = '$musteri_telefon',musteri_adres = '$musteri_adres',musteri_cinsiyet = '$musteri_cinsiyet' where musteri_id=$id")) {
		header("Location: soru-ekle.php?durum=ok&id=$id");

	}else header("Location: soru-ekle.php?durum=no&id=$id");
}




//bitti




//sipairs ekle ve güncelle


if (isset($_POST['siparis-ekle'])) {
	$musteri_id = addslashes($_POST['musteri_id']);
	$urun_id = addslashes($_POST['urun_id']);
	$siparis_adet = addslashes($_POST['siparis_adet']);
	$siparis_tarih = addslashes($_POST['siparis_tarih']);
	$siparis_deger = addslashes($_POST['siparis_deger']);
	


	
	
	if (mysqli_query($conn,"insert into siparis(musteri_id,urun_id,siparis_adet,siparis_tarih,siparis_deger) values('$musteri_id','$urun_id','$siparis_adet','$siparis_tarih','$siparis_deger')")) {
		header("Location: gelensiparis.php?durum=ok");

	}else header("Location: gelensiparis.php?durum=no");
}










//bitti
	












	
	
	
	
	
//admin ekle
if (isset($_POST['admin-ekle'])) {
	$user_kadi = addslashes($_POST['user_kadi']);
	$user_sifre = addslashes($_POST['user_sifre']);
	
	
	if (mysqli_query($conn,"insert into user(user_kadi,user_sifre) values('$user_kadi','$user_sifre')")) {
		header("Location: adminekle.php?durum=ok");

	}else header("Location: adminekle.php?durum=no");
}




//bitti




if (isset($_POST['test-ekle'])) {

  $toplamSoru = (int)$_POST['sorusay'];
  $konular = $_POST['konu'];
  $sorusuresi = $_POST['sorusure'];
  $tsacikla = $_POST['tsaciklama'];
  $tarih = date('d-m-Y');
  $sonid = 0;
  $sqlSorgusu = "SELECT * from sorular where ";
  if (mysqli_query($conn,"insert into testler(soru_sure,kisi_id,tarih,aciklama) values($sorusuresi,1,NOW(),'$tsacikla')")) {
  	$sonid = mysqli_insert_id($conn);
		for ($i=0; $i < count($konular) ; $i++) { 
			if ($i+1 == count($konular)) {
				$sqlSorgusu .= "sr_konu =".$konular[$i];
			}else $sqlSorgusu .= "sr_konu =".$konular[$i]." or ";
			
		}	

	$sorgusu=mysqli_query($conn,$sqlSorgusu." ORDER by RAND() LIMIT ".$toplamSoru." ");
		while($okusoru=mysqli_fetch_array($sorgusu)){
			
			$idsi=$okusoru["sr_id"];
			$soruekle=mysqli_query($conn,"insert into test_sorular(tsr_test_id,tsr_soru_id) values($sonid,$idsi)");
			echo mysqli_error($conn);
			
		
		}

		$toplamEklenenSoru = mysqli_num_rows($sorgusu);
		if ($toplamSoru != $toplamEklenenSoru) {
			$sayi = $toplamSoru - $toplamEklenenSoru;
			header("Location:test-ekle.php?durum=eksik&sayi=$sayi");
		}
		else header("Location: test-ekle.php?durum=ok");
  } 
}

if (isset($_GET['test-konu-sil'])) {
	$konuid = $_GET['test-konu-sil'];
	$testid = $_GET['test-id-konu'];
	if (mysqli_query($conn,"delete test_sorular from test_sorular left join sorular on tsr_soru_id=sr_id where sr_konu=$konuid and tsr_test_id=$testid ")) {

		if(mysqli_num_rows(mysqli_query($conn,"select * from test_sorular where tsr_test_id=$testid"))==0){

			$kalanisil=mysqli_query($conn,"delete from testler where test_id=$testid ");

			header("Location: test-listele.php?durum=ok");
		}else header("Location: test-listele.php?durum=ok&d=$testid");
	}else
		header("Location: test-listele.php?durum=no&d=$testid");


}
if (isset($_GET['test-sil'])) {
	$testid = $_GET['test-sil'];

	if (mysqli_query($conn,"delete  from testler where test_id=$testid")) {

		header("Location: test-listele.php?durum=ok");		}
	
	else header("Location: test-listele.php?durum=ok&d=$testid");
	

}





if (isset($_GET['test-soru-sil'])) {
	$soruid = $_GET['test-soru-sil'];
	$testid = $_GET['test-id'];
	if (mysqli_query($conn,"delete from test_sorular where tsr_soru_id=$soruid ")) {

		if(mysqli_num_rows(mysqli_query($conn,"select * from test_sorular where tsr_test_id=$testid"))==0){

			$kalanisil=mysqli_query($conn,"delete from testler where test_id=$testid ");

			header("Location: test-listele.php?durum=ok");
		}else header("Location: test-listele.php?durum=ok&d=$testid");
	}else
		header("Location: test-listele.php?durum=no&d=$testid");


}




 ?>