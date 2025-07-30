<?php include'baglan.php';
	session_start();



	if (isset($_POST["giris"])) {



		$kadi  = $_POST["kadi"];

		$sifre = $_POST["sifre"];

		$kadi_sorgu = mysqli_fetch_assoc(mysqli_query($conn,"select count(user_id),user_sifre,user_id from user where user_kadi='$kadi'"));

		$kadi_count = $kadi_sorgu["count(user_id)"];

		$kadi_sifre = $kadi_sorgu["user_sifre"];
		$userid = $kadi_sorgu["user_id"];

		if ($kadi_count!=0) {

	

			if ($kadi_sifre==$sifre) {

				$_SESSION["user"] = $kadi;
				$_SESSION["userid"] = $userid;

				header("Location: panel.php");
				exit;
			}
			else { header("Location: index.php?hata1");   exit; }
			}
			else { header("Location: index.php?hata2");  exit; }
			}


	if (isset($_GET["cikis"])) {

		session_destroy();

		header("Location: index.php");

		exit;

	}



	header("Location: index.php");

	





 ?>