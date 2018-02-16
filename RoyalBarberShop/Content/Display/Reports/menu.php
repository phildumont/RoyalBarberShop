<?php 
	//Get date info
	setlocale(LC_ALL, "FR");
	$year = '20'.date('y');
	$month = utf8_encode(strftime('%B', date('m')));
	$monthArr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	
	//Get past 5 years for array
	$yearArr = array();
	$yearArr[0] = $year;
	for ($i=1;$i<5;$i++){
		$newYear = $yearArr[$i-1]-1;
		$yearArr[$i] = $newYear;
	}
	//Get services name
	$serviceSql = "SELECT service_id, name FROM service";
	$serviceRes = $conn->query($serviceSql);
	$services = array(array());
	$si = 0;
	while ($row = mysqli_fetch_array($serviceRes)){
		$services[$si][0] = $row[0];
		$services[$si][1] = $row[1];
		$si++;
	}
	
	//Get barbers name
	$barberSql = "SELECT barber_id, first_name, last_name FROM barber";
	$barberRes = $conn->query($barberSql);
	$barbers = array(array());
	$bi = 0;
	while ($row = mysqli_fetch_array($barberRes)){
		$barbers[$bi][0] = $row[0];
		$barbers[$bi][1] = $row[1];
		$barbers[$bi][2] = $row[2];
		$bi++;
	}
?>
<!-- Reports menu modal start -->
<div id="reportsMenu" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Veuillez choisir un rapport</h4>
			</div>
			<div class="modal-body">
				<!-- Content -->
				<table>
					<tr>
						<form action='../Content/Display/Reports/yearlyReport.php' method='get' target="_blank">
							<td>Rendez-vous de
								<select name='year'>
								<?php 
									foreach ($yearArr as $year){
										echo "<option value='".$year."'>".$year."</option>";
									}
								?>
								</select>
							</td>
							<td><button type="submit" class="btn btn-default">Générer</button></td>
						</form>
					</tr>
					<tr>
						<form action='../Content/Display/Reports/monthReport.php' method='get' target="_blank">
							<td>Rendez-vous de 
								<select name='month'>
								<?php 
									$j = 1;
									foreach ($monthArr as $month){
										echo "<option value='".$j."'>".$month."</option>";
										$j++;
									}
								?>
								</select>
								<select name='year'>
								<?php 
									foreach ($yearArr as $year){
										echo "<option value='".$year."'>".$year."</option>";
									}
								?>
								</select>
							<td><button type="submit" class="btn btn-default">Générer</button></td>
						</form>
					</tr>
					<tr>
						<form action='../Content/Display/Reports/monthlyReport.php' method='get' target="_blank">
							<td>Nombre de rendez-vous par mois en
							<select name='year'>
								<?php 
									foreach ($yearArr as $year){
										echo "<option value='".$year."'>".$year."</option>";
									}
								?>
								</select>
							</td>
							<td><button type="submit" class="btn btn-default">Générer</button></td>
						</form>
					</tr>
					<tr>
						<td><strong>Veuillez choisir un service</strong></td>
					</tr>
					<tr>
						<form action='../Content/Display/Reports/serviceReport.php' method='get'target="_blank">
							<td>
								<select name='service'>
									<?php 
										foreach ($services as $ser){
											echo "<option value='".$ser[0]."'>".$ser[1]."</option>";
										}
									?>
								</select>
							</td>
							<td><button type="submit" class="btn btn-default">Générer</button></td>
						</form>
					</tr>
					<tr>
						<td><strong>Veuillez choisir un barbier</strong></td>
					</tr>
					<tr>
						<form action='../Content/Display/Reports/barberReport.php' method='get' target="_blank">
							<td>
								<select name='barber'>
									<?php 
										foreach ($barbers as $bar){
											echo "<option value='".$bar[0]."'>".$bar[1]." ".$bar[2]."</option>";
										}
									?>
								</select>
							</td>
							<td><button type="submit" class="btn btn-default">Générer</button></td>
						<form>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!-- Reports menu modal end -->