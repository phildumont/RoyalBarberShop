<?php 
	include("../Pages/connection.inc");

	$fname = $_POST["fname"];
	$lname  = $_POST["lname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	$md5Password = md5($password);
	
	$addUserSql = "INSERT INTO customer VALUES (0, '".$fname."', '".$lname."', "."'".$email."', '".$md5Password."')";
	
	//email does not exist
	//valid email address
	//passwords matches
	
	
	if (mysqli_query($conn, $addUserSql) === true){
		echo "success";
	}
	else {
		echo "error";
		echo $addUserSql;
	}
?>