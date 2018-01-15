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
	
	<script>
		function dateVisible(){
			var radio = document.getElementsByClassName("barber_radio");
			if (radio.checked == true){
				$("#appDate").hide();
			}
			else {
				$("#appDate").show();
			}
		}
	</script>
</head>
<body class="mainBackground">
<div class="wrapper">
	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			
			include("../Content/Display/navbar.php");
			
			//Get the services information
			$serviceSql = "SELECT name, price FROM service";
			$serviceRes = $conn->query($serviceSql) or die ("cant connect");
			$services = array(array());
			$i = 0;
			
			while ($row = mysqli_fetch_array($serviceRes)){
				$name = $row[0];
				$price = $row[1];
				$services[$i][0] = $name;
				$services[$i][1] = $price;
				$i++;
			}
			
			//Get the barbers information
			$barberSql = "SELECT first_name, last_name, picture FROM barber";
			$barberRes = $conn->query($barberSql) or die ("cant connect");
			$barbers = array(array());
			$j = 0;
			
			while ($row = mysqli_fetch_array($barberRes)){
				$barber_fname = $row[0];
				$barber_lname = $row[1];
				$barber_picture = imagecreatefromstring($row[2]);
				ob_start();
				imagejpeg($barber_picture, null, 80);
				$picture_data = ob_get_contents();
				ob_end_clean();
				
				$barbers[$j][0] = $barber_fname;
				$barbers[$j][1] = $barber_lname;
				$barbers[$j][2] = $picture_data;
				$j++;
			}
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center">Royal Barber Shop</h1>
	
	<div class="container">
		<form action="" method="post">
		<div class="row">
			<div class="col-sm-4 selection">
				<h3 class="no_margin_top">Service</h3>
				<ul class="app_ul">
					<?php
						foreach ($services as $service){
							echo '<li>'.$service[0].': '.$service[1].'&nbsp;&nbsp;<input type="radio" name="service" class="custom_radio"/></li>';
						}
					?>
				</ul>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-4 selection">
				<h3 class="no_margin_top">Barbier</h3>
				<ul class="app_ul">
					<?php 
						foreach ($barbers as $barber){
							echo 
							'<li class="barber_list">
								<img src="data:image/jpg;base64,'.base64_encode($barber[2]).'"  class="select_barber_img"/>&nbsp;&nbsp;'.
								$barber[0].' '.$barber[1].'&nbsp;&nbsp;<input type="radio" name="barber" class="custom_radio" class="barber_radio" onClick="dateVisible();"/>
							</li>';
						}
					?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<input type="date" id="appDate" style="display: none;">
			</div>
		</div>
		<div class="text-center"><a href="appointmentDate.php"><input type="button" value="Continue" class="custom_button"/></a></div>
		</form>
	</div>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>