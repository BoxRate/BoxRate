<?php 
	 // Create database connection
  $db = mysqli_connect("localhost", "root", "", "boxrate");

  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$text = mysqli_real_escape_string($db, $_POST['text']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

  	// image file directory
  	$target = "images/".basename($image);

    if (!empty($image) && !empty($price) && !empty($text)) {
  	$sql = "INSERT INTO menu (image, description, price) VALUES ('$image', '$text', '$price')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
}
  $result = mysqli_query($db, "SELECT * FROM menu");

?>




<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>
   <header id="header">
        <h1>Edit Menu</h1>
    </header>


	<div id="content">
    <form  id="form" method="post" action="addmenu.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div>
        <label id="icon" for="file-input">
          <img src="addimage2.png">
        </label>
        <input id="file-input" type="file" name="image"><br>
        <input id="input-name" type="text" name="text" placeholder="Masukan Nama Makanan"><br>
        <input id="input-name" type="number" name="price" placeholder="Masukan Harga Rupiah">
      </div>
      <div>
        <input id='submit' type="submit" name="upload" value ="upload image" ">
      </div>
    </form>

   <?php
         $db = mysqli_connect("localhost", "root", "", "boxrate");
         $sql= "SELECT * FROM menu";
         $result = mysqli_query($db, $sql);
         while ($row=mysqli_fetch_array($result)) {
           echo "<div id='img_div'>";
            echo "<img id='list-menu' src='images/".$row['image']."'>";
            echo "<p id='name' >".$row['description']."</p>";
            echo "<p id='price'> Harga Rp.<strong>".$row['price'].",-</strong></p>";
            echo "<form method='post' action='addmenu.php'>";
            echo "<label for='delete'> <img id='img-delete' src='trash.png'></label>";
            echo "<input id='delete' name='delete' type='submit' value='".$row['id']."'>";
            echo "</form>";
           echo "</div>";
         }

    ?>

		
	</div>
</body>
</html>