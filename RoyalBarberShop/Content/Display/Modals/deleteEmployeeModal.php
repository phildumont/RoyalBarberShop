<?php
	//Get all the barbers
	$barberSql = "SELECT barber_id, first_name, last_name FROM barber";
	$barberRes = $conn->query($barberSql) or die ("cant connect");
	$barbers = array(array());
	$i = 0;
	while ($row = mysqli_fetch_array($barberRes)){
		$barbers[$i]["id"] = $row[0];
		$barbers[$i]["fname"] = $row[1];
		$barbers[$i]["lname"] = $row[2];
		$i++;
	}
	
?>
<!-- Delete employee modal start -->
<div id="deleteEmp" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Supprimer un employé</h4>
			</div>
			<div class="modal-body">
				<?php 
					//Display all employees
					echo "<table>";
					foreach ($barbers as $barber){
						echo "
							<form action='adminTools.php' method='post'>
							<tr>
								<td>".$barber["fname"]." ".$barber["lname"]."</td>
								<td><input type='submit' value='Supprimer' class='btn btn-default' />
								<input type='hidden' name='barber_id' value='".$barber["id"]."' />
								<input type='hidden' name='setDeleteEmployee' value='yes' />
							</tr>
							</form>";
					}
					echo "</table>";
				?>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
</div>
<!-- Delete employee modal end -->