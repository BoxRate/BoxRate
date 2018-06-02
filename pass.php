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

    <style>
      .asa {
    -webkit-box-align: stretch;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-bottom: 16px;
    margin-top: 32px;
}
    </style>

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
            <a href="#" class="list-group-item">&#x27a4;&nbsp; Edit Profile</a>
            <a href="#" class="list-group-item">&emsp;&nbsp; Change Password</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">


        <?php
          error_reporting(0);
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $as=$_SESSION['username'];
           $sql= "SELECT * FROM akun where username=$as";
           $result = mysqli_query($db, $sql);
           $row=mysqli_fetch_array($result); 
            echo "<div class='col-md-6 my-4'>
              <div class='asa'>
                <form action='formulir.html' method='get' target='_blank'>
                  Nama      <input type='text' name='name' placeholder='".row['name']."'/></br>
                  Username  <input type='text' name='username' /></br>
                  Website   <input type='text' name='website' /></br>
                  Bio   <textarea name='komentar' rows='5' cols='20'></textarea> </br>
                  
                  <p style='color:brown;'>Private Information</p>

                  Email         <input type='text' name='email' /></br>
                  Phone Number  <input type='text' name='phone_number' /></br>
                  Gender        <input type='radio' name='jenis_kelamin' value='laki-laki' checked> Male
                                <input type='radio' name='jenis_kelamin' value='perempuan' checked> Female
                                </br>

                  <input type='submit' value='Selesai' />
                </form>
              </div>
              </div>
            </div>";
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
