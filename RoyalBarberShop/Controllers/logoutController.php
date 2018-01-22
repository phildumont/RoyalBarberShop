<?php
	session_start();
	$_SESSION["loggedin"] = "loggedout";
	unset($_SESSION["fullname"]);
	unset($_SESSION["email"]);
	unset($_SESSION["user_info"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["barber"]);
	
	header("Location: ../Pages/Index.php");
?>