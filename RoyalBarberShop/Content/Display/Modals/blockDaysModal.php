<?php 
	//Get blocked days from next 2 months
	$sql = "SELECT day FROM blockeddays";
	$res = $conn->query($sql);
	$days = array(array());
	$i = 0;
	setlocale(LC_ALL, 'FR');
	while ($row = mysqli_fetch_array($res)){
		$day = strftime("%#d", strtotime($row[0]));
		$month = utf8_encode(strftime("%B", strtotime($row[0])));
		$year1 = '20'.date("y", strtotime($row[0]));
		$year = '20'.date("y");
		
		if ($year == $year1){
			$days[$i][0] = $day.' '.$month.', '.$year;
		}
		$i++;
	}
?>
<!-- Block days modal start -->
<div id="blockDays" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="adminTools.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Bloquer une journée</h4>
			</div>
			<div class="modal-body">
				<!-- Content -->
				<table>
					<tr>
						<td><label for="daysBlocked">Jours bloqués en <?php echo $year; ?></label></td>
						<td>
							<select style="width:100%" name='daysBlocked'>
								<?php
									foreach ($days as $day){
										if (isset($day[0])){
											echo "<option>".$day[0]."</option>";
										}
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="day">Journée: </label></td>
						<td><input type="date" name="day" /></td>
						<input type="hidden" name="setBlockedDay" value="yes"/>
					</tr>
				</table>
				
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-default" value="Confirmer"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Block days modal end -->