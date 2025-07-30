<?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Ürün Satışları</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>

                      <th>Ürün Adı</th>
					  
					  <th>Satılan Adet</th>

                      <th>Ürün Fiyatı</th>

                      <th>Toplam Kazanç</th>
                      
                           

                    



                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT urunler.urun_id, urunler.urun_ad, SUM(siparis.siparis_adet) as adet, urunler.urun_fiyat, SUM(siparis.siparis_adet) * urun_fiyat as toplam
FROM musteri,siparis,urunler
WHERE musteri.musteri_id=siparis.musteri_id AND siparis.urun_id = urunler.urun_id
GROUP BY urunler.urun_id  
"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['urun_id']; ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>
					  
					  <td><?php echo $oku['adet'];  ?></td>

                      <td><?php echo $oku['urun_fiyat']; ?></td>

                      <td><?php echo $oku['toplam']; ?></td>
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>