<!DOCTYPE html>
<?php session_start(); ?>
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
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a href="#"><img src="../Content/Images/logo.png" alt="logo" class="inverted  nav_logo"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="appointment.php">Rendez-vous</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Mon compte/My Account</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- Nav bar end -->
	<?php
		$emptyEmailError = "";
		$invalidEmailError = "";
		$emailNotFoundError = "";
		$emptyPasswordError = "";
		$invalidPasswordError = "";
		
		if (isset($_SESSION["emptyEmail"])){
			$emptyEmailError = $_SESSION["emptyEmail"];
			if ($_SESSION["emptyEmail"] == "")
				$emptyEmailError = "";
		}
			
		if (isset($_SESSION["invalidEmail"])){
			$invalidEmailError = $_SESSION["invalidEmail"];
			if ($_SESSION["invalidEmail"] == "")
				$invalidEmailError = "";
		}

		if (isset($_SESSION["emailNotFound"])){
			$emailNotFoundError = $_SESSION["emailNotFound"];
			if ($_SESSION["emailNotFound"] == "")
			$invalidEmailError = "";
		}

		if (isset($_SESSION["emptyPassword"])){
			$emptyPasswordError = $_SESSION["emptyPassword"];
			if ($_SESSION["emptyPassword"] == "")
				$emptyPasswordError = "";
		}
		
		if (isset($_SESSION["invalidPassword"])){
			$invalidPasswordError = $_SESSION["invalidPassword"];
			if ($_SESSION["invalidPassword"] == "")
				$invalidPasswordError = "";
		} 
	?>
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
					<tr>
						<td><?php echo $emptyEmailError;?></td>
					</tr>
					<tr>
						<td><?php echo $invalidEmailError;?></td>
					</tr>
					<tr>
						<td><?php echo $emailNotFoundError;?></td>
					</tr>
					<tr>
						<td><?php echo $emptyPasswordError;?></td>
					</tr>
					<tr>
						<td><?php echo $invalidPasswordError;?></td>
					</tr>
				</table>
				<center><input type="submit" value="Login" class="custom_button"/></center><br>
				<center><a href="signup.php"><input type="button" value="Créer un compte" class="custom_button" style="width:120px"/></a></center>
			</form>
			
		</div>
	<!--Body end -->
</body>
</html>












