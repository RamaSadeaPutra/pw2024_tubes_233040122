<?php    

session_start();
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
  }

   include_once 'functions.php';
 $id = $_GET["id"]; 
 $berita = query("SELECT * FROM berita WHERE id = $id"); 
 $brt = $berita[0]; 
  
 if( isset($_POST["ubah"]) ) { 
         if( ubah($_POST) > 0 ) { 
                 echo "<script> 
                                 alert('data berhasil diubah!'); 
                                 document.location.href = 'index.php'; 
                          </script>"; 
         } else { 
                 echo "<script> 
                                 alert('data gagal diubah!'); 
                                 document.location.href = 'index.php'; 
                          </script>"; 
         } 
 } 

 ?> 
 <?php 
   include '../asset/in/css.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body{
    background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(../asset/img/b1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }
    .box{
        padding: 20px;
        background-color: white;
        width: 25%;
        margin-top: 5%;
        margin-left: 34%;
        padding-bottom: 3rem;
        padding-top: 3rem;
        border-radius: 20px
    }
    h2{
        text-align: center;
        font-weight: bold;
    }
    button{
        width: 22%;
        font-size: 12px;
        background-color: #ff5bae;
        padding: 10px;
        border-radius: 10px;
        color: white;
        transition: .3s;
    }
    button:hover{
      background-color: transparent;
      color:black;
      border: 1px solid black;
    }
    a:hover{
      color:black;
    }
</style>
<body>
<div class="box"> 
    <h2>Tambah Data</h2>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $brt["id"]; ?>"> 
    <input type="hidden" name="gambarLama" value="<?php echo $brt["gambar"]; ?>"> 
  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input class="form-control" value="<?php echo $brt["judul"]; ?>" class="wide text input" type="text" name="judul" placeholder="Isi Judul" include_onced autocomplete="off" /> 
  </div>
  <div class="mb-3">
    <label for="isi" class="form-label">Deskripsi</label>
    <input class="form-control" value="<?php echo $brt["isi"]; ?>" class="wide text input" type="text" name="isi" placeholder="Isi Deskripsi" include_onced autocomplete="off" /> 
  </div>
  <div class="mb-3">
    <label for="link" class="form-label">Link</label>
    <input class="form-control" value="<?php echo $brt["link"]; ?>" class="wide text input" type="text" name="link" placeholder="Isi Link" include_onced autocomplete="off" /> 
  </div>
  <div class="mb-3">
  <label for="gambar" class="form-label">Pilih Gambar</label>
  <img src="./img/<?php $brt['gambar'];?>" alt="">
  <input class="form-control" class="wide text input" type="file" name="gambar" placeholder="Gambar" include_onced autocomplete="off" /> 
</div>
  <div class="form-group">
  <div class="modal-footer">
        <a class="kl" href="index.php" style="color:white; font-weight:bold; text-decoration:none;">Kembali</a>
        <button type="submit"  value="Ubah" name="ubah" ><Strong>Ubah</Strong></button>
      </div>
</form>
</div>
</body>
</html>


