<?php
  include('../login.php'); 
    if (empty($_SESSION['username'])) {
        header('location: ../login.html');
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu-Makanan</title>


    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="../css/shop-homepage.css">

  </head>

  <body >

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img id='image-logo' src="../images/logo/BoxRate.png">
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
              <a class="nav-link" href="../index.php">Beranda
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../index.php#footer">Tentang</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../index.php#footer">Tanggapan</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../index.php#footer">Kontak</a>
            </li>
          </ul>
          <div class="dropdown">
              <label data-toggle='dropdown'>
                <img id='image-user' src="../images/user.png">
              </label>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" style="text-transform: capitalize;" href=""> <?php if (isset($_SESSION["name"])): ?>
                  <?php  echo $_SESSION['name'];?>
                   <?php endif ?></a></li>
              <li class="dropdown-divider"></li>
              <li><a href="" class="dropdown-item">Bantuan ?</a></li>
              <li><a class="dropdown-item" href="">Pengaturan</a></li>
               <li class="dropdown-divider"></li>
              <li ><a class="dropdown-item" href="../index.php?logout='1'">Keluar</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

    	

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Isi Rating</h1>
          <div class="list-group">
            <a href="input-pesanan.php" class="list-group-item">&emsp;&nbsp;Input Pesanan</a>
            <a href="#" class="list-group-item">&#x27a4; Total Pesanan</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <div class='row'>
          <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");

//Makanan
           $storeid=$_SESSION['store_id'];
           $sql= "SELECT * FROM menu m,pesanan p WHERE m.ket='makanan' and p.id_menu=m.id and m.store_id='$storeid'";
           $result = mysqli_query($db, $sql); 

        echo "
          <table class='table table-bordered' style='margin-top:95px;'>
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Gambar</th>
            <th>Total Pesanan</th>
          </tr>
        </thead>";
        echo "<tbody>";
         $i=1;
        while ($row=mysqli_fetch_array($result)) {
          echo "
          <tr>
            <td>".$i++."</td>
            <td>".$row['name']."</td>
            <td><img src='../images/makanan/".$row['image']."' style='width: 100px; height: 60px;'></td>
            <td>".$row['jumlah']."</td>
          </tr>";
        }
        echo "</tbody>";
      echo "</table>";


//Minuman

      $sql= "SELECT * FROM menu m,pesanan p WHERE m.ket='minuman' and p.id_menu=m.id and store_id='$storeid'";
           $result = mysqli_query($db, $sql); 


        echo "
          <table class='table table-bordered' style='margin-top:95px;'>
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Minuman</th>
            <th>Gambar</th>
            <th>Total Pesanan</th>
          </tr>
        </thead>";
        echo "<tbody>";
         $i=1;
        while ($row=mysqli_fetch_array($result)) {
          echo "
          <tr>
            <td>".$i++."</td>
            <td>".$row['name']."</td>
            <td><img src='../images/minuman/".$row['image']."' style='width: 100px; height: 60px;'></td>
            <td>".$row['jumlah']."</td>
          </tr>";
        }
        echo "</tbody>";
      echo "</table>";

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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
