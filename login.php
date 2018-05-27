<?php
	session_start();
	$errors=array();
	include('koneksi.php');
	if(isset($_POST["submit"])){
		$username = mysqli_real_escape_string($link,strip_tags($_POST["user"]));
		$password = mysqli_real_escape_string($link,strip_tags( $_POST["pass"]));
		$password= md5($password);
		$query="SELECT * FROM akun WHERE (username ='$username' OR email='$username' ) AND password='$password'";
		
		
		$result=mysqli_query($link,$query);

            if (mysqli_num_rows($result)==1) {
	             $data=mysqli_query($link,"SELECT username,name FROM akun WHERE password='$password'");
	             $store=mysqli_query($link,"SELECT * FROM store WHERE owner='$username'");
	             if ($data === FALSE) {
	                die(mysqli_error());
	             }

	             while($hasil=mysqli_fetch_array($data)){
	                $name=(string)$hasil[name];
	                $username=(string)$hasil[username];
	               
	             }

	             while ($row=mysqli_fetch_array($store)) {
	             	$_SESSION['store']= (string)$row[store_name];
	             	$_SESSION['store_id']= (int)$row[store_id];
	             }

            $_SESSION['name'] = $name;
            $_SESSION['username']=$username;
            header('location:index.php');
        
	        }else {
	                array_push($errors, "wrong username/password");
	               header('location:login.html');
            }
	}

	//log out
        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header('location: login.php');
        }
?>
