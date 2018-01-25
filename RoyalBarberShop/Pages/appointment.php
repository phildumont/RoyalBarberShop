<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	if ($_SESSION["loggedin"] == "loggedout"){
		header("Location:login.php");
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Royal Baber Shop</title>
	<link rel="Stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../Content/Scripts/jquery.js"></script>
	<link rel="Stylesheet" href="../Content/Stylesheets/timeBoxes.css">
</head>
<body class="mainBackground">
	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			
			include("../Content/Display/navbar.php");
			
			//Get the services information
			$serviceSql = "SELECT name, price, service_id FROM service";
			$serviceRes = $conn->query($serviceSql) or die ("cant connect");
			$services = array(array());
			$i = 0;
			
			while ($row = mysqli_fetch_array($serviceRes)){
				$name = $row[0];
				$price = $row[1];
				$service_id = $row[2];
				$services[$i][0] = $name;
				$services[$i][1] = $price;
				$services[$i][2] = $service_id;
				$i++;
			}
			
			//Get the barbers information
			$barberSql = "SELECT first_name, last_name, picture, barber_id FROM barber";
			$barberRes = $conn->query($barberSql) or die ("cant connect");
			$barbers = array(array());
			$j = 0;
			
			while ($row = mysqli_fetch_array($barberRes)){
				$barber_fname = $row[0];
				$barber_lname = $row[1];
				$barber_id = $row[3];
				$barber_picture = $row[2];

				$barbers[$j][0] = $barber_fname;
				$barbers[$j][1] = $barber_lname;
				$barbers[$j][2] = $barber_picture;
				$barbers[$j][3] = $barber_id;
				$j++;
			}
			
			$minDate = '20'.date("y").'-'.date("m")."-".date("d");
			$maxMonth = date("m", strtotime('+2 months'));
			$maxDate = '20'.date("y").'-'.$maxMonth."-".date("d");
			
			if (isset($_SESSION["formInfo"])){
				$formInfo = $_SESSION["formInfo"];
				unset($_SESSION["formInfo"]);
				$barber = $formInfo["barber"];
				$service = $formInfo["service"];
				$appDate = $formInfo["appDate"];
			}
			else {
				$formInfo["service"] = "";
				$formInfo["barber"] = "";
				$formInfo["appDate"] = "";
				$appDate = "";
			}
			if (isset($_SESSION["displayTime"])){
				if ($_SESSION["displayTime"] == "true"){
					$appDay = date('D', strtotime($appDate));
					$displayTime = "true";
					unset($_SESSION["displayTime"]);
				}
				else {
					$displayTime = "false";
				}
			}
			else {
				$displayTime = "false";
			}
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center">Rendez-vous</h1>
	
	<div class="container-full container-fluid">
		<form action="../Controllers/appointmentController.php" method="post">
		<div class="row">
			<div class="col-lg-1 col-sm-4 col-xs-2"></div>
			<div class="col-lg-3 col-sm-8 col-xs-10 selection">
				<h3>Service</h3>
				<h4>Veuillez choisir un service</h4>
				<ul class="app_ul">
					<?php
						$i = 0;
						foreach ($services as $serv){
							if ($formInfo["service"] == $serv[2])
								$service_selection = 'checked="checked"';
							else
								$service_selection = "";
							echo '<li class="service_list"><input type="radio" name="service" id="'.$i.'" value="'.$serv[2].'"'.$service_selection.' required/>
								<label for="'.$i.'">'.$serv[0].': '.$serv[1].'$</li></label>';
							$i++;
						}
					?>
				</ul>
			</div>
			<div class="hidden-lg col-sm-4 col-xs-2"></div>
			<div class="col-lg-4 col-sm-8 col-xs-10 selection">
				<h3>Barbier</h3>
				<h4>Veuillez choisir un barbier</h4>
				<ul class="app_ul">
					<?php
						foreach ($barbers as $barb){
							if ($formInfo["barber"] == $barb[3])
								$barber_selection = 'checked="checked"';
							else
								$barber_selection = "";
							echo 
							'<li class="barber_list"><input type="radio" name="barber" id="'.$i.'" class="barber_radio" value="'.$barb[3].'"'.$barber_selection.' required/>
								<label for="'.$i.'"><img src="'.$barb[2].'" class="select_barber_img"/>'.
								$barb[0].' '.$barb[1].'</label>
							</li>';
							$i++;
						}
					?>
				</ul>
			</div>
			<div class="hidden-lg col-sm-4 col-xs-2"></div>
			<div class="col-lg-3 col-sm-8 col-xs-10 selection">
				<h3>Date</h3>
				<h4>Veuillez choisir la date</h4>
				<?php
					$appDateValue = $formInfo["appDate"];
				?>
					<input type="date" name="appDate" id='appDate' min="<?php echo $minDate ?>" max="<?php echo $maxDate ?>" value="<?php echo $appDateValue ?>" required/><br>
					<?php
						if (isset($_SESSION["barberNotAvailable"])){
							echo $_SESSION["barberNotAvailable"];
							unset($_SESSION["barberNotAvailable"]);
						}
					?>
					<br>
					<input type="submit" value="Continue" class="custom_button"/>
			</div>
		</div>
		
		</form>
	</div>
	<!-- Open modal -->
	<button type="button" data-toggle="modal" data-target="#timeModal" style="display:none" id="openTimeModal">Open Modal</button>
	<?php
		//Modal
		if ($displayTime == "true"){
			include("../Content/Display/modalTime.php");
			?>
				<script>
					document.getElementById("openTimeModal").click();
				</script>
			<?php
		}
	?>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>
