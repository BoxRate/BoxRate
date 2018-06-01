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
    <title>Tambah Promo</title>
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
            <h1 class="my-4">Promo</h1>
            <div class="list-group">
              <div class="container-form">
                <form id='menu-form' method="post" action="../server/promo-server.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label >Masukan Gambar promo</label>
                    <input class="form-control" type="file" name="image">
                  </div>
                  <input style="display: none;" type="number" name="store_id" value="<?php echo $_SESSION['store_id'] ?>">
                  <input type="submit" class="btn btn-primary" name="tambah" value="Tambah"><br><br>
                  
                  <label for="delete">
                    <a class="btn btn-danger" style="color: white;">Delete</a>
                  </label>
                </form>
              </div>
            </div>
          </div>
          <!-- /.col-lg-3 -->
        
        
        <div class="col-lg-9" style="margin: 90px 0px 0px 0px;">
          <div class="row">
            <?php
            $db = mysqli_connect("localhost", "root", "", "boxrate");
            $storeid=$_SESSION['store_id'];
            $sql= "SELECT * FROM promo WHERE store_id='$storeid'";
            $result = mysqli_query($db, $sql);
            echo "<form method='post' action='../server/promo-server.php'>";
            while ($row=mysqli_fetch_array($result)) {
            echo "
            <label for='cek".$row['id_promo']."' >
            <div id='".$row['id_promo']."' onclick='select(".$row['id_promo'].")' style='border: 6px solid #dedcdc; border-radius: 5px; margin: 20px 0px 0px 20px;'>
              <img for='cek' id='image-menu' src='../images/diskon/".$row['image_promo']."' alt='' >
            </div>
            </label>

              <input style='display:none;' id='cek".$row['id_promo']."' type='checkbox' name='check[]' value='".$row['id_promo']."'>";
              echo "<input id='delete' onclick=\"return confirm('Kamu Yakin Ingin Menghapusnya')\" type='submit' name='delete' value='delete'>";
            }
             
            echo "</form>";
            ?>
          </div>
        </div>
        </div>
      </div>

      
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
    <script src="../check.js"></script>
    <script type="text/javascript">
        function select(x) {
          //alert(x);
         var str1 =document.getElementById(x).style.borderColor;
         var str2 = 'rgb(222, 220, 220)';
         if (str1.localeCompare(str2)==0) {
            document.getElementById(x).style.border="6px solid #2190dd";
         } else {
            document.getElementById(x).style.border="6px solid #dedcdc";
         }
        }
     </script>
     
  </body>
</html>