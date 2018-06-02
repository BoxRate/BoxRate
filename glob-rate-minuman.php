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
        <a class="navbar-brand" href="index.php">
          <img id='image-logo' src="images/logo/BoxRate.png">
          <a class="user-login" style="color: white; font-family: times new romans;"><?php if (isset($_SESSION["store"])): ?>
                  <?php  echo $_SESSION['store'];?>
                   <?php endif ?>

                <?php if (isset($_SESSION["username"]) and $_SESSION['name']==NULL): ?>
                  <?php  echo $_SESSION['username'];?>
                   <?php endif ?></a> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="font-family: times new romans;">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Beranda
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php#footer">Tentang</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php#footer">Tanggapan</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php#footer">Kontak</a>
            </li>
          </ul>
          <div class="dropdown">
              <label data-toggle='dropdown'>
                <img id='image-user' src="images/user.png">
              </label>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" style="text-transform: capitalize;" href=""> <?php if (isset($_SESSION["name"])): ?>
                  <?php  echo $_SESSION['name'];?>
                   <?php endif ?></a></li>
              <li class="dropdown-divider"></li>
              <li><a href="" class="dropdown-item">Bantuan ?</a></li>
              <li><a class="dropdown-item" href="">Pengaturan</a></li>
               <li class="dropdown-divider"></li>
              <li ><a class="dropdown-item" href="index.php?logout='1'">Keluar</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3 mb-4">

          <h1 class="my-4">Global Rating</h1>
          <div class="list-group">
            <a href="glob-rate-makanan.php" class="list-group-item">&emsp;&nbsp; Makanan</a>
            <a href="#" class="list-group-item">&#x27a4;&nbsp; Minuman</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">


        <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $sql= "SELECT * FROM menu WHERE ket='minuman' order by rating DESC";
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
                <a href='#'><img id='image-rating' class='card-img-top' src='images/minuman/".$row['image']."' alt=''></a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a href='#'>".$row['name']."</a>
                  </h4>
                  <h6>Toko : ".$toko."</h6>
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
                }else {
                   echo "<span class='fa fa-star'></span>
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
