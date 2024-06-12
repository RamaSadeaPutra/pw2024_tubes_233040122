<?php 
   include './asset/in/css.php';
   include_once './admin/functions.php'; 
    
   $berita = query("SELECT * FROM berita"); 
   $i = 1; 

if( isset($_POST["cari"]) ) { 
         $berita = cari($_POST["keyword"]); 
 }




?>
<style>
    .col{
        width: 27%;
    }
    #cont{
        justify-content: center;
        gap: 5%;
    }
   .bty{
    background-color: #ff5bae;
    font-weight: bold;
    color: white;
    text-decoration: none;
    font-size: 14px;
    padding:8px;
    border-radius: 10px;
    border: 1px solid black;
   } 
   .bty:hover{
    background-color: transparent;
   }
   .btns{

   }
   
</style>


<div id="cont" class="row row-cols-1 row-cols-md-3 g-4">
    
<?php foreach ( $berita as $row ) : ?> 
  <div class="col">
    <div class="card h-100">
    <img src="./admin/img/<?= $row ['gambar'];?>" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title"><strong><?= $row["judul"]; ?></strong></h5>
      <p class="card-text"><?= $row["isi"]; ?></p>
      </div>
      <div style="background-color: white; border:none; padding-bottom: 30px;"  class="card-footer">
      <a class="bty" href="<?= $row["link"]; ?>" style="text-decoration:none;">Selengkapnya</a>
      </div>
    </div>
  </div>
  <?php $i++; ?> 
  <?php endforeach; ?> 
</div>
</div>