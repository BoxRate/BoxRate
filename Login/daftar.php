<?php
	include('koneksi.php');
	if(isset($_POST["submit"])){
		$username = htmlentities(strip_tags($_POST["user"]));
		$password = htmlentities(strip_tags(hash('sha256', $_POST["pass"])));
		$nama = htmlentities(strip_tags($_POST["name"]));
		$email = htmlentities(strip_tags($_POST["email"]));
		$no_hp = htmlentities(strip_tags($_POST["no_hp"]));
		$alamat = htmlentities(strip_tags($_POST["alamat"]));
		
		$syntax="insert into akun values('$username','$name','$password','$email','$alamat','$no_hp')";
		$login = mysqli_query($link,$syntax);
		
		if($login){
			header('location:login.html');
		}
		else{
			echo"daftar gagal";
		}
	}
?>