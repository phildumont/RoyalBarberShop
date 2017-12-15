<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php"); 
?>
<html lang="en">
<head>
	<title>Royal Barber Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<link rel="stylesheet" type="text/css" href="../Content/Stylesheets/style.css" />
	<script type="text/javascript" src="../Content/Scripts/jquery.js"></script>
</head>
<body class="mainBackground wrapper">
<div class="wrapper">
	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "contact";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
	<h2 class="text-center">Contact</h2>
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<i class="fa fa-map-marker" style="font-size:48px;"><span style="font-size:24pt;color:black;">Adresse</span></i><br><br>
					<span style="font-size:15pt;color:black;">3818 boul. Taschereau<br>
					Greenfield Park, Québec, Canada<br>
					J4V 2H9</span>
				
				<br><br>
				<i class="fa fa-phone" style="font-size:48px;">
					<a href="tel:+14506723818"class="contact_link" target="_blank">(450) 672-3818</a>
				</i>
				<br><br>
				<i class="fa fa-facebook-square" style="font-size:48px;color:#3b5998">
					<a href="https://www.facebook.com/royalbarbershop450/" class="contact_link" target="_blank">Aimez notre page Facebook!</a>
				</i>
				<br><br>
				<img src="../Content/Images/Contact/instagram.png" style="width:48px;height:48px;"></img>
				<a href="https://www.instagram.com/royal_barber_shop_/" class="contact_link fa" target="_blank">Suivez-nous sur Instagram!</a>
			</div>
			<div class="col-sm-4">
				<div id="map" style="width:400px;height:400px;background:yellow"></div>
			</div>
		</div>
	</div>
	<script src="../Content/Scripts/mapScript.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNaW_GXb74cTam2QQO6uJQGK0MSZ71PJo&callback=myMap"></script>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>