
<?php include'header.php'; ?>


<?php


	   $post = mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as adet from musteri"));
       $kategori = mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as adet from urunler"));
       $gelir = mysqli_fetch_assoc(mysqli_query($conn,"SELECT  SUM(siparis.siparis_adet*urunler.urun_fiyat)AS total FROM siparis,urunler WHERE urunler.urun_id = siparis.urun_id"));
	   $siparis = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as siparis_sayi FROM siparis"));
       
  ?>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="soru-ekle.php">Müşteriler</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><div id="post-sayi"></div></div>
                    </div>
                    <div class="col-auto">
                     <a href="soru-ekle.php"> <i class="fas fa-user fa-2x text-gray-300"></a></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			
			
			
			
			<!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"> <a href="konular.php"> Ürünler</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><div id="kategori-sayi"></div></div>
                    </div>
                    <div class="col-auto">
                      <a href="konular.php"> <i class="fas fa-list fa-2x text-gray-300"> </a></i>
                    </div>
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
			<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"> <a href="yenisiparisler.php">Tüm Siparişler</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><div id="siparis-sayi"></div></div>
                    </div>
                    <div class="col-auto">
                     <a href="yenisiparisler.php"> <i class="fas fa-tag fa-2x text-gray-300"> </a></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			
			
			
			<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">Toplam Gelir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><div id="gelir-sayi"></div></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			
			
			
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Bugün Gelen Siparişler</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="1235" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>Müşteri Adı Soyadı</th>

                      <th>Müşteri Telefon</th>
					  
					  <th>Müşteri Adres</th>

                      <th>Ürün Adı</th>

                      <th>Sipariş Adeti</th>
                      
                           

                      <th>Sipariş Tarihi</th>



                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT CONCAT(musteri.musteri_ad, ' ', musteri.musteri_soyad) AS isim, musteri.musteri_telefon, musteri.musteri_adres, urunler.urun_ad,siparis.siparis_adet,siparis.siparis_tarih
FROM musteri,siparis,urunler 
WHERE musteri.musteri_id = siparis.musteri_id AND siparis.urun_id = urunler.urun_id AND siparis_tarih = DATE(NOW())"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['isim']; ?></td>

                      <td><?php echo $oku['musteri_telefon']; ?></td>
					  
					  <td><?php echo $oku['musteri_adres'];  ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>

                      <td><?php echo $oku['siparis_adet']; ?></td>
					  
					  <td><?php echo $oku['siparis_tarih']; ?></td>
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<script type="text/javascript">

function animateValue(id, start, end, duration) {
   
    var obj = document.getElementById(id);
    var range = end - start;
    var minTimer = 50;
    var stepTime = Math.abs(Math.floor(duration / range));
    stepTime = Math.max(stepTime, minTimer);
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;
  
    function run() {
        var now = new Date().getTime();
        var remaining = Math.max((endTime - now) / duration, 0);
        var value = Math.round(end - (remaining * range));
        obj.innerHTML = value;
        if (value == end) {
            clearInterval(timer);
        }
    }
    
    timer = setInterval(run, stepTime);
    run();
}

animateValue("post-sayi", 0, <?php echo $post["adet"]; ?>, 1700);
animateValue("kategori-sayi", 0, <?php echo $kategori["adet"]; ?>, 1700);
animateValue("gelir-sayi", 0, <?php echo $gelir["total"]; ?>, 1700);
animateValue("siparis-sayi", 0, <?php echo $siparis["siparis_sayi"]; ?>, 1700);

//animateValue("ziyaretci-sayi", 0, 0, 1700);

</script>
<?php include'footer.php'; ?>