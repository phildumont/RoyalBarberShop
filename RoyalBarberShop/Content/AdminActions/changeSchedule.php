<?php
	if (isset($_POST["setChangeSchedule"])){
		if ($_POST["setChangeSchedule"] == "yes"){
			$changeI = 0;
			$days3L = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
			$newSchedule = array(array());
			$modifiedSchedule = array(array());
			$myDays = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
			for($j=0;$j<7;$j++){
				$nameO = $myDays[$j].'O';
				$nameF = $myDays[$j].'F';
				$newSchedule[$j]["open"] = $_POST[$nameO];
				$newSchedule[$j]["close"] = $_POST[$nameF];
			}
			$msI = 0;
			for ($j=0;$j<7;$j++){
				if ($newSchedule[$j]["open"] != $schedule[$j]["open"] || $newSchedule[$j]["close"] != $schedule[$j]["close"]){
					$modifiedSchedule[$msI]["day"] = $days3L[$j];
					$modifiedSchedule[$msI]["open"] = $newSchedule[$j]["open"];
					$modifiedSchedule[$msI]["close"] = $newSchedule[$j]["close"];
					$msI++;
				}
			}
			
			//SQL statements
			if ($msI != 0){
				foreach ($modifiedSchedule as $item){
					$itemSql = "UPDATE schedule 
								SET open='".$item["open"]."', close='".$item["close"]."' WHERE day='".$item["day"]."'";
					if (mysqli_query($conn, $itemSql) === true){
						$_SESSION["displayMessage"] = "Les heures d'ouvertures ont été changées.";
					}
					else {
						echo "failed";
					}
				}
			}
			$_POST["setChangeSchedule"] = "no";
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
?>