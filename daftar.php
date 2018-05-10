<?php
	include('koneksi.php');
	session_start();
	$errors=array();
	if(isset($_POST["submit"])){
		$username = mysqli_real_escape_string($link,strip_tags($_POST["user"]));
		$password = mysqli_real_escape_string($link,strip_tags($_POST["pass"]));
		$name = mysqli_real_escape_string($link,strip_tags($_POST["name"]));
		$email = mysqli_real_escape_string($link,strip_tags($_POST["email"]));
		
		
		
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
	        $syntax="insert into akun values('$username','$name','$password','$email')";
			$login = mysqli_query($link,$syntax);
			$_SESSION['username']= $username;
			$_SESSION['name'] = $name;
			header('location:login.html');
		}

	}
?>