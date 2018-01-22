<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	$barber_id = $_POST["barber"];
	$time = $_POST["time"];
	$service_id = $_POST["service"];
	$date = $_POST["appDate"];
	
	$barberSql = "SELECT first_name, last_name FROM barber WHERE barber_id='".$barber_id."'";
	$barberRes = $conn->query($barberSql) or die ("cant connect");
	$barberArray = mysqli_fetch_array($barberRes);
	$barber = $barberArray[0].' '.$barberArray[1];
	
	$serviceSql = "SELECT name, price FROM service WHERE service_id='".$service_id."'";
	$serviceRes = $conn->query($serviceSql) or die ("cant connect");
	$serviceArray = mysqli_fetch_array($serviceRes);
	$service = $serviceArray[0].', '.$serviceArray[1].'$';
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

	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end-->
	<h1 class="myTitle text-center">Confirmation</h1>
	<h2 class="subtitle text-center margin_bottom_30">Veuillez confirmer ces informations</h2>
	<div class="container">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-6">
				<ul class="app_ul">
					<li>Date: <?php echo $date ?></li>
					<li>Heure: <?php echo $time ?></li>
					<li>Service: <?php echo $service ?></li>
					<li>Barbier: <?php echo $barber ?></li>
				</ul>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-6">
				<form action="appointmentBooked.php" method="post">
					<input type="hidden" value="<?php echo $barber_id ?>" name="barber">
					<input type="hidden" value="<?php echo $service_id ?>" name="service">
					<input type="hidden" value="<?php echo $date ?>" name="date">
					<input type="hidden" value="<?php echo $time ?>" name="time">
					<div class="text-center"><input type="submit" value="Confirmer le rendez-vous" class="custom_button" style="width:auto"></div>
				</form>
			</div>
		</div>
	</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>