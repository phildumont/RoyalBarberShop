<?php 
	//Get today
	setLocale(LC_ALL, "fr");
	$today = '20'.date("y").'-'.date('m').'-'.date('d');
	
	//Get future appointments
	$appSql = "SELECT appointment_date, appointment_time, barber_id, customer_id, service_id FROM appointment WHERE appointment_date>='".$today."'";
	$appRes = $conn->query($appSql) or die("cant connect");
	$appp = array(array());
	$kkk = 0;
	
	while ($row = mysqli_fetch_array($appRes)){
		$appp[$kkk]["date"] = $row[0];
		$appp[$kkk]["time"] = $row[1];
		$appp[$kkk]["barber_id"] = $row[2];
		$appp[$kkk]["customer_id"] = $row[3];
		$appp[$kkk]["service_id"] = $row[4];
		$kkk++;
	}

	//Convert information
	$kki = 0;
	foreach ($appp as $app){
		//Barber
		$barberSql = "SELECT first_name, last_name FROM barber WHERE barber_id=".$app["barber_id"];
		$barberRes = $conn->query($barberSql);
		$barber = mysqli_fetch_array($barberRes);
		$appp[$kki]["barber"] = $barber[0].' '.$barber[1];
		
		//Customer
		$customerSql = "SELECT customer_fname, customer_lname FROM customer WHERE customer_id=".$app["customer_id"];
		$customerRes = $conn->query($customerSql);
		$customer = mysqli_fetch_array($customerRes);
		$appp[$kki]["customer"] = $customer[0].' '.$customer[1];
		
		//Service
		$serviceSql = "SELECT name, price FROM service WHERE service_id=".$app["service_id"];
		$serviceRes = $conn->query($serviceSql);
		$service = mysqli_fetch_array($serviceRes);
		$appp[$kki]["service"] = $service[0].', '.$service[1].'$';
		
		//Date
		$day = strftime("%#d", date('d', strtotime($app["date"])));
		$month = strftime("%B", date('m', strtotime($app["date"])));
		$year = date('y', strtotime($app["date"]));
		$time = date("H:i", strtotime($app["time"]));
		
		$appp[$kki]["newDate"] = $day.' '.$month.', '.$year;
		$appp[$kki]["newTime"] = $time;
		$kki++;
	}
	
?>
<!-- See appointments modal start -->
<div id="seeApp" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Liste des futures rendez-vous</h4>
			</div>
			<div class="modal-body">
				<ul class="user_info">
					<?php 
						foreach ($appp as $app){
							echo "<li>".$app["newDate"]." - ".$app["newTime"]."
								<ul style='font-size:12pt'>
									<li>".$app["customer"]."</li>
									<li>".$app["barber"]."</li>
									<li>".$app["service"]."</li>
								</ul>
							</li>";
						}
					?>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!-- See appointments modal end -->