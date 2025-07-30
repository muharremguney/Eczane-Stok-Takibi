<?php include 'header.php'; ?>

   <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori <?php if (isset($_GET['id'])):
            $sorgu = mysqli_fetch_array(mysqli_query($conn,"select * from kategori where kategori_id=".$_GET['id']));

             ?>
         >Güncelleme
       <?php else: ?>Ekleme <?php endif ?></h6>
       </div>

       <div class="card-body">
<form action="islem.php" method="POST">

      		<div class="form-group row justify-content-center">
   			
   				<div class="col-sm-5">
				
            <textarea name="kategori-adi" class="form-control" placeholder="Kategori Adı Giriniz"><?php echo isset($_GET['id']) ? $sorgu['kategori_ad'] : ''; ?></textarea>
     				
   				</div>
  			</div>


    
            

   <div class="form-group row justify-content-center">
        
            <div class="col-sm-5">
        <?php if (isset($_GET['id'])): ?>
            <input type="submit" value="Güncelle" name="kategori-guncelle" class="form-control btn btn-info">
                <input type="hidden" name="kategori-id" value="<?php echo $_GET['id']; ?>"
              <?php else: ?>
            <input type="submit" value="Ekle" name="kategori-ekle" class="form-control btn btn-success">
          <?php endif ?>
            </div>
        </div>


  	</form>
       </div>
    </div>
<div class="card shadow mb-4">

              <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary float-left mt-2">Mevcut Kategoriler</h6>

                <a href="dersler.php" class="btn btn-primary btn-sm float-right">

                  <i class="fas fa-fw fa-folder"></i> Kategori Ekle

                </a>

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Adı</th>

                      <th>Düzenle</th>

                       <th>Sil</th>

                    </tr>

                  </thead>



                  <tbody>

                    <tr>

                      <?php $sorgu = mysqli_query($conn, "select * from kategori"); while($oku = mysqli_fetch_array($sorgu)){ ?>

                      <td><?php echo $oku['kategori_id']; ?></td>

                      <td><?php echo $oku['kategori_ad']; ?></td>

                       <td><a href="dersler.php?id=<?php echo $oku['kategori_id'] ?>" class="btn btn-sm btn-info">Düzenle</a></td>
					   <td>  <a href="kategorisil.php?id=<?php echo $oku['kategori_id'] ?>" class="btn btn-sm btn-danger"  >Sil</a></td> 
					   
</td>

                    </tr>

                  <?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>




<?php include 'footer.php'; ?>