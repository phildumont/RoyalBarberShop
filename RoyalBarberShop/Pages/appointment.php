<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<li><a href="Index.php">Home</a></li>
			<li class="active"><a href="#">Rendez-vous</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Mon compte/My Account</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center">Royal Barber Shop</h1>
	
	<div class="container">
		<form action="" method="post">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 selection">
				<h3 class="no_margin_top">Service</h3>
				<ul class="app_ul">
					<li>Service 1&nbsp;&nbsp;&nbsp;&nbsp;Price 1&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
					<li class="description">Description du type de service 1. <br> Description for service 1.</li>
					<li>Service 2&nbsp;&nbsp;&nbsp;&nbsp;Price 2&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
					<li class="description">Description du type de service 2. <br> Description for service 2.</li>
					<li>Service 3&nbsp;&nbsp;&nbsp;&nbsp;Price 3&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
					<li class="description">Description du type de service 3. <br> Description for service 3.</li>
				</ul>
			</div>
			<div class="col-sm-4 selection">
				<h3 class="no_margin_top">Barbier</h3>
				<ul class="app_ul">
					<li><img src="../Content/Images/Appointment/_MG_3111.jpg" alt="image1" class="select_barber_img">
						Barber1&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
					<li><img src="../Content/Images/Appointment/_MG_3111.jpg" alt="image2" class="select_barber_img">
						Barber2&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
					<li><img src="../Content/Images/Appointment/_MG_3111.jpg" alt="image3" class="select_barber_img">
						Barber3&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>
				</ul>
			</div>
		</div>
		<div class="text-center"><input type="button" value="Continue" class="custom_button"/></div>
		</form>
	</div>
</body>
</html>