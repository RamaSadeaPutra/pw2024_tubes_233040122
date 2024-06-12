
<?php
session_start();


if(isset($_SESSION["login"])){
    header("Location: admin/index.php");
}
 
// Koneksi ke database
$host = 'localhost:3307';
$dbname = 'pw2024_tubes_233040122';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["login"] = true;
        header("Location: admin/index.php");
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>

  <?php 
  require 'asset/in/css.php';
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
    <h2>Login <br> MonHealth</h2>
    <br>
  <div class="mb-3">
  <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username">
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
  </div>
  <button type="submit" name="Login"><strong>Login</strong></button>
</form>
</div>
</body>
</html>

  
  
  
  
  
  
  
 </body> 
 </html>