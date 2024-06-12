
<?php  
session_start();
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
  }
   include_once 'functions.php'; 
    
   $berita = query("SELECT * FROM berita"); 
   $i = 1; 

if( isset($_POST["cari"]) ) { 
         $berita = cari($_POST["keyword"]); 
 }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/styleq.css">
    <?php 
    include '../asset/in/css.php'
    ?>
    <title>MonHealth Admin </title>
</head>
<style>
  table {
  width: 90%;
  margin-top: 20px;
  
}
.pol{
margin: auto;
  padding:20px 20px 20px 20px;
  border-radius: 22px;
  border: 2px solid black;
  width: 95%;
}
.pil{
  border-radius: 10px;
}

th{
  border:1px solid black  
}
tr{
  max-width:10px;
  border:1px solid black;
}
td{
  border:1px solid black;
}
button{
  margin-top: 10px;
}

</style>
    <body>
    <div class="awal">
    <nav style="background-color:#ff5bae;">
        <div class="container nav-conta">
        <a href="" class="logo">MonHealth Admin</a>
          <ul class="navlink">
<li><a href="../registrasi.php"class="btn btn-primary" style="color:white; text-decoration:none;"><strong>Register</strong></a></li>
<li><a href="../logout.php"class="btn btn-warning" style="color:white; text-decoration:none;"><strong>Logout</strong></a></li>            
          </ul>

        </div>
    </nav>
    </div>
    <br>
    <br>
 
<div class="pol">
  <h1 style="color:#ff5bae;"><strong>Form Data Berita</strong></h1>
  <br>
  <div style="display: grid; grid-template-columns:1fr 1fr;" class="col-auto">
  <a href="tambah.php"class="btn btn-primary" style="color:white; text-decoration:none;"><strong>Tambah</strong></a>
<form style="width:60%; margin-left:17rem;" class="d-flex" role="search" action="" method="post">
        <input style="border:1px solid black;" name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button style="margin-top:-2px" class="btn btn-success" type="submit" name="cari"><strong>Search</strong></button>
      </form>

  </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:10px;">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Isi</th>
      <th scope="col">Link</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach ( $berita as $row ) : ?> 
<!------------------------------ Form Tambah Data -------------------------------->
  <tbody class="table-group-divider">
    <tr>
      <td scope="row" ><?= $i; ?></td>
      <td><?= $row["judul"]; ?></td>
      <td><?= $row["isi"]; ?></td>
      <td><?= $row["link"]; ?></td> 
      <td style="width:20%"><center><img style="width:70%;" src="img/<?= $row["gambar"]; ?>" alt="<?= $row["gambar"]; ?>"></center></td> 
      <td style="width:12%;"><a href="ubah.php?id=<?= $row["id"];?>"class="btn btn-warning" style="color: white; font-weight: bold; text-decoration: none;" >Edit</a><a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('anda yakin?')"class="btn btn-danger" style="margin-top :15px; color: white; font-weight: bold; text-decoration: none;" >Hapus</a></td>
    </tr>
    <?php $i++; ?> 
<?php endforeach; ?> 
   </tbody>
  </table> 
</div>
<!------------------------------ Mddal Tambah Data -------------------------------->
 
<!------------------------------ Modal Edit Data ------------------------------->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
