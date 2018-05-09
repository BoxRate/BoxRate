<?php
	include('login.php'); 
    if (empty($_SESSION['username'])) {
        header('location: login.html');
    }

?>

<!--<h1 position="center">HALAMAN UTAMA</h1>

<a href="index.php?logout='1'">Logout</a>
-->
<?php if (isset($_SESSION["name"])): ?>
  <?php  echo $_SESSION['name'];?>
   <?php endif ?>

<?php if (isset($_SESSION["username"]) and $_SESSION['name']==NULL): ?>
  <?php  echo $_SESSION['username'];?>
   <?php endif ?>


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

  </head>

  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img id='image-logo' src="images/logo/BoxRate.png">
        BoxRate : <a class="user-login" style="color: white;"><?php if (isset($_SESSION["name"])): ?>
                  <?php  echo $_SESSION['name'];?>
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
            <li class="nav-item" >
              <a class="nav-link" href="index.php?logout='1'">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


     <header>
       <div>
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
          <div class="card h-50">
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
          <div class="card h-50">
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
          <div class="card h-50">
            <h4 class="card-header">Isi Rating</h4>
            <div class="card-body">
              <p class="card-text">Ayo Tentukan Makanan dan Minuman Kesukaan Pelanggan Disini !! <br>Kami akan menghitungnya untukmu</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Masuk</a>
            </div>
          </div>
        </div>
      </div>
     </div>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; BoxRate 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
