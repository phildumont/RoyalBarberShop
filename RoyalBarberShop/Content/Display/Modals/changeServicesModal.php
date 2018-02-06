<?php
	//Get all the barbers
	$serviceSql = "SELECT service_id, name, price FROM service";
	$serviceRes = $conn->query($serviceSql) or die ("cant connect");
	$services = array(array());
	$i = 0;
	while ($row = mysqli_fetch_array($serviceRes)){
		$services[$i]["id"] = $row[0];
		$services[$i]["name"] = $row[1];
		$services[$i]["price"] = $row[2];
		$i++;
	}
?>
<!-- Change service modal start -->
<div id="changeServices" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Changer les services</h4>
			</div>
			<div class="modal-body">
				<?php 
					//Display all employees
					echo "<table>";
					foreach ($services as $service){
						echo "
							<tr>
								<td>".$service["name"].", ".$service["price"]."$</td>
								<form action='adminTools.php' method='post'>
									<input type='hidden' name='service_id' value='".$service["id"]."' />
									<input type='hidden' name='setModifyService' value='yes' />
									<td><input type='submit' value='Modifier' class='btn btn-default' /></td>
								</form>
								<form action='adminTools.php' method='post'>
									<input type='hidden' name='service_id' value='".$service["id"]."' />
									<input type='hidden' name='setDeleteService' value='yes' />
									<td><input type='submit' value='Supprimer' class='btn btn-default' /></td>
								</form>
							</tr>";
					}
					echo "</table>";
					echo "<h3>Ajouter un service</h3>
						<table>
						<form action='adminTools.php' method='post'>
						<tr>
							<td>Nom: </td>
							<td><input type='text' name='serviceName' /></td>
						</tr>
						<tr>
							<td>Prix: </td>
							<td><input type='number' name='servicePrice' /></td>
							<input type='hidden' name='service_id' value='".$service["id"]."' />
							<input type='hidden' name='setAddService' value='yes' />
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' value='Ajouter' class='btn btn-default' /></td>
						</tr>
						</form>
					</table>";
				?>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
</div>
<!-- Change service modal end -->