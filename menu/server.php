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

    $div= explode('.', $image);
    $file_ext=strtolower(end($div));
    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
  	// image file directory
  	$target = "images/".$unique_image;

    if (!empty($image) && !empty($price) && !empty($text)) {
  	$sql = "INSERT INTO menu (image, description, price) VALUES ('$unique_image', '$text', '$price')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM menu");

  header('location: addmenu.php');
}


 if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($db, $_POST['check']);
    $nama="";

    $sql = "SELECT * FROM menu WHERE id='$id'";
    $result= mysqli_query($db, $sql);

     while($hasil=mysqli_fetch_array($result)){
          $nama=(string)$hasil[image];
      }

      $target="images/".$nama;
     if (file_exists($target)) {
        unlink($target);
     }


    $sql = "DELETE FROM menu WHERE id='$id'";
    mysqli_query($db, $sql);

    header('location: addmenu.php');
   }
?>

