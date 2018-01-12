<?php
	session_start();
	$_SESSION["loggedin"] = "loggedout";
	unset($_SESSION["fullname"]);
	unset($_SESSION["user_info"]);
	
	header("Location: ../Pages/Index.php");
?>