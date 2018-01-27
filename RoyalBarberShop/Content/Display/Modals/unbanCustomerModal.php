<!-- Unban customer modal start -->
<?php 
	//Put customers in array
	$customerSql = "SELECT customer_fname, customer_lname, email, strikes FROM customer WHERE strikes>=3";
	$customerRes = $conn->query($customerSql) or die ("cant connect");
	$customers = array(array());
	$ci = 0;
	$customerFlag = "false";
	if (!empty(mysqli_fetch_array($customerRes))){
		while ($row = mysqli_fetch_array($customerRes)){
			$customers[$ci][0] = $row[0];
			$customers[$ci][1] = $row[1];
			$customers[$ci][2] = $row[2];
			$customers[$ci][3] = $row[3];
			$ci++;
			$customerFlag = "true";
		}
	}
?>

<div id="unbanCustomer" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Clients</h4>
			</div>
			<div class="modal-body">
				<?php
					if ($customerFlag == "true"){
						foreach ($customers as $customer){
							echo '<form action="adminTools.php" method="post">';
							$cusInfo = $customer[0].' '.$customer[1].' - '.$customer[2];
							$cusInfo.= "<input type='number' name='strikes' min='0' value='".$customer[3]."' style='margin-left:5px;width:40px;' />
										<input type='hidden' name='setUnbanCustomer' value='yes' />
										<input type='hidden' name='email' value='".$customer[2]."' />
										<input type='submit' value='Changer l&#039indicateur' />";
							echo $cusInfo;
							echo '</form>';
						}
					}
					else {
						echo "Tous les cliens peuvent prendre un rendez-vous.";
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!-- Unban customer modal end -->