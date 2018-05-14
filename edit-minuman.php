<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit-Minuman</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/shop-homepage.css">

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

          <h1 class="my-4">Menu</h1>
          <div class="list-group">
            <a href="menu-makanan.php" class="list-group-item">&emsp;&nbsp;Makanan</a>
            <a href="menu-minuman.php" class="list-group-item">&emsp;&nbsp;Minuman</a>
            <div class="dropdown">
            <a href="#" class="list-group-item" data-toggle="dropdown">&#x27a4; Edit Menu</a>
            <ul class="dropdown-content">
              <li><a href="edit-makanan.php" class="list-drop">&emsp;&emsp; Edit Makanan</a></li>
              <li><a href="#" class="list-drop">&#x27a4;&emsp; Edit Minuman</a></li>
            </ul>
          </div>

          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
      <div class="container-form">
         <form id='menu-form' method="post" action="server/server-minuman.php" enctype="multipart/form-data">
          <div class="form-group">
            <label >Masukan Gambar</label>
            <input class="form-control" type="file" name="image">
          </div>
          <div class="form-group">
            <label for="nama-menu">Minuman</label>
            <input class="form-control" type="text" name="text" placeholder="Masukan Nama" id='nama-menu'>
          </div>
          <div class="form-group">
            <label for="harga-menu">Harga Rp.</label>
            <input class="form-control" type="number" name="price" value="0" id="harga-menu">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="description" placeholder="deskripsi" rows='2' cols='30' form="menu-form"></textarea>
          </div>
            <input class="btn btn-secondary btn-upload" type="submit" name="upload" value="upload">
         </form>
       </div>

       <div class="container-form">
         <label id="menu-form" for="check-all">
           <a class="btn btn-primary" style="color: white;" >Select All</a>
         </label>
         <label for="delete">
           <a class="btn btn-danger" style="color: white;">Delete</a>
         </label>
       </div>

       <div >

        <?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $sql= "SELECT * FROM menu WHERE ket='minuman'";
           $result = mysqli_query($db, $sql);
            echo "<form class='row' method='post' action='server/server-minuman.php'>";
           while ($row=mysqli_fetch_array($result)) {
            echo "<div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='#'><img id='image-menu' class='card-img-top' src='images/minuman/".$row['image']."' alt=''></a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a href='#'>".$row['name']."</a>
                  </h4>
                  <h5>Rp. ".$row['price']."</h5>
                  <p class='card-text'>".$row['description']."</p>
                </div>
                <div class='card-footer'>
                  <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  <input class='form-check-input' type='checkbox' name='check[]' value='".$row['id']."'>
                </div>";
              echo "<input id='delete' onclick=\"return confirm('Kamu Yakin Ingin Menghapusnya')\" type='submit' name='delete' value='delete'>";
              echo"</div>
            </div>";
             }
          echo "<input id ='check-all' type='checkbox' onclick='selectAll(this.checked)'>";
            echo "</form>";
          ?>
          </div>
          <!-- /.row -->
          <div class="container-form">
         <label id="menu-form" for="check-all">
           <a class="btn btn-primary" style="color: white;" >Select All</a>
         </label>
         <label for="delete">
           <a class="btn btn-danger" style="color: white;">Delete</a>
         </label>
       </div>
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

    <script src="check.js"></script>
  </body>

</html>
