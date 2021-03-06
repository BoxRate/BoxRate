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
            <a href="#" class="list-group-item">&#x27a4; Input Pesanan</a>
            <a href="total-pesanan.php" class="list-group-item">&emsp;&nbsp;Total Pesanan</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">
          	 <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $storeid=$_SESSION['store_id'];
           $sql= "SELECT * FROM menu WHERE ket='makanan' and store_id='$storeid'";
           $result = mysqli_query($db, $sql); 
            echo "<table class='table table-bordered' style='margin-top:95px;'>
		    <thead>
		      <tr>
		        <th>Nama Makanan</th>
		        <th>Harga</th>
		        <th>Jumlah Pesanan</th>
		      </tr>
		    </thead>";
           while ($row=mysqli_fetch_array($result)) {
            $nomor[]=$row['id'];
            $query= "SELECT * FROM pesanan WHERE id_menu='$row[id]'";
                $hasil=mysqli_query($db, $query);
                  while ($trow=mysqli_fetch_array($hasil)) {
                    $jumlah= (int)$trow['jumlah'];
                  }
                echo '<div class="modal fade" id="PesananModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                    <form method="post" action="../server/server-pesanan.php">
                    <div class="modal-content">
                      <div style="background: #17a2b8; color:#fff" class="modal-header">
                        <h4 class="modal-title" style="text-transform:capitalize;">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                      <input style="display:none;" name="id-pesan" value="'.$row['id'].'" >
                      <label>Jumlah Pesanan : </label>
                      <input style="float:right; border-radius:5px; width:50px;" type="number" name="jumlah" value="0">
                      </div>
                      <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" name="Pesan" value="Pesan">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>';
            echo '<div class="modal fade" id="myModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div style="background: #17a2b8; color:#fff" class="modal-header">
                        <h4 class="modal-title">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <img style="width:450px; height:250px; margin-left: 10px;"  src="../images/makanan/'.$row['image'].'" >
                        <p style ="margin-left:10px;">'.$row['description'].'</p>
                        <h6 style ="margin-left:10px;">Terjual : '.$jumlah.'<h6>
                      </div>
                      <div class="modal-footer">
                      <h5 style="margin-right:50%;">Harga : Rp. '.$row['price'].'</h5>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>';
            echo " <tbody>
		      <tr>
		        <td><a style='text-transform: capitalize;' href='#myModal".$row['id']."' data-toggle='modal'>".$row['name']."</a></td>
		        <td>".$row['price']."</td>
		        <td><a href='#PesananModal".$row['id']."' data-toggle='modal'>Pesan</a></td>
		      </tr>";
		    
             }
             echo "</tbody>
		  		</table>";
          	

          	 $sql= "SELECT * FROM menu WHERE ket='minuman' and store_id='$storeid'";
          	 $result = mysqli_query($db, $sql); 
            echo "<table class='table table-bordered' style='margin-top:95px;'>
		    <thead>
		      <tr>
		        <th>Nama Minuman</th>
		        <th>Harga</th>
		        <th>Jumlah Pesanan</th>
		      </tr>
		    </thead>";
           while ($row=mysqli_fetch_array($result)) {
            $nomor[]=$row['id'];
                $query= "SELECT * FROM pesanan WHERE id_menu='$row[id]' ";
                $hasil=mysqli_query($db, $query);
                  while ($trow=mysqli_fetch_array($hasil)) {
                    $jumlah= (int)$trow['jumlah'];
                  }

            echo '<div class="modal fade" id="PesananModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                    <form method="post" action="../server/server-pesanan.php">
                    <div class="modal-content">
                      <div style="background: #17a2b8; color:#fff" class="modal-header">
                        <h4 class="modal-title" style="text-transform:capitalize;">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                      <input style="display:none;" name="id-pesan" value="'.$row['id'].'" >
                      <label>Jumlah Pesanan : </label>
                      <input style="float:right; border-radius:5px; width:50px;" type="number" name="jumlah" value="0">
                      </div>
                      <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" name="Pesan" value="Pesan">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>';
            echo '<div class="modal fade" id="myModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div style="background: #17a2b8; color:#fff" class="modal-header">
                        <h4 class="modal-title">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <img style="width:450px; height:250px; margin-left: 10px;"  src="../images/minuman/'.$row['image'].'" >
                        <p style ="margin-left:10px;">'.$row['description'].'</p>
                        <h6 style ="margin-left:10px;">Terjual : '.$jumlah.' </h6>
                      </div>
                      <div class="modal-footer">
                      
                      <h5 style="margin-right:50%;">Harga : Rp. '.$row['price'].'</h5>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>';
            echo " <tbody>
		      <tr>
		        <td><a style='text-transform: capitalize;' href='#myModal".$row['id']."' data-toggle='modal' >".$row['name']."</a></td>
		        <td>".$row['price']."</td>
		        <td><a href='#PesananModal".$row['id']."' data-toggle='modal'>Pesan</a></td>
		      </tr>";
		    
             }
             echo "</tbody>
		  		</table>";


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
