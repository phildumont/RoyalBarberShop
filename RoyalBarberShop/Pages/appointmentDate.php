<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	$flag = false;
	if (isset($_SESSION["appointments"])){
		$appointments = $_SESSION["appointments"];
		$flag = true;
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="mainBackground">
<div class="wrapper">
	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Date et heure</h1>
	<h3 class="subtitle text-center">Veuillez choisir la date et l'heure du rendez-vous</h3>
	
	<div class="container-full">
		<form action="" method="post">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10 selection">
				<!--date start -->
				<?php
					if ($flag == true){
						foreach ($appointments as $appointment){
							echo $appointment[0];
						}
					}
				?>
				<!-- date end -->
			</div>
		</div>
		<div class="text-center"><input type="button" value="Continue" class="custom_button"/></div>
		</form>
	</div>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>