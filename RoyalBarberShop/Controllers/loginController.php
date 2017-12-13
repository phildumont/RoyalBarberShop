<?php
	session_start();
	include("../Pages/connection.inc");

	$email=$_POST["email"];
	$password=md5($_POST["password"]);

	$loginSql="SELECT email, password FROM customer WHERE email='".$email."'";
	 
	$loginres=$conn->query($loginSql) or die("cant connect");
	$user=mysqli_fetch_array($loginres);
	$emailFlag = 0;
	$passwordFlag = 0;

	//Email validation
	if (empty($email)){
		$emptyEmailError = "Please enter your E-mail address";
		$emailFlag = 0;
		$invalidEmailError = "";
		$emailNotFoundError  = "";
	}
	else if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email)){
		$invalidEmailError = "Please enter a valid E-mail address";
		$emailFlag = 0;
		$emptyEmailError = "";
		$emailNotFoundError = "";
	}
	else if($email!=$user['email'])	{
		$emailNotFoundError = "$email , can not be found";
		
		$emailFlag = 0;
		$emptyEmailError = "";
		$invalidEmailError = "";
	}
	else {
		$emptyEmailError = "";
		$invalidEmailError = "";
		$emailNotFoundError = "";
		$emailFlag = 1;
	}
	
	//Password
	if($password == null){
		$emptyPasswordError = "Please enter your password";
		$passwordFlag = 0;
		$invalidPasswordError = "";
	}
	else if($password!=$user['password']){
		$invalidPasswordError = "Password is not correct";
		$passwordFlag = 0;
		$emptyPasswordError = "";
	}
	else {
		$emptyPasswordError = "";
		$invalidPasswordError = "";
		$passwordFlag = 1;
	}
	
	if ($emailFlag == 0 || $passwordFlag == 0){
		
		if (isset($emptyEmailError))
			$_SESSION["emptyEmail"] = $emptyEmailError;
		if (isset($invalidEmailError))
			$_SESSION["invalidEmail"] = $invalidEmailError;
		if (isset($emailNotFoundError))
			$_SESSION["emailNotFound"] = $emailNotFoundError;
		if (isset($emptyPasswordError))
			$_SESSION["emptyPassword"] = $emptyPasswordError;
		if (isset($invalidPasswordError))
			$_SESSION["invalidPassword"] = $invalidPasswordError;
		header("Location:../Pages/login.php");
		exit();
	}
	else {
		header("Location:../Pages/appointment.php");
		exit();
	}
?>





