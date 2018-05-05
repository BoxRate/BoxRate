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

  	$sql = "INSERT INTO menu (image, description, price) VALUES ('$image', '$text', '$price')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
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
	<div id="content">
    <?php
         $db = mysqli_connect("localhost", "root", "", "boxrate");
         $sql= "SELECT * FROM menu";
         $result = mysqli_query($db, $sql);
         while ($row=mysqli_fetch_array($result)) {
           echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."'>";
            echo "<p>".$row['description']."</p>";
           echo "</div>";
         }
     ?>
		<form method="post" action="addmenu.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image"><br>
				<span>Price : Rp. </span>
				<input type="number" name="price" placeholder="ex:10000">
			</div>
			<div>
				<textarea name="text" cols="40" placeholder="say something about thi mage"></textarea>
			</div>
			<div>
				<input type="submit" name="upload" value ="upload image" ">
			</div>
		</form>
	</div>
</body>
</html>