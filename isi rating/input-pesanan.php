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
        <a class="navbar-brand" href="#">
          <img id='image-logo'src="../images/logo/BoxRate.png">
        BoxRate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
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

          <h1 class="my-4">Isi Rating</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">&#x27a4; Input Pesanan</a>
            <a href="menu-minuman.php" class="list-group-item">&emsp;&nbsp;Total Pesanan</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">
          	 <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $sql= "SELECT * FROM menu WHERE ket='makanan'";
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
            echo '<div class="modal fade" id="myModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <img style="width:450px; height:250px; margin-left: 10px;"  src="../images/makanan/'.$row['image'].'" >
                        <p style ="margin-left:10px;">'.$row['description'].'</p>
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
		        <td><input nama='Pesanan[]' type='number'></td>
		      </tr>";
		    
             }
             echo "</tbody>
		  		</table>";
          	

          	 $sql= "SELECT * FROM menu WHERE ket='minuman'";
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
            echo '<div class="modal fade" id="myModal'.$row['id'].'" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">'.$row['name'].'</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <img style="width:450px; height:250px; margin-left: 10px;"  src="../images/minuman/'.$row['image'].'" >
                        <p style ="margin-left:10px;">'.$row['description'].'</p>
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
		        <td><input nama='Pesanan[]' type='number'></td>
		      </tr>";
		    
             }
             echo "</tbody>
		  		</table>";


		  	echo "<input class='btn btn-secondary btn-pesan' type='submit' value='Pesan'>";

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
