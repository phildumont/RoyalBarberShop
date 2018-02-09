<?php 
	include("../../../Pages/connection.inc");
	
	//Date info
	$year = '20'.date('y');
	$monthArr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	
	$maxDate = ($year+1).'-00-00';
	$minDate = $year.'-00-00';
	
	//Retrieve this year's appointments
	$appSql = "SELECT appointment_date FROM appointment WHERE appointment_date>'".$minDate."' AND appointment_date<'".$maxDate."'";
	$appRes = $conn->query($appSql) or die("Pas de rendez-vous.");
	$apps = array(array());
	$i = 0;
	while ($row = mysqli_fetch_array($appRes)){
		$apps[$i][0] = $row[0];
		$i++;
	}
	//Count appointments per month
	$appsPerMonth = array(0,0,0,0,0,0,0,0,0,0,0,0);
	foreach ($apps as $app){
		$appMonth = date('m', strtotime($app[0]));
		for ($i=0;$i<12;$i++){
			if ($appMonth == $i){
				$appsPerMonth[$i-1]++;
			}
		}
	}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" type="text/css" href="reportStyle.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="printarea">
	<h3>Nombre de rendez-vous par mois en <?php echo $year; ?></h3>
	<input type="button" value="Imprimer" class="printB" onClick="PrintDoc()"/>
	<br><br>
	<table class="table table-bordered table-striped table-responsive" style="width:50%">
		<tr>
			<th>Mois</th>
			<th>Nombre de rendez-vous</th>
		</tr>
		<?php 
			for ($i=0;$i<12;$i++){
				echo "<tr>
						<td>".$monthArr[$i]."</td>
						<td>".$appsPerMonth[$i]."</td>
					</tr>";
			}
		?>
	</table>
	<script type="text/javascript" src="print.js"></script>
</body>
</html>