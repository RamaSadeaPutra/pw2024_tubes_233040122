<?php 

session_start();
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
  }

include_once 'functions.php'; 
  
if( hapus($_GET["id"]) > 0 ) { 
        echo "<script> 
                        alert('data berhasil dihapus!'); 
                        document.location.href = 'index.php'; 
                 </script>"; 
} else { 
        echo "<script> 
                        alert('data gagal dihapus!'); 
                        document.location.href = 'index.php'; 
                 </script>"; 
} 
?>