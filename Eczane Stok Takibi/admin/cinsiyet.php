  <?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Cinsiyete Göre Sipariş Sayısı</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>Cinsiyet</th>
					  
					  <th>Sipariş Sayısı</th>
					  
					  <th>Yüzde</th>
					  
					 

                     
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT musteri.musteri_cinsiyet,COUNT(*)AS siparissayisi ,ROUND((COUNT(*) * 100) / (select count(*) from siparis),1) As adet
FROM urunler,siparis,musteri
WHERE urunler.urun_id = siparis.urun_id AND siparis.musteri_id =musteri.musteri_id
GROUP BY musteri.musteri_cinsiyet"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['musteri_cinsiyet']; ?></td>

                      <td><?php echo $oku['siparissayisi']; ?></td>
					  
					  <td><?php echo $oku['adet']; ?></td>


                      

                     
					  
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>