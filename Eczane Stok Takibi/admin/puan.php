  <?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Ürün Değerlendirmeleri</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>
					  
					  <th>Ürün Adı</th>
					  
					  <th>Puan</th>
					  
					 

                     
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT urunler.urun_id, urunler.urun_ad, ROUND(AVG(siparis.siparis_deger),1) AS adet
FROM urunler,siparis
WHERE urunler.urun_id=siparis.urun_id
GROUP BY urunler.urun_ad"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['urun_id']; ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>
					  
					  <td><?php echo $oku['adet']; ?></td>


                      

                     
					  
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>