<?php include 'header.php'; ?>

   <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ürün <?php if (isset($_GET['id'])):
            $sorgu = mysqli_fetch_array(mysqli_query($conn,"select * from urunler where urun_id=".$_GET['id']));

             ?>
         Güncelleme
       <?php else: ?>Ekleme <?php endif ?></h6>
       </div>

       <div class="card-body">
<form action="islem.php" method="POST">

  

          <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Ürün Ad:</label>
          <div class="col-sm-5">

      <input type="text" name="urun-adi" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["urun_ad"].'"' ?> class="form-control">
      </div>
      </div>
      
      <div class="form-group row justify-content-center">
         <label  class="col-sm-2 col-form-label">Ürün Fiyat(tl):</label>

    <div class="col-sm-5">

      <input type="text" name="urun-fiyat" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["urun_fiyat"].'"' ?> class="form-control" >
   </div>
    </div>
	
	
          <div class="form-group row justify-content-center">
          <label  class="col-sm-2 col-form-label">Ürün SKT:</label>
          <div class="col-sm-5">

      <input type="date" name="urun-skt" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["urun_skt"].'"' ?> class="form-control" aria-describedby="basic-addon1" >
      </div>
      </div>
      
      <div class="form-group row justify-content-center">
         <label  class="col-sm-2 col-form-label">Ürün Stok:</label>

    <div class="col-sm-5">

      <input type="text" name="urun-stok" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["urun_stok"].'"' ?> class="form-control">
   </div>
    </div>
	

	
	    	<div class="form-group row justify-content-center">
   			<label  class="col-sm-2 col-form-label">Ürün Kategori:</label>
   				<div class="col-sm-5">
            <select name="kategori-id" class="form-control" required="">
              <option value="">Seçiniz...</option>
              <?php  $kategoriSorgusu = mysqli_query($conn,"select * from kategori where kategori_id");
			  
			  
			  
              while ($oku = mysqli_fetch_array($kategoriSorgusu)) { ?>
              <option <?php if(isset($_GET['id'])){echo $oku['kategori_id'] == $sorgu['kategori_id'] ? 'selected' : '';} ?> value="<?php echo $oku['kategori_id']; ?>"><?php echo $oku['kategori_ad']; ?></option>
            <?php } ?>
            </select>
            
     				
   				</div>
  			</div>
	
	

	
    
    

    
 
    
    
            

      <div class="form-group row justify-content-center">
        
            <div class="col-sm-5">
        <?php if (isset($_GET['id'])): ?>
            <input type="submit" value="Güncelle" name="urun-guncelle" class="form-control btn btn-info">
                <input type="hidden" name="urun-id" value="<?php echo $_GET['id']; ?>"
              <?php else: ?>
            <input type="submit" value="Ekle" name="urun-ekle" class="form-control btn btn-success">
          <?php endif ?>
            </div>
        </div>


  	</form>
       </div>
    </div>
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Mevcut Ürünler</h6>

                <a href="konular.php" class="btn btn-primary btn-sm float-right">

                  <i class="fas fa-fw fa-folder"></i> Ürün Ekle

                </a>

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Adı</th>

                      <th>Fiyat</th>
					  
					  <th>SKT</th>

                      <th>Stok(Adet)</th>

                      <th>Kategori</th>
                      
                           

                      <th>Düzenle</th>

                       <th>Sil</th>

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "SELECT urunler.urun_id,urunler.urun_ad,urunler.urun_fiyat,urunler.urun_skt,urunler.urun_stok,kategori.kategori_ad FROM urunler,kategori
WHERE urunler.kategori_id = kategori.kategori_id"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                      <td><?php echo $oku['urun_id'];  ?></td>

                      <td><?php echo $oku['urun_ad']; ?></td>

                      <td><?php echo $oku['urun_fiyat']." "."TL"; ?></td>
					  
					  <td><?php echo $oku['urun_skt'];  ?></td>

                      <td><?php echo $oku['urun_stok']; ?></td>

                      <td><?php echo $oku['kategori_ad']; ?></td>
                      
                        

                       <td><a href="konular.php?id=<?php echo $oku['urun_id'] ?>" class="btn btn-sm btn-info">Düzenle</a></td>

                       <td>  <a href="urunsil.php?id=<?php echo $oku['urun_id'] ?>" class="btn btn-sm btn-danger"  >Sil</a></td> 

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>