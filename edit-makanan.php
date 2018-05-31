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

    <title>Edit-Makanan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/shop-homepage.css">

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

          <h1 class="my-4">Menu</h1>
          <div class="list-group">
            <a href="menu-makanan.php" class="list-group-item">&emsp;&nbsp;Makanan</a>
            <a href="menu-minuman.php" class="list-group-item">&emsp;&nbsp;Minuman</a>
            <div class="dropdown">
            <a href="#" class="list-group-item" data-toggle="dropdown">&#x27a4; Edit Menu</a>
            <ul class="dropdown-content">
              <li><a href="#" class="list-drop">&#x27a4;&emsp;Edit Makanan</a></li>
              <li><a href="edit-minuman.php" class="list-drop">&emsp;&emsp;Edit Minuman</a></li>
            </ul>
          </div>

          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
      <div class="container-form">
         <form id='menu-form' method="post" action="server/server-makanan.php" enctype="multipart/form-data">
          <div class="form-group">
            <label >Masukan Gambar Makanan</label>
            <input class="form-control" type="file" name="image">
          </div>
          <div class="form-group">
            <label for="nama-menu">Makanan</label>
            <input class="form-control" type="text" name="text" placeholder="Masukan Nama" id='nama-menu'>
          </div>
          <div class="form-group">
            <label for="harga-menu">Harga Rp.</label>
            <input class="form-control" type="number" name="price" value="0" id="harga-menu">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="description" placeholder="deskripsi" rows='2' cols='30' form="menu-form"></textarea>
          </div>
            <input style="display: none;" type="number" name="store_id" value="<?php echo $_SESSION['store_id'] ?>">
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
           $storeid=$_SESSION['store_id'];
           $sql= "SELECT * FROM menu WHERE ket='makanan' and store_id='$storeid'";
           $result = mysqli_query($db, $sql);
            echo "<form class='row' method='post' action='server/server-makanan.php'>";
           while ($row=mysqli_fetch_array($result)) {
            echo "<div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='#'><img id='image-menu' class='card-img-top' src='images/makanan/".$row['image']."' alt=''></a>
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
