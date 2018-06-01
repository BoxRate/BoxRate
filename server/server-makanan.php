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
    $desc = mysqli_real_escape_string($db, $_POST['description']);
    $store_id=mysqli_real_escape_string($db, $_POST['store_id']);

    $div= explode('.', $image);
    $file_ext=strtolower(end($div));
    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
  	// image file directory
  	$target = "../images/makanan/".$unique_image;

    if (!empty($image) && !empty($price) && !empty($text)) {
  	$sql = "INSERT INTO menu (image, name, price, ket,description,store_id) VALUES ('$unique_image', '$text', '$price','makanan', '$desc', '$store_id')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM menu WHERE ket='makanan'");

  header('location: ../edit-makanan.php');
}


 if (isset($_POST['delete'])) {
    //$id = mysqli_real_escape_string($db, $_POST['check']);
    $nama="";

    foreach($_POST['check'] as $id) {
      $sql = "SELECT * FROM menu WHERE id='$id' and ket='makanan'";
    $result= mysqli_query($db, $sql);

     while($hasil=mysqli_fetch_array($result)){
          $nama=(string)$hasil[image];
      }

      $target="../images/makanan/".$nama;
     if (file_exists($target)) {
        unlink($target);
     }

    $sql = "DELETE FROM pesanan WHERE id_menu='$id'";
    mysqli_query($db, $sql);

    $sql = "DELETE FROM menu WHERE id='$id' and ket='makanan'";
    mysqli_query($db, $sql);
    }

    

    header('location: ../edit-makanan.php');
   }
?>

