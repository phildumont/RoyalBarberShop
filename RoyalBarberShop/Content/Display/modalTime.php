<?php include("timeframes.php")?>
<div id="timeModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<form action="appointmentConfirmation.php" method="post">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Heures disponibles</h4>
			</div>
			<div class="modal-body">
				<div class="container-full">
					
					<div class="row">
					<!-- time start -->
					<?php
						$stampsIndex = 0;
						$maxTimeframes = count($availableTimes);
						//1
						echo "<div class='col-sm-2'>";
						while ($stampsIndex < 4 && $stampsIndex < $maxTimeframes){
							echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
								<input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'" required>
								<span class="checkmark"></span>
								</label>';
							$stampsIndex++;
						}
						echo "</div>";
						//2
						echo "<div class='col-sm-2'>";
						while ($stampsIndex < 8 && $stampsIndex < $maxTimeframes){
							echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
								<input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
								<span class="checkmark"></span>
								</label>';
							$stampsIndex++;
						}
						echo "</div>";
						//3
						echo "<div class='col-sm-2'>";
						while ($stampsIndex < 12 && $stampsIndex < $maxTimeframes){
							echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
								<input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
								<span class="checkmark"></span>
								</label>';
							$stampsIndex++;
						}
						echo "</div>";
						//4
						echo "<div class='col-sm-2'>";
						while ($stampsIndex < 16 && $stampsIndex < $maxTimeframes){
							echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
								<input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
								<span class="checkmark"></span>
								</label>';
							$stampsIndex++;
						}
						echo "</div>";
						//5
						echo "<div class='col-sm-2'>";
						while ($stampsIndex < 20 && $stampsIndex < $maxTimeframes){
							echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
								<input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
								<span class="checkmark"></span>
								</label>';
							$stampsIndex++;
						}
						echo "</div>";
						//6
						echo "<div class='col-sm-2'>";
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
					<input type="hidden" name="barber" value="<?php echo $barber ?>">
					<input type="hidden" name="service" value="<?php echo $service ?>">
					<input type="hidden" name="appDate" value="<?php echo $appDate ?>">
			</div>
		</div>
			<div class="modal-footer">
				<input type="submit" value="Continue" class="btn btn-default"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
	</form>
</div>

