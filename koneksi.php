<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="boxrate";
	$link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(!$link){
		die("gagal connect dengan data base : ".mysqli_connect_errno()."-".mysqli_connect_error());
	}
?>