<!DOCTYPE html>
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
			<li><a href="#">Home</a></li>
			<li><a href="appointment.php">Rendez-vous</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Mon compte/My Account</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- Nav bar end -->
	
	<!-- Body start -->
		<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
		<h2 class="text-center">Sign up</h2>
		<div class="container">
			<div class="col-sm-4"></div>
			<form class="col-sm-4" action="../Controllers/signUpController.php" method="post">
				<table>
			<form class="col-sm-4">
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
				</table>
				<center><input type="submit" value="Sign up" class="custom_button"></center>
			</form>
		</div>
	<!--Body end -->
</body>
</html>