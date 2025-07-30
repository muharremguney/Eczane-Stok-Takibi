<?php include'header.php'; ?>


<?php


	   $post = mysqli_fetch_assoc(mysqli_query($conn,"SELECT  SUM(siparis.siparis_adet*urunler.urun_fiyat)AS total FROM siparis,urunler WHERE urunler.urun_id = siparis.urun_id AND siparis.siparis_tarih >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)"));


       
       
  ?>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4"> 
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">1 Aylık Kazanç</div>
					  
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="urun-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <i class="fas fa-money-bill fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        
          </div>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">1 Ay İçinde Verilen Sipariş Sayısı</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>
					  
					  <th>Ürün Adı</th>

                      <th>Sipariş Sayısı</th>
					  
					  <th>Ürün Fiyat</th>
					  
					  <th>Satılan Adet</th>
					  
					  <th>Total</th>
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT urunler.urun_id, urunler.urun_ad, COUNT(urunler.urun_id) as adet, urunler.urun_fiyat, SUM(siparis.siparis_adet) as satilanadet, SUM(siparis.siparis_adet) * urun_fiyat as toplam
FROM musteri,siparis,urunler
WHERE musteri.musteri_id=siparis.musteri_id AND siparis.urun_id = urunler.urun_id AND siparis.siparis_tarih >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
GROUP BY urunler.urun_id  
ORDER BY `adet`  DESC"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['urun_id']; ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>

                      <td><?php echo $oku['adet']; ?></td>
					  
					  <td><?php echo $oku['urun_fiyat']; ?></td>
					  
					  <td><?php echo $oku['satilanadet']; ?></td>

                      <td><?php echo $oku['toplam']; ?></td>

                    
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?><script type="text/javascript">

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
animateValue("urun-sayi", 0, <?php echo $post["total"]; ?>, 1700);




//animateValue("ziyaretci-sayi", 0, 0, 1700);

</script>
<?php include'footer.php'; ?>