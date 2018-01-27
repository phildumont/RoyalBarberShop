<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	setlocale(LC_ALL, 'FR');
	$today = '20'.date("y").'-'.date("m")."-".date("d");
	
	//Check for access
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] != "loggedin"){
			header("Location: index.php");
		}
		if (isset($_SESSION["barber"])){
			if ($_SESSION["barber"] != "yes"){
				header("Location: index.php");
			}
		}
		else {
			header("Location: index.php");
		}
	}
	else {
		header("Location: index.php");
	}
	
	//Get the barber's id
	$email = $_SESSION["email"];
	$barberSql = "SELECT barber_id FROM barber WHERE email='".$email."'";
	$barberRes = $conn->query($barberSql) or die ("cant connect");
	$barber = mysqli_fetch_array($barberRes);
	$barber_id = $barber["barber_id"];
	
	//Retrieve appointments
	$appSql = "SELECT appointment_date, appointment_time, service_id, customer_id, appointment_id, attended FROM appointment 
			WHERE barber_id=".$barber_id." AND appointment_date >= '".$today."'";
	$appRes = $conn->query($appSql);
	$apps = array(array());
	$apps_flag = "false";
	$todayApps = array(array());
	$futureApps = array(array());
	$todayApps_flag = "false";
	$futureApps_flag = "false";
	$i = 0;
	$ti = 0;
	$fi = 0;
	
	while ($row = mysqli_fetch_array($appRes)){
		$month = utf8_encode(strftime("%B", strtotime($row[0])));
		$day = strftime("%#d", strtotime($row[0]));
		$year = '20'.date("y", strtotime($row[0]));
		$apps[$i]["date"] = $day.' '.$month.', '.$year;
		$apps[$i]["time"] = date("H:i", strtotime($row[1]));
		$apps[$i]["service_id"] = $row[2];
		$apps[$i]["customer_id"] = $row[3];
		$apps[$i]["normalDate"] = $row[0];
		$apps[$i]["id"] = $row[4];
		$apps[$i]["attended"] = $row[5];
		$i++;
		$apps_flag = "true";
	}
	
	//Find service and customer for the appointments
	if ($apps_flag == "true"){
		foreach ($apps as $app){
			//Get service
			$serviceSql = "SELECT name, price FROM service WHERE service_id=".$app["service_id"];
			$serviceRes = $conn->query($serviceSql);
			$serviceInfo = mysqli_fetch_array($serviceRes);
			$app["service"] = $serviceInfo[0].', '.$serviceInfo[1].'$';
			
			//Get customer
			$customerSql = "SELECT customer_fname, customer_lname, email FROM customer WHERE customer_id=".$app["customer_id"];
			$customerRes = $conn->query($customerSql);
			$customerInfo = mysqli_fetch_array($customerRes);
			$app["customer_name"] = $customerInfo[0].' '.$customerInfo[1];
			$app["customer_email"] = $customerInfo[2];
			
			//Find today's appointment to mark if customer showed up
			if ($app["normalDate"] == $today){
				$todayApps[$ti]["date"] = $app["date"];
				$todayApps[$ti]["time"] = $app["time"];
				$todayApps[$ti]["service"] = $app["service"];
				$todayApps[$ti]["customer_name"] = $app["customer_name"];
				$todayApps[$ti]["customer_email"] = $app["customer_email"];
				$todayApps[$ti]["id"] = $app["id"];
				$todayApps[$ti]["attended"] = $app["attended"];
				$todayApps[$ti]["customer_id"] = $app["customer_id"];
				$ti++;
				$todayApps_flag = "true";
			}
			//Find future appointments
			else if ($app["normalDate"] > $today){
				$futureApps[$fi]["date"] = $app["date"];
				$futureApps[$fi]["time"] = $app["time"];
				$futureApps[$fi]["service"] = $app["service"];
				$futureApps[$fi]["customer_name"] = $app["customer_name"];
				$futureApps[$fi]["customer_email"] = $app["customer_email"];
				$fi++;
				$futureApps_flag = "true";
			}
		}
	}
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
	<link rel="Stylesheet" href="../Content/Stylesheets/timeBoxes.css">
</head>
<body class="mainBackground">
	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "assignedApp";
		include("../Content/Display/navbar.php");
	?>
	<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3 class="text-center">Rendez-vous d'aujourd'hui</h3>
			
			<ul class="user_info">
			<?php
				if ($todayApps_flag == "true"){
					foreach ($todayApps as $app){
						echo "<form action='assignedAppointments' method='post'>";
						$appList = 
						"<li>Client: ".$app["customer_name"]."</li>
						<li>Adresse courriel: ".$app["customer_email"]."</li>
						<li>Heure: ".$app["time"]."</li>
						<li>Service: ".$app["service"]."</li>";
						
						if ($app["attended"] != "no"){
							$appList.="<li><input type='submit' value='Rendez-vous manqué' /></li>";
						}
						else {
							$appList.="<li>Le client ne s'est pas présenté au rendez-vous</li>";
						}
						$appList.="<input type='hidden' value='".$app["id"]."' name='app_id' />
							<input type='hidden' name='customer_id' value='".$app["customer_id"]."' />
							<li><hr></li>";
						echo $appList;
						echo "</form>";
					}
				}
			?>	
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3 class="text-center">Futures rendez-vous</h3>
			<ul class="user_info">
			<?php 
				if ($futureApps_flag == "true"){
					foreach ($futureApps as $app){
						$appList = 
						"<li>Date: ".$app["date"]."</li>
						<li>Heure: ".$app["time"]."</li>
						<li>Client: ".$app["customer_name"]."</li>
						<li>Adresse courriel: ".$app["customer_email"]."</li>
						<li>Service: ".$app["service"]."</li>
						<li><hr></li>";
						echo $appList;
					}
				}
			?>
			</ul>
		</div>
	</div>
	</div>
	<?php 
		//Check attendance
		if (isset($_POST["app_id"])){
			//Set apointments as missed
			$attendSql = "UPDATE appointment SET attended='no' WHERE appointment_id=".$_POST["app_id"];
			if (mysqli_query($conn, $attendSql) === true){}
			else {
				echo '<br>failed<br>';
				printf("Errormessage: %s\n", $conn->error);
			}
			//Give strike to customer
			$strikeSql = "UPDATE customer SET strikes=strikes+1 WHERE customer_id=".$_POST["customer_id"];
			if (mysqli_query($conn, $strikeSql) === true){}
			else {
				echo '<br>failed<br>';
				printf("Errormessage: %s\n", $conn->error);
			}
			echo "<script>window.location.replace('assignedAppointments.php');</script>";
		}
	?>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>







