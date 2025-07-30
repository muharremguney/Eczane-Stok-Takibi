<?php include 'header.php'; ?>

   <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sipariş <?php if (isset($_GET['id'])):
            $sorgu = mysqli_fetch_array(mysqli_query($conn,"select * from siparis where musteri_id=".$_GET['id']));

             ?>
         Güncelleme
       <?php else: ?>Ekleme <?php endif ?></h6>
       </div>

       <div class="card-body">
<form action="islem.php" method="POST">


            <div class="form-group row justify-content-center">
   			<label  class="col-sm-2 col-form-label">Müşteri:</label>
   				<div class="col-sm-5">
            <select name="musteri_id" class="form-control" required="">
              <option value="">Seçiniz...</option>
              <?php  $kategoriSorgusu = mysqli_query($conn,"SELECT musteri.musteri_id, CONCAT(musteri.musteri_ad, ' ', musteri.musteri_soyad)as isim, musteri.musteri_yas,musteri.musteri_telefon,musteri.musteri_adres,musteri.musteri_cinsiyet FROM musteri where musteri_id");
			  
			  
			  
              while ($oku = mysqli_fetch_array($kategoriSorgusu)) { ?>
              <option <?php if(isset($_GET['id'])){echo $oku['musteri_id'] == $sorgu['musteri_id'] ? 'selected' : '';} ?> value="<?php echo $oku['musteri_id']; ?>"><?php echo $oku['isim']; ?></option>
            <?php } ?>
            </select>
            
     				
   				</div>
  			</div>
			
			
			
			<div class="form-group row justify-content-center">
   			<label  class="col-sm-2 col-form-label">Ürün:</label>
   				<div class="col-sm-5">
            <select name="urun_id" class="form-control" required="">
              <option value="">Seçiniz...</option>
              <?php  $kategoriSorgusu = mysqli_query($conn,"SELECT * from urunler where urun_id");
			  
			  
			  
              while ($oku = mysqli_fetch_array($kategoriSorgusu)) { ?>
              <option <?php if(isset($_GET['id'])){echo $oku['urun_id'] == $sorgu['urun_id'] ? 'selected' : '';} ?> value="<?php echo $oku['urun_id']; ?>"><?php echo $oku['urun_ad']; ?></option>
            <?php } ?>
            </select>
            
     				
   				</div>
  			</div>


          <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Sipariş Adet:</label>
          <div class="col-sm-5">

      <input type="text"  placeholder="Sipariş adeti girin" name="siparis_adet" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["siparis_adet"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  
	
	
          <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Sipariş Tarhi:</label>
          <div class="col-sm-5">

      <input type="date" name="siparis_tarih" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["siparis_tarih"].'"' ?> class="form-control" aria-describedby="basic-addon1" >
      </div>
      </div>
	  
	  
	  
      <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label" >Sipariş Deger:</label>
          <div class="col-sm-5">

      <input type="text" placeholder="1 ile 5 arası deger girin"  name="siparis_deger" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["siparis_deger"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  

	


	
	    	
	
	

	
    
    

    
 
    
    
            

      <div class="form-group row justify-content-center">
        
            <div class="col-sm-5">
        <?php if (isset($_GET['id'])): ?>
                <input type="hidden" name="musteri-id" value="<?php echo $_GET['id']; ?>"
              <?php else: ?>
            <input type="submit" value="Ekle" name="siparis-ekle" class="form-control btn btn-success">
          <?php endif ?>
            </div>
        </div>


  	</form>
       </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
			
			
			
			
			
			
			
			
			
			
			

	
	
<?php include 'footer.php'; ?>