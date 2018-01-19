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
				$barber_picture = imagecreatefromstring($row[2]);
				ob_start();
				imagejpeg($barber_picture, null, 80);
				$picture_data = ob_get_contents();
				ob_end_clean();
				
				$barbers[$j][0] = $barber_fname;
				$barbers[$j][1] = $barber_lname;
				$barbers[$j][2] = $picture_data;
				$barbers[$j][3] = $barber_id;
				$j++;
			}
			
			$minDate = '20'.date("y").'-'.date("m")."-".date("d");
			$maxMonth = date("m", strtotime('+2 months'));
			$maxDate = '20'.date("y").'-'.$maxMonth."-".date("d");
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center">Rendez-vous</h1>
	
	<div class="container-full">
		<form action="../Controllers/appointmentController.php" method="post">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-3 ">
				<h3>Service</h3>
				<h4>Veuillez choisir un service</h4>
				<ul class="app_ul">
					<?php
						$i = 0;
						foreach ($services as $service){
							if (isset($_POST["barber"]) && $_POST["service"] == $service[2])
								$service_selection = 'checked="checked"';
							else
								$service_selection = "";
							echo '<li class="service_list"><input type="radio" name="service" id="'.$i.'" value="'.$service[2].'"'.$service_selection.' required/>
								<label for="'.$i.'">'.$service[0].': '.$service[1].'$</li></label>';
							$i++;
						}
					?>
				</ul>
			</div>
			
			<div class="col-sm-4 ">
				<h3>Barbier</h3>
				<h4>Veuillez choisir un barbier</h4>
				<ul class="app_ul">
					<?php
						foreach ($barbers as $barber){
							if (isset($_POST["barber"]) && $_POST["barber"] == $barber[3])
								$barber_selection = 'checked="checked"';
							else
								$barber_selection = "";
							echo 
							'<li class="barber_list"><input type="radio" name="barber" id="'.$i.'" class="barber_radio" value="'.$barber[3].'"'.$barber_selection.' required/>
								<label for="'.$i.'"><img src="data:image/jpg;base64,'.base64_encode($barber[2]).'"  class="select_barber_img"/>'.
								$barber[0].' '.$barber[1].'</label>
							</li>';
							$i++;
						}
					?>
				</ul>
			</div>
			<div class="col-sm-3 ">
				<h3>Date</h3>
				<h4>Veuillez choisir la date</h4>
				<?php
					if (isset($_POST["appDate"])){
						$appDateValue = 'value="'.$_POST["appDate"].'"';
					}
					else {
						$appDateValue = "";
					}
				?>
					<input type="date" name="appDate" id='appDate' min="<?php echo $minDate ?>" max="<?php echo $maxDate ?>" <?php echo $appDateValue ?>required/><br>
					<?php
						if (isset($_SESSION["barberNotAvailable"])){
							echo $_SESSION["barberNotAvailable"];
							unset($_SESSION["barberNotAvailable"]);
						}
					?>
			</div>
		</div>
		<div class="text-center"><input type="submit" value="Continue" class="custom_button"/></div>
		</form>
	</div>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>