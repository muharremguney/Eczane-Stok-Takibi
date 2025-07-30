 <?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Kategoriye Göre Sipariş Sayısı</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>
					  
					  <th>Kategori Adı</th>

                      <th>Sipariş Sayısı</th>
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT kategori.kategori_id ,kategori.kategori_ad, COUNT(kategori.kategori_ad) as adet
FROM musteri,siparis,urunler,kategori 
WHERE musteri.musteri_id = siparis.musteri_id AND siparis.urun_id = urunler.urun_id AND urunler.kategori_id = kategori.kategori_id
GROUP BY kategori.kategori_id"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['kategori_id']; ?></td>

                      <td><?php echo $oku['kategori_ad']; ?></td>

                      <td><?php echo $oku['adet']; ?></td>
					  
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>