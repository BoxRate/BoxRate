<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Diskon</title>

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

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
      <div class="container-form">
         <form id='menu-form' method="post" action="server/server-diskon.php" enctype="multipart/form-data">
		 <div class="form-group">
            <label for="nama-cafe-resto">Nama Cafe/Resto</label>
            <input class="form-control" type="text" name="text" placeholder="Masukan Nama Cafe/Resto" id='nama-cafe-resto'>
          </div>
          <div class="form-group">
            <label for="nama-menu">Nama Menu</label>
            <input class="form-control" type="text" name="text" placeholder="Masukan Nama" id='nama-menu'>
          </div>
          <div class="form-group">
            <label for="harga-menu">Harga Rp.</label>
            <input class="form-control" type="number" name="price" value="0" id="harga-menu">
          </div>
		  <div class="form-group">
            <label for="diskon-menu">Diskon</label>
            <input class="form-control" type="number" name="price" id="diskon-menu">
          </div>
		  
            <input class="btn btn-secondary btn-upload" type="submit" name="upload" value="upload">
         </form>
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
