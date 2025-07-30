  <?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Alışveriş Yapmyan Müşteriler</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>
					  
					  <th>Adı</th>
					  
					  <th>Soyadı</th>
					  
					  <th>Doğum Tarihi</th>
					  
					  <th>Telefon</th>
					  
					  <th>Adres</th>

                     
					  
					  
				

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "select musteri.musteri_id,musteri.musteri_ad,musteri.musteri_soyad,musteri.musteri_yas,musteri.musteri_telefon,musteri.musteri_adres
from musteri where not exists (select * from siparis where siparis.musteri_id = musteri.musteri_id)"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['musteri_id']; ?></td>

                      <td><?php echo $oku['musteri_ad']; ?></td>
					  
					  <td><?php echo $oku['musteri_soyad']; ?></td>

                      <td><?php echo $oku['musteri_yas']; ?></td>
					  
					  <td><?php echo $oku['musteri_telefon']; ?></td>
					  
					  <td><?php echo $oku['musteri_adres']; ?></td>

                      

                     
					  
			
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>