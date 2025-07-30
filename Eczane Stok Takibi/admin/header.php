<?php include 'baglan.php';
session_start();
if (!isset($_SESSION["user"])) { header("Location: giris.php"); exit; }?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>e-Eczane</title>
  <link rel="icon" href="../img/fav.ico" type="image/x-icon" />
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../js/lightbox/dist/css/lightbox.css">
<script src="../js/lightbox/dist/js/lightbox.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script src="sweetalert/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
</head>

<body id="page-top">

  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary  sidebar sidebar-dark accordion" id="accordionSidebar">


      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="panel.php">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">YÖNETİM PANELİ</div>
      </a>

      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="panel.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Anasayfa</span></a>
      </li>
	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="dersler.php">
          <i class="fas fa-fw fa-layer-group"></i>
          <span>Kategori</span></a>
      </li>

	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="konular.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Ürünler</span></a>
      </li>

	  
	  
	    <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="soru-ekle.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Müşteriler</span></a>
      </li>
	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="gelensiparis.php">
          <i class="fas fa-fw fa-cart-plus"></i>
          <span>Siparişler</span></a>
      </li>
	  
	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="urunstok.php">
          <i class="fas fa-fw fa-dolly"></i>
          <span>Stok</span></a>
      </li>
	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="uruntarih.php">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Tarih</span></a>
      </li>
	  
	  
	  <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="soru-listele.php">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Analiz</span></a>
      </li>

	 

    

      <hr class="sidebar-divider d-none d-md-block">
     

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["user"]; ?></span>
                <img class="img-profile rounded-circle" src="yonetici">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                <a class="dropdown-item" href="login-check.php?cikis" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
				<a class="dropdown-item" href="adminekle.php" >
                  <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                  Admin Ekle
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">