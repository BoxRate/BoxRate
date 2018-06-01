<?php 
	 // Create database connection
  $db = mysqli_connect("localhost", "root", "", "boxrate");

  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['tambah'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	$store_id=mysqli_real_escape_string($db, $_POST['store_id']);

  	$div= explode('.', $image);
    $file_ext=strtolower(end($div));
    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
  	// image file directory
  	$target = "../images/diskon/".$unique_image;

  	if (!empty($image)) {
  		$sql="INSERT INTO promo (image_promo, store_id) VALUES ('$unique_image','$store_id')";
  		mysqli_query($db, $sql);


      if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
  	}
    header('location: ../promo/isi-diskon.php');
  	
  }

  ?>