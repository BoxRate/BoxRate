<?php
  include('login.php'); 
    if (empty($_SESSION['username'])) {
        header('location: login.html');
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rating</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/shop-homepage.css">

    <!-- Star Rating-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img id='image-logo' src="images/logo/BoxRate.png">
        BoxRate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
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

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Rating</h1>
          <div class="list-group">
            <a href="rating-makanan.php" class="list-group-item">&emsp;&nbsp; Makanan</a>
            <a href="rating-minuman.php" class="list-group-item">&#x27a4;&nbsp; Minuman</a>
          </div>
         </br>
        </div>
        <!-- /.col-lg-3 -->

       
      <div class="container">
          <div class="row">
		    <div class="col-sm-4" style="background-color:#DCDCDC;">
      
	   <div class="dropdown">
    <a href="#" data-toggle="dropdown"><p align="center">harga<b class="caret"></p></b></a>
    <ul class="dropdown-menu">
        <li><a href="#">Rendah ke Tinggi</a></li>
        <li><a href="#">Tinggi ke Rendah</a></li>
    </ul>
    </div>
	</div>
    <div class="col-sm-4" style="background-color:#DCDCDC;">
	<div class="dropdown">
    <a href="#" data-toggle="dropdown"><p align="center">terlaris<b class="caret"></p></b></a>
    <ul class="dropdown-menu">
        <li><a href="#">Hari ini</a></li>
        <li><a href="#">Minggu lalu</a></li>
    </ul>
  </div>
  </div>
  <div class="col-sm-4" style="background-color:#DCDCDC;">
   <div class="dropdown">
    <a href="#" data-toggle="dropdown"><p align="center">kategori<b class="caret"></p></b></a>
    <ul class="dropdown-menu">
        <li><a href="#">harian</a></li>
        <li><a href="#">mingguan</a></li>
		<li><a href="#">bulanan</a></li>
    </ul>
	
 </div>
  </div>
   </div>
    </div>




        <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $storeid=$_SESSION['store_id'];
           $sql= "SELECT * FROM menu WHERE ket='minuman' and store_id='$storeid' order by rating DESC";
           $result = mysqli_query($db, $sql);
           while ($row=mysqli_fetch_array($result)) {
            echo "<div class='col-md-6 my-4'>
              <div class='card h-100'>
                <a href='#'><img id='image-rating' class='card-img-top' src='images/minuman/".$row['image']."' alt=''></a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a href='#'>".$row['name']."</a>
                  </h4>
                  <h5>Rp. ".$row['price']."</h5>
                  <p class='card-text'>".$row['description']."</p>
                </div>
                <div class='card-footer'>
                <small class='text-muted'>";
                if ($row['rating']>80) {
                  echo "<span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>";
                }
                elseif ($row['rating']>60) {
                  echo "<span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star'></span>";
                }
                elseif($row['rating']>40) {
                  echo "<span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>";
                }
                elseif($row['rating']>20) {
                  echo "<span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>";
                }
                elseif($row['rating']>0) {
                  echo "<span class='fa fa-star checked'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>";
                }
             
              echo "</small></div>
              </div>
            </div>";
          }
          ?>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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
