<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	//Check for access
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] != "loggedin"){
			header("Location: index.php");
		}
		if (isset($_SESSION["barber"])){
			if ($_SESSION["barber"] != "yes"){
				header("Location: index.php");
			}
		}
		else {
			header("Location: index.php");
		}
	}
	else {
		header("Location: index.php");
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="mainBackground">
	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "myaccount";
		include("../Content/Display/navbar.php");
	?>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>