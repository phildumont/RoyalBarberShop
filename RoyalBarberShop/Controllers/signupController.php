<?php
	session_start();
	include("../Pages/connection.inc");

	//Form fields
	$fname = $_POST["fname"];
	$lname  = $_POST["lname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	$hashcode = md5('thisguyisgood').md5($email).md5($password).md5('yesyesdovisio').md5('isthatsecureamin?');

	//Sql statement to insert
	$addUserSql = "INSERT INTO customer VALUES (0, '".$fname."', '".$lname."', "."'".$email."', '".$hashcode."')";

	$flag = 0;
	
	//Check if email exists
	$checkEmailSql = "SELECT email, customer_fname, customer_lname FROM customer WHERE email ='".$email."'";
	$checkEmailRes = $conn->query($checkEmailSql) or die("can't connect");
	$checkEmail = mysqli_fetch_array($checkEmailRes);
	
	if (mysqli_num_rows($checkEmailRes) > 0){
		$emailExistsError = "Un compte existe déjà avec cette adresse courriel.";
	}
	//Check if valid email address
	else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email)){
		$flag = 0;
		$invalidEmailError = "Veuillez entrer une adresse courriel valide.";
	}
	//Check if passwords match
	if ($password != $confirm){
		$flag = 0;
		$passwordNotMatchError = "Les mots de passes doivent être identique.";
	}
	else if (mysqli_query($conn, $addUserSql) === true){
		$flag = 1;
	}
	else {
		$flag = 0;
		$insertError = "Une erreur est survenu, le compte n'as pu être créé.";
	}
	
	//Put error messages in array
	$signup_errors = [];
	if (isset($emailExistsError)){
		$signup_errors[] = $emailExistsError;
	}
	if (isset($invalidEmailError)){
		$signup_errors[] = $invalidEmailError;
	}
	if (isset($passwordNotMatchError)){
		$signup_errors[] = $passwordNotMatchError;
	}
	if (isset($insertError)){
		$signup_errors[] = $insertError;
	}
	
	$_SESSION["signup_errors"] = $signup_errors;
	
	//Redirect
	if ($flag == 0){
		header("Location:../Pages/signup.php");
	}
	else if ($flag == 1){
		$_SESSION["loggedin"] = "loggedin";
		$_SESSION["fullname"] = $fname." ".$lname;
		header("Location:../Pages/appointment.php");
	}

?>