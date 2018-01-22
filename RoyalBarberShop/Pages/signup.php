<!DOCTYPE html>
<?php 
	session_start();
	include("../Content/Display/hideElements.php"); 
	
	$signup_errors = [];
	
	if (isset($_SESSION["signup_errors"])){
		$signup_errors = $_SESSION["signup_errors"];
		unset($_SESSION["signup_errors"]);
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
</head>
<body class="mainBackground">

	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "signup";
		include("../Content/Display/navbar.php"); 
	?>
	<!-- Nav bar end -->
	<!-- Body start -->
		<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
		<h2 class="text-center">Sign up</h2>
		<div class="container">
			<div class="col-sm-4"></div>
			<form class="col-sm-4" action="../Controllers/signUpController.php" method="post">
				<table>
					<tr>
						<td><label for="fname">Prénom:</label></td>
						<td><input type="text" name="fname" value="<?php if(!empty($_POST["email"]))echo $_POST["fname"]?>" required /></td>
					</tr>
					<tr>
						<td><label for="lname">Nom de famille:</label></td>
						<td><input type="text" name="lname" value="<?php if(!empty($_POST["email"]))echo $_POST["lname"]?>" required /></td>
					</tr>
					<tr>
						<td><label for="email">Adresse courriel:</label></td>
						<td><input type="email" name="email" value="<?php if(!empty($_POST["email"]))echo $_POST["email"]?>" required /></td>
					</tr>
					<tr>
						<td><label for="password">Mot de passe:</label></td>
						<td><input type="password" name="password" required /></td>
					</tr>
					<tr>
						<td><label for="confirm">Confirmer le mot de passe:</label></td>
						<td><input type="password" name="confirm" required /></td>
					</tr>
					</table>
					<ul class="error_message">
					<?php 
						foreach($signup_errors as $item){
							echo "<li>".$item."</li>";
						}
					?>
					</ul>
				<center><input type="submit" value="Sign up" class="custom_button"></center>
			</form>
		</div>
	<!--Body end -->
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>