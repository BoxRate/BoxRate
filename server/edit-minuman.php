<?php
	 // Create database connection
  $db = mysqli_connect("localhost", "root", "", "boxrate");

  	$msg="";
	if (isset($_POST['edit'])) {
		$image = $_FILES['image']['name'];

		$name = mysqli_real_escape_string($db, $_POST['text']);
	    $price = mysqli_real_escape_string($db, $_POST['price']);
	    $desc = mysqli_real_escape_string($db, $_POST['desc']);
	    $store_id=mysqli_real_escape_string($db, $_POST['store_id']);
	    $image_name=mysqli_real_escape_string($db, $_POST['image_name']);
	    $id_menu=mysqli_real_escape_string($db, $_POST['id_menu']);

	  if (!empty($image)) {
	  	 $target="../images/minuman/".$image_name;
	     if (file_exists($target)) {
	        unlink($target);
	     }

	    $div= explode('.', $image);
	    $file_ext=strtolower(end($div));
	    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
	  	// image file directory
	  	$target = "../images/minuman/".$unique_image;

	  	$sql="UPDATE menu SET image='$unique_image' WHERE id='$id_menu'";
	  	mysqli_query($db, $sql);

	  	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
  			$msg = "Image uploaded successfully";
	  	}else{
	  		$msg = "Failed to upload image";
	  	}
	  }

	  $query="UPDATE menu SET price='$price', name='$name',description='$desc' WHERE id='$id_menu'";
	  mysqli_query($db, $query);

	  header('location: ../edit-minuman.php');


	}
?>