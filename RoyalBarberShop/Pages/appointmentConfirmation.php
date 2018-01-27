<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	setlocale(LC_ALL, 'FR');
	
	$barber_id = $_POST["barber"];
	$time = $_POST["time"];
	$service_id = $_POST["service"];
	$date = $_POST["appDate"];
	$month = utf8_encode(strftime("%B", strtotime($date)));
	$day = strftime("%#d", strtotime($date));
	$year = '20'.date("y", strtotime($date));
	$convertedDate = $day.' '.$month.', '.$year;
	
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
					<li>Date: <?php echo $convertedDate ?></li>
					<li>Heure: <?php echo $time ?></li>
					<li>Service: <?php echo $service ?></li>
					<li>Barbier: <?php echo $barber ?></li>
				</ul>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-6">
				<form action="appointmentConfirmation.php" method="post">
					<input type="hidden" value="yes" name="confirmed">
					<input type="hidden" value="<?php echo $barber_id ?>" name="barber">
					<input type="hidden" value="<?php echo $service_id ?>" name="service">
					<input type="hidden" value="<?php echo $date ?>" name="appDate">
					<input type="hidden" value="<?php echo $time ?>" name="time">
					<div class="text-center"><input type="submit" value="Confirmer le rendez-vous" class="custom_button" style="width:auto"></div>
				</form>
			</div>
		</div>
	</div>

	<!-- Added Modal -->
	<div id="addedModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation</h4>
				</div>
				<div class="modal-body text-center">
					<h2>Votre rendez-vous a été enregistré!</h2>	
				</div>
				<div class="modal-footer">
					<a href="index.php"><input type="button" class="btn btn-default" value="Fermer"></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Denied Modal -->
	<div id="deniedModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Impossible de prendre le rendez-vous</h4>
				</div>
				<div class="modal-body text-center">
					<h2>Vous avez manqué trop de rendez-vous, vous ne pouvez plus en réserver.</h2>
					<h2>Merci de contacter Royal Barber Shop</h2>
				</div>
				<div class="modal-footer">
					<a href="index.php"><input type="button" class="btn btn-default" value="Fermer"></a>
				</div>
			</div>
		</div>
	</div>
	
	<?php 
		if (isset($_POST["confirmed"])){
			$customerSql = "SELECT customer_id, strikes FROM customer WHERE  email='".$_SESSION["email"]."'";
			$customerRes = $conn->query($customerSql) or die ("cant connect");
			$customerArr = mysqli_fetch_array($customerRes);
			$customer_id = $customerArr[0];
			echo "<button type='button' data-toggle='modal' data-target='#addedModal' style='display:none' id='openAddedModal' data-backdrop='static' data-keyboard='false'>Open Modal</button>";
			echo "<button type='button' data-toggle='modal' data-target='#deniedModal' style='display:none' id='openDeniedModal' data-backdrop='static' data-keyboard='false'>Open Modal</button>";
			
			echo $customerArr[1];
			if (intval($customerArr[1]) >= 3){
				echo "<script>document.getElementById('openDeniedModal').click();</script>";
			}
			else {
				$insertApp = "INSERT INTO appointment VALUES (0, '".$date."', '".$time."', '".$service_id."', '".$barber_id."', '".$customer_id."')";
				if (mysqli_query($conn, $insertApp) === true){
					echo "<script>document.getElementById('openAddedModal').click();</script>";
					$msg = "testEmail";
					$subject = "Test Email";
					mail("phildumont8@gmail.com", $subject, $msg);
				}
			}
		}
	?>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>