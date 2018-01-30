<?php
	session_start();
	include("../Pages/connection.inc");
	
	$barber_id = $_POST["barber"];
	$appDate = $_POST["appDate"];
	$appDay = date('D', strtotime($appDate));
	$available = false;
	$_SESSION["formInfo"] = array("barber"=>$_POST["barber"], "service"=>$_POST["service"], "appDate"=>$_POST["appDate"]);
	
	$barberSql = "SELECT barber_day FROM barber WHERE barber_id = ".$barber_id;
	$barberRes = $conn->query($barberSql) or die("cant connect");
	$daysRes = mysqli_fetch_array($barberRes);
	$days = $daysRes["barber_day"];
	
	//Get all blocked days
	$daysSql = "SELECT day FROM blockedDays";
	$daysRes = $conn->query($daysSql);
	$blockedDays = array(array());
	$bdi = 0;
	while ($row = mysqli_fetch_array($daysRes)){
		$blockedDays[$bdi][0] = $row[0];
		$bdi++;
	}
	
	//m monday, t tuesday, w wednesday, r thursday, f friday, s saturday, u sunday
	$monday=false;$tuesday=false;$wednesday=false;$thursday=false;$friday=false;$saturday=false;$sunday=false;$available=false;


	for ($i=0;$i<strlen($days);$i++){
		$char = substr($days, $i, 1);
		if ($char == 'M'){
			$monday = true;
		}
		if ($char == 'T'){
			$tuesday = true;
		}
		if ($char == 'W'){
			$wednesday = true;
		}
		if ($char == 'R'){
			$thursday = true;
		}
		if ($char == 'F'){
			$friday = true;
		}
		if ($char == 'S'){
			$saturday = true;
		}
		if ($char == 'U'){
			$sunday = true;
		}
	}
	
	if ($appDay == 'Mon' && $monday == true){
		$available = true;
	}
	else if ($appDay == 'Tue' && $tuesday == true){
		$available = true;
	}
	else if ($appDay == 'Wed' && $wednesday == true){
		$available = true;
	}
	else if ($appDay == 'Thu' && $thursday == true){
		$available = true;
	}
	else if ($appDay == 'Fri' && $friday == true){
		$available = true;
	}
	else if ($appDay == 'Sat' && $saturday == true){
		$available = true;
	}
	else if ($appDay == 'Sun' && $sunday == true){
		$available = true;
	}
	
	//Check closed days
	$daysSql = "SELECT open, close, day FROM schedule";
	$daysRes = $conn->query($daysSql) or die ("cant connect");
	$daysS = array(array());
	while ($row = mysqli_fetch_array($daysRes)){
		if ($row[0] == '00:00:00' && $row[1] == '00:00:00' && $appDay == $row[2]){
			$available = false;
		}
	}
	
	//Check blocked days
	foreach ($blockedDays as $bday){
		if ($bday[0] == $appDate){
			$available = false;
		}
	}
	
	if ($available == true){
		//pull appointment information to be displayed on the next page
		$appTimeSql = "SELECT appointment_time FROM appointment WHERE appointment_date = '".$appDate."'";
		$appTime = array(array());
		$appTimeRes = $conn->query($appTimeSql) or die ("cant connect");
		$appTimeIndex = 0;
		
		while ($row = mysqli_fetch_array($appTimeRes)){
			$appTime[$appTimeIndex][0] = $row[0];
			$appTimeIndex++;
		}
		$_SESSION["appointments"] = $appTime;
		$_SESSION["displayTime"] = "true";
		header("Location: ../Pages/appointment.php");
	}
	else if ($available == false){
		$_SESSION["barberNotAvailable"] = "Le barbier que vous avez sélectionné n'est pas disponible pour cette journée. Veuillez choisir une autre journée.";
		$_SESSION["displayTime"] = "false";
		header("Location: ../Pages/appointment.php");
	}
?>
