<?php		
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