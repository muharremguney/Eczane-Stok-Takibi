<?php include 'header.php'; ?>

  
<div class="card shadow mb-">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2"> Tüm Siparişler</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="%100" cellspacing="0">

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
WHERE musteri.musteri_id = siparis.musteri_id AND siparis.urun_id = urunler.urun_id  
ORDER BY siparis.siparis_tarih DESC"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

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
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			



        
          </div>




<?php include 'footer.php'; ?>