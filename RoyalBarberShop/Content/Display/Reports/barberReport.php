<?php
	include("../../../Pages/connection.inc");
	
	//Find service, barber, customer from id
	#barber
	$barberSql = "SELECT first_name, last_name FROM barber WHERE barber_id=".$_GET["barber"];
	$barberRes = $conn->query($barberSql);
	$barber = mysqli_fetch_array($barberRes) or die('Pas de barbier.');
	$bar = $barber["first_name"].' '.$barber["last_name"];
	
	//Get all services name for labels
	$serviceSql = "SELECT service_id, name FROM service";
	$serviceRes = $conn->query($serviceSql);
	$services = array(array());
	$i = 0;
	while ($row = mysqli_fetch_array($serviceRes)){
		$services[$i][0] = $row[0];
		$services[$i][1] = $row[1];
		$i++;
	}
	$labelArr = "[";
	$i = 0;
	$max = count($services)-1;
	foreach ($services as $label){
		$labelArr.='"'.$label[1].'"';
		if ($i < $max){
			$labelArr.= ',';
		}
		$i++;
	}
	$labelArr.=']';
	
	//Get all appointments with selected barber
	$barber_id = $_GET["barber"];
	$appSql = "SELECT service_id FROM appointment WHERE barber_id=".$barber_id;
	$appRes = $conn->query($appSql);
	$apps = array();
	if (count($appRes) > 0){
		$i = 0;
		while ($row = mysqli_fetch_array($appRes)){
			$apps[$i] = $row[0];
			$i++;
		}
	}
	
	//Count types of service
	#Array of size of all services
	$dataArr = array();
	$i = 0;
	foreach ($services as $ser){
		$dataArr[$i] = 0;
		$i++;
	}

	#Count
	foreach ($apps as $app){
		$i = 0;
		foreach ($services as $ser){
			if ($app == $ser[0]){
				$dataArr[$i]++;
			}
			$i++;
		}
	}
	
	//Convert $dataArr in array for graph
	$data = "[";
	$i = 0;
	$max = count($dataArr)-1;
	foreach ($dataArr as $nb){
		$data.='"'.$nb.'"';
		if ($i < $max){
			$data.= ',';
		}
		$i++;
	}
	$data.=']';
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
	<h3 style='margin-left: 15px;'>Rendez-vous par service avec <?php echo $bar.' en 20'.date('y'); ?></h3>
	<!--<input type="button" value="Imprimer" class="printB" onClick="PrintDoc()" style='margin-left: 15px;'/>-->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
	<canvas id="myChart" width="400" height="100"></canvas>
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?php echo $labelArr; ?>,
			datasets: [{
				label: 'Rendez-vous par service',
				data: <?php echo $data; ?>,
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
	</script>
	<script type="text/javascript" src="print.js"></script>
</body>
</html>