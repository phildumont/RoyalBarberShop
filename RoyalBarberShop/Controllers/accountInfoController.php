<?php
	session_start();
	include("../Pages/connection.inc");
	
	if (isset($_SESSION["email"])){
		$email = $_SESSION["email"];
	}
	else {
		$email = "no user";
	}
	
	if ($email != "no user"){
		$infoSql = "SELECT customer_fname, customer_lname, email FROM customer WHERE email='".$email."'";
		$infoRes = $conn->query($infoSql) or die("cant connect");
		$user = mysqli_fetch_array($infoRes);
		
		$firstName = $user["customer_fname"];
		$lastName = $user["customer_lname"];
		$email = $user["email"];
		
		$userInformation = array($firstName, $lastName, $email);
		$_SESSION["user_info"] = $userInformation;
		
		header("Location:../Pages/myAccount.php");
	}
	else {
		$_SESSION["user_info"] = "Vous n'êtes pas connecté. Veuillez vous connecter avant d'accéder à cette page.";
		header("Location:../Pages/myAccount.php");
	}
?>