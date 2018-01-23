<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	if (isset($_SESSION["formInfo"])){
		$formInfo = $_SESSION["formInfo"];
		unset($_SESSION["formInfo"]);
		$barber = $formInfo["barber"];
		$service = $formInfo["service"];
		$appDate = $formInfo["appDate"];
		$appDay = date('D', strtotime($appDate));
	}
	
	$flag = 0;
	if (isset($_SESSION["appointments"])){
		//Array containing all the current appointments booked for the chosen day
		$appointments = $_SESSION["appointments"];
		$flag = 1;
	}
	if ($appointments[0] == null){
		$flag = 0;
	}
	
	//Get timeframes
	$scheduleSql = "SELECT open, close  FROM schedule WHERE day ='".$appDay."'";
	$scheduleRes = $conn->query($scheduleSql) or die("cant connect");
	$schedule = mysqli_fetch_array($scheduleRes);
	$open = date("H:i", strtotime($schedule["open"]));
	$close = date("H:i", strtotime($schedule["close"]));
	
	$timeIndex = $open;
	$index = 0;
	$timeframes = array();
	while ($timeIndex != $close){
		$timeframes[$index] = $timeIndex;
		$timeIndex = date('H:i',strtotime('+30 minutes',strtotime($timeIndex)));
		$index++;
	}
	//Remove booked appointments from $timeFrames
	if ($flag == 0){
		$availableTimes = $timeframes;
	}
	else {
		$availableTimes = array();
		$availableIndex = 0;
		
		for ($i=0;$i<count($timeframes);$i++){
			for ($j=0;$j<count($appointments);$j++){
				$currentAppTime = date('H:i', strtotime($appointments[$j][0]));
				if ($timeframes[$i] != $currentAppTime){
					$isthere = false;
				}
				else {
					$isthere = true;
					break;
				}
			}
			if (!$isthere){
				$availableTimes[$availableIndex] = $timeframes[$i];
				$availableIndex++;
			}
		}
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
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/timeBoxes.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="mainBackground">

	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Heure</h1>
	<h3 class="subtitle text-center margin_bottom_30">Veuillez choisir l'heure du rendez-vous</h3>
	<h4 class="text-center">Date du rendez-vous: <?php echo $appDate ?></h4>
	
	<div class="container-full">
		<form action="appointmentConfirmation.php" method="post">
		<div class="row">
			<div class="col-sm-3"></div>
				<!-- time start -->
				<?php
					$stampsIndex = 0;
					$maxTimeframes = count($availableTimes);
					//1
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 4 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'" required>
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//2
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 8 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//3
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 12 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//4
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 16 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//5
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 20 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//6
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 24 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
				?>
				<!-- time end -->
			</div>
		</div>
		<input type="hidden" name="barber" value="<?php echo $barber ?>">
		<input type="hidden" name="service" value="<?php echo $service ?>">
		<input type="hidden" name="appDate" value="<?php echo $appDate ?>">
		<div class="text-center margin_top_30"><input type="submit" value="Continue" class="custom_button"/></div>
		</form>
	</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>