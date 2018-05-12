<?php
	include('login.php'); 
    if (empty($_SESSION['username'])) {
        header('location: login.html');
    }

?>

<!--<h1 position="center">HALAMAN UTAMA</h1>

<a href="index.php?logout='1'">Logout</a>
-->


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  </head>

  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img id='image-logo' src="images/logo/BoxRate.png">
        BoxRate : <a class="user-login" style="color: white;"><?php if (isset($_SESSION["store"])): ?>
                  <?php  echo $_SESSION['store'];?>
                   <?php endif ?>

                <?php if (isset($_SESSION["username"]) and $_SESSION['name']==NULL): ?>
                  <?php  echo $_SESSION['username'];?>
                   <?php endif ?></a> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="navbar-item">
              <label for="akun">
                <img class="nav-link" id="image-logo" src="images/user.png">
              </label>
              <a id="akun" class="nav-link" href="#">Akun</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="index.php?logout='1'">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


     <header id="slide-color">
       <div id="slide">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img id="image-home" class="d-block img-fluid" src="images/diskon/minuman-01.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img id="image-home" class="d-block img-fluid" src="images/diskon/minuman-02.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img id="image-home" class="d-block img-fluid" src="images/diskon/minuman-03.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
     </header>

     <div class="container">
       <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Menu</h4>
            <div class="card-body">
              <p class="card-text">Atur Menumu disini Dan Buat Pelanggan Menikamatinya</p>
            </div>
            <div class="card-footer">
              <a href="menu-makanan.php" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Rating</h4>
            <div class="card-body">
              <p class="card-text">Buat Pelanggan Tau Makanan dan Minuman Populer Pekan Ini</p>
            </div>
            <div class="card-footer">
              <a href="rating-makanan.php" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Isi Rating</h4>
            <div class="card-body">
              <p class="card-text">Ayo Tentukan Makanan dan Minuman Kesukaan Pelanggan Disini !! <br>Kami akan menghitungnya untukmu</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
         <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Diskon</h4>
            <div class="card-body">
              <p class="card-text">Ayo Lihat Promo Yang Menarik Disini</p>
            </div>
            <div class="card-footer">
              <a href="menu-makanan.php" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
         <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Global Rating</h4>
            <div class="card-body">
              <p class="card-text">Lihat Semua Rating Yang Terdaftar</p>
            </div>
            <div class="card-footer">
              <a href="menu-makanan.php" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
         <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Pengaturan</h4>
            <div class="card-body">
              <p class="card-text">Pengaturan dari Akun Sampai Tampilan Mu</p>
            </div>
            <div class="card-footer">
              <a href="menu-makanan.php" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
      </div>
     </div>


    <!-- Footer -->
   <div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">Contact  BoxRate</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Gedung Lab Terpadu Universitas Syiah Kuala &amp; Banda Aceh, 23111
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +62 813 5413 2223</li>
        <li><i class="fa fa-envelope-o"></i> boxrate@hotmail.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Tentang Boxrate</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <h2 class="nospace font-x1"><a href="#">Sejarah BoxRate</a></h2>
            <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 26<sup>th</sup> maret 2018</time>
            <p class="nospace">BoxRate berdiri sejak bulan Maret tahun 2018 yang bertempat di universitas syiah kuala, banda aceh.&hellip;</p>
          </article>
        </li>
        <li>
          <article>
            <h2 class="nospace font-x1"><a href="#">Mengenai Boxrate</a></h2>
            <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2018</time>
            <p class="nospace">telah diresmikan kepengurusan Boxrate pada bulan april 2018 untuk keperluan tugas Matakuliah Rekayasa perangkat Lunak&hellip;</p>
          </article>
        </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Untuk BoxRate Kedepan</h6>
      <p class="nospace btmspace-30">Kirimkan saran dan komentar anda untuk BoxRate</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <input class="btmspace-15" type="text" value="" placeholder="komentar">
		  <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">BoxRate</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
