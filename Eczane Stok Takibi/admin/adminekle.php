 <?php include 'header.php'; ?>

   <div class="card shadow mb-4">
       <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin <?php if (isset($_GET['id'])):
            $sorgu = mysqli_fetch_array(mysqli_query($conn,"select * from user where user_id=".$_GET['id']));

             ?>
         >Güncelleme
       <?php else: ?>Ekleme <?php endif ?></h6>
       </div>

       <div class="card-body">
<form action="islem.php" method="POST">

      		  <div class="form-group row justify-content-center">
        
          <div class="col-sm-5">

      <input type="text" name="user_kadi" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["user_kadi"].'"' ?> class="form-control" placeholder="Kullancı Adı Giriniz">
      </div>
      </div>
	  
	   <div class="form-group row justify-content-center">
        
          <div class="col-sm-5">

      <input type="password" name="user_sifre" <?php if (isset($_GET["id"])) echo 'value="'.$sorgu["user_sifre"].'"' ?> class="form-control" placeholder="Şifre Giriniz">
      </div>
      </div>


    
            

   <div class="form-group row justify-content-center">
        
            <div class="col-sm-5">
        <?php if (isset($_GET['id'])): ?>
                
              <?php else: ?>
            <input type="submit" value="Ekle" name="admin-ekle" class="form-control btn btn-success">
          <?php endif ?>
            </div>
        </div>


  	</form>
       </div>
    </div>



<?php include 'footer.php'; ?>