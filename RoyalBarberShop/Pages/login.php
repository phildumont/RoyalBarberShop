<!DOCTYPE html>
<?php 
	session_start();
	
	$login_errors = [];
	if (isset($_SESSION["login_errors"])){
		$login_errors = $_SESSION["login_errors"];
		unset($_SESSION["login_errors"]);
	}
	
	include("../Content/Display/hideElements.php");
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
		<h2 class="text-center">Log in</h2>
		<div class="container">
			<div class="col-sm-4"></div>
			<form class="col-sm-4" action="../Controllers/loginController.php" method="post">
				<table>
					<tr>
						<td><label for="emp">Êtes-vous un employé?</label></td>
						<td><input type="checkbox" name="emp" /></td>
					</tr>
					<tr>
						<td><label for="email">Adresse courriel:</label></td>
						<td><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td><label for="password">Mot de passe:</label></td>
						<td><input type="password" name="password" /></td>
					</tr>
				</table>
				<ul>
					<?php 
						foreach($login_errors as $item){
							echo "<li>".$item."</li>";
						}
					?>
				</ul>
				<center><input type="submit" value="Login" class="custom_button"/></center><br>
				<center><a href="signup.php"><input type="button" value="Créer un compte" class="custom_button" style="width:120px"/></a></center>
			</form>
			
		</div>
	<!--Body end -->
</body>
</html>












