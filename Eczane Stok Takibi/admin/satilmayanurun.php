  <?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Satışı Olmayan Ürünler</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>
					  
					  <th>Ürün Adı</th>
					  
					  <th>Ürün Fiyat</th>
					  
					  <th>Ürün Stok</th>
					  
					  <th>Kategori Adı</th>

                     
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "select urunler.urun_id,urunler.urun_ad, urunler.urun_fiyat, urunler.urun_stok, kategori.kategori_ad
from urunler, kategori
where urunler.kategori_id= kategori.kategori_id AND not exists (select * from siparis where siparis.urun_id = urunler.urun_id)"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['urun_id']; ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>
					  
					  <td><?php echo $oku['urun_fiyat']; ?></td>

                      <td><?php echo $oku['urun_stok']; ?></td>
					  
					  <td><?php echo $oku['kategori_ad']; ?></td>

                      

                     
					  
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>