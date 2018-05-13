<?php
	include('koneksi.php');
	session_start();
	$errors=array();
	if(isset($_POST["submit"])){
		$username = mysqli_real_escape_string($link,strip_tags($_POST["user"]));
		$password = mysqli_real_escape_string($link,strip_tags($_POST["pass"]));
		$name = mysqli_real_escape_string($link,strip_tags($_POST["name"]));
		$email = mysqli_real_escape_string($link,strip_tags($_POST["email"]));
		$store = mysqli_real_escape_string($link,strip_tags($_POST["store"]));
		
		
		
		$sql="select * from akun where email='$email'";
        $result=mysqli_query($link,$sql);
        if (mysqli_num_rows($result) > 0) {
            array_push($errors, "Email Already exist"); 
        }
        
        $sql="select * from akun where username='$username'";
        $result=mysqli_query($link,$sql);
        if (mysqli_num_rows($result) > 0) {
            array_push($errors, "Username Already exist"); 
        }

        if (count($errors)==0) {
        	$password = md5($password);
	        $syntax="INSERT INTO akun values('$username','$name','$password','$email')";
			$login = mysqli_query($link,$syntax);
			$syntax="INSERT INTO store (store_name, owner) VALUES('$store','$username')";
			$login= mysqli_query($link,$syntax);
			$_SESSION['store']= $store;
			$_SESSION['username']= $username;
			$_SESSION['name'] = $name;
			header('location:login.html');
		}

	}
?>