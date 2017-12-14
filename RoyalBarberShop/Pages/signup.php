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
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
</head>
<body class="mainBackground">
	<!-- Nav bar start-->
		<?php include("../Content/Display/navbar.php") ?>
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
						<td><input type="text" name="fname" required /></td>
					</tr>
					<tr>
						<td><label for="lname">Nom de famille:</label></td>
						<td><input type="text" name="lname" required /></td>
					</tr>
					<tr>
						<td><label for="email">Adresse courriel:</label></td>
						<td><input type="text" name="email" required /></td>
					</tr>
					<tr>
						<td><label for="password">Mot de passe:</label></td>
						<td><input type="password" name="password" required /></td>
					</tr>
					<tr>
						<td><label for="confirm">Confirmer le mot de passe:</label></td>
						<td><input type="password" name="confirm" required /></td>
					</tr>
					<?php 
						foreach($signup_errors as $item){
							echo "<tr><td>".$item."</td></tr>";
						}
					?>
				</table>
				<center><input type="submit" value="Sign up" class="custom_button"></center>
			</form>
		</div>
	<!--Body end -->
</body>
</html>