
	
	<div class="container-full">
		<form action="appointmentConfirmation.php" method="post">

				<!-- time start -->
				<?php
					$stampsIndex = 0;
					$maxTimeframes = count($availableTimes);
					//1
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 4 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'" required>
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//2
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 8 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//3
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 12 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//4
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 16 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//5
					echo "<div class='col-sm-1'>";
					while ($stampsIndex < 20 && $stampsIndex < $maxTimeframes){
						echo '<label class="radioContainer">'.$availableTimes[$stampsIndex].'
						  <input type="radio" name ="time" value="'.$availableTimes[$stampsIndex].'">
						  <span class="checkmark"></span>
						</label>';
						$stampsIndex++;
					}
					echo "</div>";
					//6
					echo "<div class='col-sm-1'>";
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
		</div>
		<input type="hidden" name="barber" value="<?php echo $barber ?>">
		<input type="hidden" name="service" value="<?php echo $service ?>">
		<input type="hidden" name="appDate" value="<?php echo $appDate ?>">
		<div class="text-center margin_top_30"><input type="submit" value="Continue" class="custom_button"/></div>
		</form>
	</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>