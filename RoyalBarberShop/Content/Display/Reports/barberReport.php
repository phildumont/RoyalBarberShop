<?php 
	include("../../../Pages/connection.inc");
	
	//Date info
	setlocale(LC_ALL, "FR");
	$year = '20'.date('y');
	$maxDate = ($year+1).'-00-00';
	$minDate = $year.'-00-00';
		
	//Retrieve appointments information
	$appSql = "SELECT * FROM appointment WHERE appointment_date>'".$minDate."' AND appointment_date<'".$maxDate."' AND barber_id=".$_GET['barber'];
	$appRes = $conn->query($appSql) or die("Il n'y a pas de rendez-vous en ".$year);
	$apps = array(array());
	$i = 0;
	while ($row = mysqli_fetch_array($appRes)){
		for ($j=0;$j<7;$j++){
			$apps[$i][$j] = $row[$j];
		}
		$i++;
	}
	
	//Find service, barber, customer from id
	#barber
	$barberSql = "SELECT first_name, last_name FROM barber WHERE barber_id=".$_GET["barber"];
	$barberRes = $conn->query($barberSql);
	$barber = mysqli_fetch_array($barberRes) or die('Pas de barbier.');
	$bar = $barber["first_name"].' '.$barber["last_name"];
	$i = 0;
	if (count($apps) > 1){
		foreach ($apps as $app){
			#service
			$serviceSql = "SELECT name FROM service WHERE service_id=".$app[3];
			$serviceRes = $conn->query($serviceSql);
			$service = mysqli_fetch_array($serviceRes) or die('Pas de service.');
			$ser = $service["name"];
			
			#customer
			$customerSql = "SELECT customer_fname, customer_lname FROM customer WHERE customer_id=".$app[5];
			$customerRes = $conn->query($customerSql);
			$customer = mysqli_fetch_array($customerRes) or die('Pas de client.');
			$apps[$i][5] = $customer["customer_fname"].' '.$customer["customer_lname"];
			
			$apps[$i][3] = $bar;
			$apps[$i][4] = $ser;
			$apps[$i][2] = date("H:i", strtotime($apps[$i][2]));
			$i++;
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
	<h3>Rendez-vous avec <?php echo $bar.' en '.$year; ?></h3>
	<input type="button" value="Imprimer" class="printB" onClick="PrintDoc()"/>
	<br><br>
	<?php 
		if (count($apps) > 1){
	?>
	<table class="table table-bordered table-striped table-responsive">
		<tr>
			<th>Id</th>
			<th>Date</th>
			<th>Heure</th>
			<th>Service</th>
			<th>Client</th>
			<th>Manqué</th>
		</tr>
		<?php 
			if (count($apps) > 1){
				foreach ($apps as $app){
					echo "<tr>";
					for ($i=0;$i<6;$i++){
						if ($i != 3){
							echo "<td>".$app[$i]."</td>";
						}
					}
					if ($app[6] == "no"){
						echo "<td>&#10004;</td>";
					}
					else {
						echo "<td></td>";
					}
					echo "</tr>";
				}
			}
		?>
	</table>
		<?php  } 
			else {
				echo "<h3>Il n'y a pas de rendez-vous aved ".$bar." ".$year.".";
			}
		?>
	<script type="text/javascript" src="print.js"></script>
</body>
</html>