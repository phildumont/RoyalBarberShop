<?php
	session_start();
	$_SESSION["loggedin"] = "loggedout";
	unset($_SESSION["fullname"]);
	
	
	header("Location: ../Pages/Index.php");
?>