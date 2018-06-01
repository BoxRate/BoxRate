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


  if (isset($_POST['delete'])) {
    //$id = mysqli_real_escape_string($db, $_POST['check']);
    $nama="";

    foreach($_POST['check'] as $id) {
    $sql = "SELECT * FROM promo WHERE id_promo='$id'";
    $result= mysqli_query($db, $sql);

     while($hasil=mysqli_fetch_array($result)){
          $nama=(string)$hasil['image_promo'];
      }

    $target="../images/diskon/".$nama;
     if (file_exists($target)) {
        unlink($target);
     }

    $sql = "DELETE FROM promo WHERE id_promo='$id'";
    mysqli_query($db, $sql);

    }

    header('location: ../promo/isi-diskon.php');
   }

  ?>