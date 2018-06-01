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

        <div class="col-lg-3">

          <h1 class="my-4">Rating</h1>
          <div class="list-group">
            <a href="rating-makanan.php" class="list-group-item">&#x27a4;&nbsp; Makanan</a>
            <a href="rating-minuman.php" class="list-group-item">&emsp;&nbsp; Minuman</a>
              <form method="post" action="rating-makanan.php">
                <div class="form-group">
                  <label class="list-group-item" for="sel1">Urut Berdasarkan</label>
                  <select class="form-control" id="sel1" name="urut">
                    <if ><?php $urut=1; ?>
                    <option value="1">Rating</option>
                    <option <?php error_reporting(0); if($_POST['urut']==2) {echo 'selected="selected"';} ?> value="2">Nama</option>
                    <option <?php error_reporting(0); if($_POST['urut']==3) {echo 'selected="selected"';} ?> value="3">Harga</option>
                  </select>
                </div>
                <input class="btn " type="submit" name="urutkan" value="urutkan">
              </form>
          </div>
         </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
         
         <div class="row" style="margin-top: 70px;">
     

        <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $storeid=$_SESSION['store_id'];

           if(isset($_POST["urutkan"])){
              $urut = mysqli_real_escape_string($db,$_POST["urut"]);
            }
           $storeid=$_SESSION['store_id'];
           
           
           if ($urut ==1) {
            $sql= "SELECT * FROM menu WHERE ket='makanan' and store_id='$storeid' order by rating desc";
           }
           if ($urut ==2) {
            $sql= "SELECT * FROM menu WHERE ket='makanan' and store_id='$storeid' order by name";
           }
           if ($urut ==3) {
            $sql= "SELECT * FROM menu WHERE ket='makanan' and store_id='$storeid' order by price";
           }

           $result = mysqli_query($db, $sql);
           while ($row=mysqli_fetch_array($result)) {
            echo "<div class='col-md-6 my-4'>
              <div class='card h-100'>
                <a href='#'><img id='image-rating' class='card-img-top' src='images/makanan/".$row['image']."' alt=''></a>
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
                else {
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
