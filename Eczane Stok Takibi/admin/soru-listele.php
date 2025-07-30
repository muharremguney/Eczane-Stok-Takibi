
<?php include'header.php'; ?>


<?php


	   $post = mysqli_fetch_assoc(mysqli_query($conn,"SELECT urunler.urun_ad, SUM(siparis.siparis_adet) AS adet
FROM musteri,siparis,urunler
WHERE musteri.musteri_id=siparis.musteri_id AND siparis.urun_id = urunler.urun_id
GROUP BY urunler.urun_id  
ORDER BY adet  DESC
LIMIT 1"));

 $musteri = mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(musteri.musteri_ad, ' ',musteri.musteri_soyad) as isim,COUNT(siparis.musteri_id) as adet
FROM musteri,siparis
WHERE musteri.musteri_id=siparis.musteri_id
GROUP BY musteri.musteri_id
ORDER BY adet DESC
LIMIT 1"));

$katsayi = mysqli_fetch_assoc(mysqli_query($conn,"SELECT kategori.kategori_ad, COUNT(kategori.kategori_ad) as adet
FROM musteri,siparis,urunler,kategori 
WHERE musteri.musteri_id = siparis.musteri_id AND siparis.urun_id = urunler.urun_id AND urunler.kategori_id = kategori.kategori_id
GROUP BY kategori.kategori_id  
ORDER BY adet  DESC
LIMIT 1"));

$ay = mysqli_fetch_assoc(mysqli_query($conn,"SELECT urunler.urun_ad, COUNT(urunler.urun_id) as adet
FROM musteri,siparis,urunler
WHERE musteri.musteri_id=siparis.musteri_id AND siparis.urun_id = urunler.urun_id AND siparis.siparis_tarih >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
GROUP BY urunler.urun_id  
ORDER BY `adet`  DESC
LIMIT 1"));

$satisyok = mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(urunler.urun_id)as adet from urunler where not exists (select * from siparis where siparis.urun_id = urunler.urun_id)"));

$musyok = mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(musteri.musteri_id) as adet from musteri where not exists (select * from siparis where siparis.musteri_id = musteri.musteri_id)"));   

$deger = mysqli_fetch_assoc(mysqli_query($conn,"SELECT urunler.urun_ad, ROUND(AVG(siparis.siparis_deger),1) AS adet
FROM urunler,siparis
WHERE urunler.urun_id=siparis.urun_id
GROUP BY urunler.urun_ad  
ORDER BY `adet`  DESC
LIMIT 1"));    


$cinsiyet = mysqli_fetch_assoc(mysqli_query($conn,"SELECT musteri.musteri_cinsiyet, COUNT(*) as adet
FROM urunler,siparis,musteri
WHERE urunler.urun_id = siparis.urun_id AND siparis.musteri_id =musteri.musteri_id
GROUP BY musteri.musteri_cinsiyet  
ORDER BY `adet`  DESC
LIMIT 1"));    

$yil = mysqli_fetch_assoc(mysqli_query($conn,"SELECT  SUM(siparis.siparis_adet*urunler.urun_fiyat)AS total FROM siparis,urunler WHERE urunler.urun_id = siparis.urun_id AND siparis.siparis_tarih BETWEEN '2022-01-01' AND '2022-12-31'"));    
       
  ?>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="coksatan.php">Çok Satan Ürün(adet)</a></div>
					  <td><?php echo $post['urun_ad']; ?></td>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="urun-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="coksatan.php"> <i class="fas fa-caret-up fa-4x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="cokmusteri.php">Çok Sipariş Veren</a></div>
					  <td><?php echo $musteri['isim']; ?></td>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="musteri-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="cokmusteri.php"> <i class="fas fa-user fa-2x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="cokkategori.php">Çok Satan Kategori</a></div>
					  <td><?php echo $katsayi['kategori_ad']; ?></td>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="kategori-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="cokkategori.php"> <i class="fas fa-layer-group fa-2x text-gray-300"></a></i>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="aylik.php">1 ay içinde en çok siparis verilen</a></div>
					  <td><?php echo $ay['urun_ad']; ?></td>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="ay-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="aylik.php"> <i class="fas fa-calendar-plus fa-2x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="satilmayanurun.php">Hiç Satılmayan Ürünlerin Sayısı </a></div>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="satilmayan-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="satilmayanurun.php"> <i class="fas fa-ban fa-2x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="musyok.php">Alışveriş Yapmayan Müşteri sayısı </a></div>
					  <div class="h5 mb-0 font-weight-bold text-gray-600"><div id="musyok-sayi"></div></div>

                    </div>
                    <div class="col-auto">
                     <a href="musyok.php"> <i class="fas fa-user-slash fa-2x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="puan.php">Değerlendirmesi En yüksek ürün </a></div>
				
					  <td><?php echo $deger['urun_ad']; ?></td>
					  

                    </div>
                    <div class="col-auto">
                     <a href="puan.php"> <i class="fas fa-hand-point-up fa-2x text-gray-300"></a></i>
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
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1"><a href="cinsiyet.php">En çok alışveriş yapan cinsiyet </a></div>
					 
					  <td><?php echo $cinsiyet['musteri_cinsiyet']; ?></td>
					  

                    </div>
                    <div class="col-auto">
                     <a href="cinsiyet.php"> <i class="fas fa-venus-mars fa-2x text-gray-300"></a></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			

        
          </div>
		  
		  
		  

<!-- SELECT  SUM(siparis.siparis_adet*urunler.urun_fiyat)AS total FROM siparis,urunler WHERE urunler.urun_id = siparis.urun_id AND siparis.siparis_tarih BETWEEN '2022-01-01' AND '2022-12-31' -->		  

		  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2"> 2022 Yılının Aylara Göre Geliri </h6>
                <h6 class="m-0 font-weight-bold text-primary float-right mt-2"><td>2022 Yılının Geliri: <font color="red"><?php echo $yil['total']; ?></font></td> </h6>
                

            </div>		  
		  
		  
	  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ay', 'Gelir'],
          ['Ocak',  0],
          ['Şubat',  0],
          ['Mart',  350],
		  ['Nisan',  0],
          ['Mayıs',  310],
          ['Haziran',  1034],
		  ['Temmuz',  156],
          ['Ağustos',  196],
          ['Eylül',  853],
		  ['Ekim',  2225],
          ['Kasım',  5467],
          ['Aralık',  1193]
        ]);

        var options = {
          title: '',
          hAxis: {title: 'Ay',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  
  <body>
  
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
	 
  </body>
  
  </div>
  
  <br>
	  
		  
		  
		  
		  
		<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Kategoriye Göre Ürün Sayısı</h6>

                

            </div>
			


		  

<!-- SELECT kategori.kategori_ad,COUNT(urunler.kategori_id)
FROM kategori,urunler
WHERE kategori.kategori_id = urunler.kategori_id
GROUP BY kategori.kategori_id -->
		  
 <head> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['kategori', 'Ürün Sayısı'],
          ['İlaç',     7],
          ['Krem',      3],
          ['Losyon',  3],
          ['Gıda Takviyesi', 8],
          ['Medikal',    6],
		  ['Sprey',    2],
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: %100; height: 500px;"></div>
  </body>
  
  
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
animateValue("urun-sayi", 0, <?php echo $post["adet"]; ?>, 1700);
animateValue("musteri-sayi", 0, <?php echo $musteri["adet"]; ?>, 1700);
animateValue("kategori-sayi", 0, <?php echo $katsayi["adet"]; ?>, 1700);
animateValue("ay-sayi", 0, <?php echo $ay["adet"]; ?>, 1700);
animateValue("satilmayan-sayi", 0, <?php echo $satisyok["adet"]; ?>, 1700);
animateValue("musyok-sayi", 0, <?php echo $musyok["adet"]; ?>, 1700);


//animateValue("ziyaretci-sayi", 0, 0, 1700);

</script>
<?php include'footer.php'; ?>