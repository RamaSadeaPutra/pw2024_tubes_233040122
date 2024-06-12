<?php 
   include './asset/in/css.php';
?>



<?php 
require'admin/functions.php';
$conn = koneksi();
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
        alert('user baru berhasil ditambahkan')
        </script>";
    }else{
         echo mysqli_error($conn);
    }
}

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
    background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(./asset/img/b1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }
    .box{
        padding: 20px;
        background-color: white;
        width: 25%;
        margin-top: 10%;
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
        width: 100%;
        background-color: #ff5bae;
        padding: 10px;
        border-radius: 30px;
        color: white;
        transition: .3s;
    }
    button:hover{
      background-color: transparent;
      color:black;
      border: 1px solid black;
    }
</style>
<body>
    
<div class="box"> 
<form action="" method="post">
    <h2>Register Admin <br> MonHealth</h2>
    <br>
  <div class="mb-3">
  <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username">
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
  </div>
  <div class="mb-3">
    <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
  </div>
  <button type="submit" name="register"><strong>Daftar</strong></button>
</form>
</div>
</body>
</html>