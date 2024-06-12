
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/stylet.css">
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
        </div>
    </nav>
    </div>
    <br>
    <br>
<center>
<div class="pol">
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="btn btn-primary" style="margin-left:-79rem"><strong>Tambah</strong></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:10px;">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Link</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php $i = 1; ?>
<?php  while( $row =mysqli_fetch_assoc($result)):?>

<!------------------------------ Form Tambah Data -------------------------------->
  <tbody class="table-group-divider">
    <tr>
      <th scope="row" ><?= $i; ?></th>
      <td><?= $row["judul"];?></td>
      <td><?= $row["link"];?></td>
      <td><img src="img/<?= $row["gambar"]?>" width="50"  alt=""></td>
      <td><a href="hapus.php?id<?= $row["id"];?>" data-bs-target="#exampleModal" class="btn btn-warning"></a></td>
    </tr>
     <?php $i++; ?>
<?php endwhile; ?>
   </tbody>
  </table> 
</div>
</center>

<!------------------------------ Mddal Tambah Data -------------------------------->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form action="" method="post">
  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" id="judul" aria-describedby="emailHelp" include_onced>
  </div>
  <div class="mb-3">
    <label for="link" class="form-label">Judul</label>
    <input type="text" name="link" id="link" include_onced>
  </div>
  <div class="mb-3">
  <label for="gambar" class="form-label">Default file input example</label>
  <input class="form-control" name="gambar" type="file" id="gambar">
</div>
  <div class="form-group">
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
      </div>
</form>

      </div>
     
    </div>
    </div>
</div>

<!------------------------------ Modal Edit Data -------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Judul</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Link</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gambar</label><br>
    <label for="myfile">Select a file:</label>
  <input type="file" id="myfile" name="myfile"><br><br>
  </div>
 </form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!------------------------------ Modal Hapus Data -------------------------------->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hapus Data??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






