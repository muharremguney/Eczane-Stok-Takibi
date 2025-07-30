<?php include 'header.php'; ?>

   <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Müşteri <?php if (isset($_GET['id'])):
            $sorgu = mysqli_fetch_array(mysqli_query($conn,"select * from musteri where musteri_id=".$_GET['id']));

             ?>
         Güncelleme
       <?php else: ?>Ekleme <?php endif ?></h6>
       </div>

       <div class="card-body">
<form action="islem.php" method="POST">

  

          <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Ad:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_ad" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_ad"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  
	       <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Soyad:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_soyad" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_soyad"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  
	   <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Doğum Tarihi:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_yas" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_yas"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Telefon:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_telefon" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_telefon"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Adres:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_adres" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_adres"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Cinsiyet:</label>
          <div class="col-sm-5">

      <input type="text" name="musteri_cinsiyet" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["musteri_cinsiyet"].'"' ?> class="form-control">
      </div>
      </div>
	  
	  
	  
	  
	  

    
            

      <div class="form-group row justify-content-center">
        
            <div class="col-sm-5">
        <?php if (isset($_GET['id'])): ?>
            <input type="submit" value="Güncelle" name="musteri-guncelle" class="form-control btn btn-info">
                <input type="hidden" name="musteri_id" value="<?php echo $_GET['id']; ?>"
              <?php else: ?>
            <input type="submit" value="Ekle" name="musteri-ekle" class="form-control btn btn-success">
          <?php endif ?>
            </div>
        </div>


  	</form>
       </div>
    </div>
	
	
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Müşteriler</h6>

                <a href="soru-ekle.php" class="btn btn-primary btn-sm float-right">

                  <i class="fas fa-fw fa-folder"></i> Müşteri Ekle

                </a>

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Ad</th>

                      <th>Soyad</th>
					  
					  <th>Dogum Tarihi</th>

                      <th>Telefon</th>

                      <th>Adres</th>
                      
					  <th>Cinsiyet</th>
                           

                      <th>Düzenle</th>

                       <th>Sil</th>

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT * from musteri"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                      <td><?php echo $oku['musteri_id'];  ?></td>

                      <td><?php echo $oku['musteri_ad']; ?></td>

                      <td><?php echo $oku['musteri_soyad']; ?></td>
					  
					  <td><?php echo $oku['musteri_yas'];  ?></td>

                      <td><?php echo $oku['musteri_telefon']; ?></td>

                      <td><?php echo $oku['musteri_adres']; ?></td>
					  
					  <td><?php echo $oku['musteri_cinsiyet']; ?></td>
                      
                        

                       <td><a href="soru-ekle.php?id=<?php echo $oku['musteri_id'] ?>" class="btn btn-sm btn-info">Düzenle</a></td>

                       <td>  <a href="musterisil.php?id=<?php echo $oku['musteri_id'] ?>" class="btn btn-sm btn-danger"  >Sil</a></td> 

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>