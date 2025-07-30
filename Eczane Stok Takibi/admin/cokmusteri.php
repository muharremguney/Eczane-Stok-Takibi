<?php include 'header.php'; ?>

  
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Müşteri Sipariş Adetleri</h6>

                

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      

                      <th>#</th>

                      <th>Müşteri Adı</th>
					  
					  <th>Sipariş Adet</th>

                      
                      
                           

                    



                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT musteri.musteri_id, CONCAT(musteri.musteri_ad, ' ',musteri.musteri_soyad) as isim, COUNT(siparis.musteri_id) as adet
FROM musteri,siparis
WHERE musteri.musteri_id=siparis.musteri_id
GROUP BY musteri.musteri_id"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                   

                      <td><?php echo $oku['musteri_id']; ?></td>

                      <td><?php echo $oku['isim']; ?></td>
					  
					  <td><?php echo $oku['adet'];  ?></td>

                      
					  
				
					  
					  
                      
                        

  

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>