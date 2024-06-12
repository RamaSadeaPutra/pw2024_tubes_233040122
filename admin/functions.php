<?php
 function koneksi(){ 
  $conn = mysqli_connect("localhost:3307", "root", "") or die("Koneksi ke DB gagal!"); 
  mysqli_select_db($conn, "pw2024_tubes_233040122") or die("Database salah!"); 
  return $conn; 
} 

function query($string) { 
  $conn = koneksi(); 
  $results = mysqli_query($conn, $string); 
  $rows = array(); 
  while( $row = mysqli_fetch_assoc($results) ) { 
          $rows[] = $row;
  } 
  return $rows; 
} 
  function tambah($data) { 
    $conn = koneksi(); 
    $judul = htmlspecialchars($data["judul"]); 
    $isi = htmlspecialchars($data["isi"]); 
    $link = htmlspecialchars($data["link"]); 
    $gambar =upload();
    if(!$gambar){
      return false;
    }

    $query = "INSERT INTO berita 
                            VALUES ('', '$judul','$isi', '$link', '$gambar')"; 

    mysqli_query($conn, $query); 

    return mysqli_affected_rows($conn); 
}

function upload(){
$namaFile= $_FILES['gambar']['name'];
$ukuranFile= $_FILES['gambar']['size'];
$error = $_FILES['gambar']['error'];
$tmpName =$_FILES['gambar']['tmp_name'];

if ($error === 4){
  echo "<script>
  alert('pilih gambar telebih dahulu')
  </script>";

  return false;
}

$ektensiGambarValid =['jpg','png','jpeg','html'];
$ektensiGambar = explode('.', $namaFile);
$ektensiGambar = strtolower(end($ektensiGambar));
if(!in_array($ektensiGambar,$ektensiGambarValid)){
    echo "<script>
    alert('Yang Di upload Bukan Gambar')
    </script>";
  
    return false;
  

}
if( $ukuranFile >5000000){
  echo "<script>
  alert('Ukurann Terlalu Besar')
  </script>";

  return false;
  
}



move_uploaded_file($tmpName,'img/' .$namaFile);

return $namaFile;

}

function cari($keyword) { 
  $query = "SELECT * FROM berita
                          WHERE 
                  judul LIKE '%$keyword%' OR 
                    isi LIKE '%$keyword%'
                  "; 
  return query($query); 
}


function hapus($id) { 
  $conn = koneksi(); 

  mysqli_query($conn, "DELETE FROM berita WHERE id = $id"); 

  return mysqli_affected_rows($conn); 
} 

function ubah($data) { 
  $conn = koneksi(); 

  $id = $data["id"]; 
  $judul = htmlspecialchars($data["judul"]); 
  $isi = htmlspecialchars($data["isi"]); 
  $link = htmlspecialchars($data["link"]); 
  $gambarLama = htmlspecialchars($data["gambarLama"]); 

  if($_FILES ['gambar']['error'] === 4){
    $gambar = $gambarLama;
  }else{
    $gambar = upload();
  }
  $query = "UPDATE berita SET 
                          judul = '$judul',  
                          isi = '$isi',  
                          link = '$link',  
                          gambar = '$gambar' 
                    WHERE id = $id"; 

  mysqli_query($conn, $query); 

  return mysqli_affected_rows($conn); 
} 

function registrasi($data) { 
  $conn = koneksi();
  $username = strtolower(stripslashes($data["username"])); 
  $password = mysqli_real_escape_string($conn, $data["password"]); 
  $password2 = mysqli_real_escape_string($conn, $data["password2"]); 

  // cek username sudah ada atau belum 
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'"); 

  if( mysqli_fetch_assoc($result) ) { 
          echo "<script> 
                          alert('username sudah terdaftar!') 
                </script>"; 
          return false; 
  } 


  // cek konfirmasi password 
  if( $password !== $password2 ) { 
          echo "<script> 
                          alert('konfirmasi password tidak sesuai!'); 
                </script>"; 
          return false; 
  } 

  // enkripsi password 

  // tambahkan userbaru ke database 
  mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')"); 

  return mysqli_affected_rows($conn); 


}
?>


