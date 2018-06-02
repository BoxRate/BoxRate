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

          <h1 class="my-4">Global Rating</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">&#x27a4;&nbsp; Makanan</a>
            <a href="glob-rate-minuman.php" class="list-group-item">&emsp;&nbsp; Minuman</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">


        <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $sql= "SELECT * FROM menu WHERE ket='makanan' order by rating DESC";
           $result = mysqli_query($db, $sql);
           while ($row=mysqli_fetch_array($result)) {
             $store_id=$row['store_id'];
             $query= "SELECT * FROM store WHERE store_id='$store_id'";
             $hasil = mysqli_query($db, $query);
           while ($store=mysqli_fetch_array($hasil)) {
              $toko=$store['store_name'];
           }
            echo "<div class='col-md-6 my-4'>
              <div class='card h-100'>
                <form action='formulir.html' method='get' target='_blank'>
                  Nama      :<input type='text' name='username' value='nama kamu'/></br>

                  
                  <input type='submit' value='Selesai' />
                </form>
              </div>
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
