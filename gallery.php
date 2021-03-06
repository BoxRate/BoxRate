<?php
  include('login.php'); 
    if (empty($_SESSION['username'])) {
        header('location: login.html');
    }
?>

<html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 300px;
    max-width: 700px;
    height: 500px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/shop-homepage.css">


</head>

<body>
	
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

    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Menu</h1>
          <div class="list-group">
            <a href="menu-makanan.php" class="list-group-item">&emsp;&nbsp;Makanan</a>
            <a href="menu-minuman.php" class="list-group-item">&emsp;&nbsp;Minuman</a>
            <a href="#" class="list-group-item">&#x27a4; Gallery</a>
           <div class="dropdown">
            <a href="#" class="list-group-item" data-toggle="dropdown">&emsp;&nbsp;Edit Menu</a>
            <ul class="dropdown-content">
              <li><a href="edit-makanan.php" class="list-drop">&emsp;&emsp;Edit Makanan</a></li>
              <li><a href="edit-minuman.php" class="list-drop">&emsp;&emsp;Edit Minuman</a></li>
            </ul>
          </div>
          </div>

        </div>
         <div class="col-lg-9">
          <div class="row">

		<?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $storeid=$_SESSION['store_id'];
           $sql= "SELECT * FROM menu WHERE store_id='$storeid' order by ket";
           $result = mysqli_query($db, $sql);
           echo "<div class=' mb-4'>";
           while ($row=mysqli_fetch_array($result)) {
            $ket=(string) $row['ket'];
        
            if (strcmp($ket, 'makanan')==0) {
                echo "
                <img class='myImg' id='myImg".$row['id']."' src='images/makanan/".$row['image']."' alt='".$row['name']."' width='250' height='200'>";       
           }else  {
           		echo "<img class='myImg' id='myImg".$row['id']."' src='images/minuman/".$row['image']."' alt='".$row['name']."' width='250' height='200'>";
             
            }
  

             echo ' <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div>';

            echo '  <script>
              // Get the modal
              var modal = document.getElementById("myModal");

              // Get the image and insert it inside the modal - use its "alt" text as a caption
              var img = document.getElementById("myImg'.$row['id'].'");
              var modalImg = document.getElementById("img01");
              var captionText = document.getElementById("caption");
              img.onclick = function(){
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
              }

              // Get the <span> element that closes the modal
              var span = document.getElementsByClassName("close")[0];

              // When the user clicks on <span> (x), close the modal
              span.onclick = function() { 
                  modal.style.display = "none";
              }
              </script>
              ';

           }
           echo "</div>";

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
