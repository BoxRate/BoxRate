<?php
	session_start();
	include('koneksi.php');
	if(isset($_POST["submit"])){
		$username = htmlentities(strip_tags($_POST["user"]));
		$password = htmlentities(strip_tags(hash('sha256', $_POST["pass"])));
		
		$syntax="select * from akun where username='$username' and password='$password'";
		$login = mysqli_query($link,$syntax);
		
		if($login->num_rows>0){
			header('location:home.php');
			$_SESSION["username"] = $username;
		}
		else{
			header('location:login.html');
		}
	}
?>
