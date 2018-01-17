<?php
	session_start();
	include("../Pages/connection.inc");
	
	$barber_id = $_POST["barber"];
	$appDate = $_POST["appDate"];
	$appDay = date('D', strtotime($appDate));
	$available = false;
	
	$barberSql = "SELECT barber_day FROM barber WHERE barber_id = ".$barber_id;
	$barberRes = $conn->query($barberSql) or die("cant connect");
	$daysRes = mysqli_fetch_array($barberRes);
	$days = $daysRes["barber_day"];
	
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
	
	if ($available == true){
		//pull appointment information to be displayed on the next page
		$appTimeSql = "SELECT appointment_time FROM appointment WHERE appointment_date = '".$appDate."'";
		$appTime = array(array());
		$appTimeRes = $conn->query($appTimeSql) or die ("cant connect");
		$appTimeIndex = 0;
		
		while ($row = mysqli_fetch_array($appTimeRes)){
			$appTime[$appTimeIndex][0] = $row[0];
			$appTimeIndex++;
			echo $row[0].'<br>';
		}
		$_SESSION["appointments"] = $appTime;
		
		?><form action="../Pages/appointmentDate.php" id="appForm" method="post"><?php
	}
	else if ($available == false){
		$_SESSION["barberNotAvailable"] = "Le barbier que vous avez sélectionné n'est pas disponible pour cette journée. Veuillez choisir une autre journée.";
		?><form action="../Pages/appointment.php" id="appForm" method="post"><?php
	}
?>
	<input type="hidden" name="barber" value="<?php if(!empty($_POST["barber"]))echo $_POST['barber']?>"/>
	<input type="hidden" name="service" value="<?php if(!empty($_POST["service"]))echo $_POST['service']?>" />
	<input type="hidden" name="appDate" value="<?php if(!empty($_POST["appDate"]))echo $_POST['appDate']?>" />
</form>
<script type="text/javascript">
	document.getElementById('appForm').submit();
</script>