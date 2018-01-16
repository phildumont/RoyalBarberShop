<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
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
			
			$barber_id = $_POST["barber"];
			$appDate = $_POST["appDate"];
			$appDay = date('D', strtotime($appDate));

			$daysSql = "SELECT barber_day FROM barber WHERE barber_id = ".$barber_id;
			$daysRes = $conn->query($daysSql) or die ("cant connect");
			$daysArray = mysqli_fetch_array($daysRes);
			$days = $daysArray["barber_day"];
			
			//m monday, t tuesday, w wednesday, r thursday, f friday, s saturday, u sunday
			$monday=false;$tuesday=false;$wednesday=false;$thursday=false;$friday=false;$saturday=false;$sunday=false;$available=false;
			
			for ($i=0;$i<strlen($days);$i++){
				$char = substr($days, $i, 1);
				switch ($char){
					case 'M' || 'm':
						$monday = true;
						break;
					case 'T' || 'm':
						$tuesday = true;
						break;
					case 'W' || 'w':
						$wednesday = true;
						break;
					case 'R' || 'r':
						$thursday = true;
						break;
					case 'F' || 'f':
						$friday = true;
						break;
					case 'S' || 's':
						$saturday = true;
						break;
					case 'U' || 'u':
						$sunday = true;
						break;
				}
			}
			if ($appDay == 'Mon' || $monday == true){
				$available = true;
			}
			else if ($appDay == 'Tue' || $tuesday == true){
				$available = true;
			}
			else if ($appDay == 'Wed' || $wednesday == true){
				$available = true;
			}
			else if ($appDay == 'Thu' || $thursday == true){
				$available = true;
			}
			else if ($appDay == 'Fri' || $friday == true){
				$available = true;
			}
			else if ($appDay == 'Sat' || $saturday == true){
				$available = true;
			}
			else if ($appDay == 'Sun' || $sunday == true){
				$available = true;
			}
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
					if ($available == true){
						//Display timeframes
					}
					else {
						//Ask to pick another date
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