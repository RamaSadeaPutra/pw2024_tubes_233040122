<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/styleq.css">
    <title>Document</title>
</head>
<style>
 
</style>
<body>
    <?php 


        // include './asset/in/css.php';
    include './asset/in/nav.php';
    include './asset/in/header1.php';    


    ?>
    
    <br>
      <section id="about" style="padding-top:4rem;">
        <p class="heading-p">Get To Know More </p>
        <h1 class="heading" >About</h1>
        <div style="margin-top:-5rem;" class="container about-container">
           
            <div class="about-right" style="width:170%">
            <h1><strong>MonHealth</strong></h1>
            <p>MonHealth adalah website yang menyediakan berita yang relevan dan bermanfaat tentang topik-topik terkait kesehatan.<br>Tujuan utamanya adalah untuk memberikan berita yang dapat dipercaya dan mendidik pengguna agar dapat membuat keputusan yang lebih baik tentang kesehatan.<br>MonHealth dibuat oleh Ramon dikarenakan tugas Mata Kuliah Pemograman Web,Pada tahun 2024.</p>
            </div>
            <div class="about-left" style="box-shadow:none; width: 90%; margin-left:190px;">
                <img src="./admin/img/1718101298311.png" alt="">
            </div>
        </div>
    </section>
    <?php  include './asset/in/header2.php';?>
    <br>
    <p   id="lol" class="heading-p" style="color:white;">News Of </p>
      <p  class="heading-p">News Of </p>
      <h1 class="heading" >Health</h1>
    <?php include './asset/in/contentcan.php';
    include './asset/in/footer.php';
    ?>
</body>
</html>