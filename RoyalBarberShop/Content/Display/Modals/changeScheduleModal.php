<!-- Change schedule modal start -->
<?php 
	//Get schedule information
	$scheduleSql = "SELECT * FROM schedule";
	$scheduleRes = $conn->query($scheduleSql);
	$schedule = array(array());
	$i = 0;
	
	while ($row = mysqli_fetch_array($scheduleRes)){
		$schedule[$i]["id"] = $row[0];
		$schedule[$i]["day"] = $row[1];
		$schedule[$i]["open"] = $row[2]; #date("H:i", strtotime($row[2]));
		$schedule[$i]["close"] = $row[3]; #date("H:i", strtotime($row[3]));
		$i++;
	}
	//Put days in array
	$days = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
?>

<div id="changeSchedule" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="adminTools.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Changer les heures d'ouverture</h4>
			</div>
			<div class="modal-body">
				<p>Mettre 00:00 à 00:00 si le salon est fermé pour cette journée.</p>
				<!-- Form -->
				<?php
					$idIndex = 500;
					$dayIndex = 0;
					foreach ($schedule as $day){
						echo "<label>".$days[$dayIndex]."</label><br>
							<label for='".$idIndex."' style='margin-right:8px'>Ouverture:</label>
							<input type='time' id='".$idIndex."' style='width:75px;margin-right:8px' value='".$schedule[$dayIndex]["open"]."' name='".$days[$dayIndex]."O' />";
							$idIndex++;
						echo "<label for='".$idIndex."' style='margin-right: 8px'>Fermeture:</label>
							<input type='time' id='".$idIndex."' style='width:75px' value='".$schedule[$dayIndex]["close"]."' name='".$days[$dayIndex]."F' /><hr>";
						$idIndex++;
						$dayIndex++;
					}
				?>
				<input type="hidden" name="setChangeSchedule" value="yes" />
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Confirmer</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Change schedule modal end -->