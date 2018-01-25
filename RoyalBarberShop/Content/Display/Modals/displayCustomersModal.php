<!-- Display customers modal start -->
<?php 
	//Put customers in array
	$customerSql = "SELECT customer_fname, customer_lname, email FROM customer";
	$customerRes = $conn->query($customerSql) or die ("cant connect");
	$customers = array(array());
	$ci = 0;
	while ($row = mysqli_fetch_array($customerRes)){
		$customers[$ci][0] = $row[0];
		$customers[$ci][1] = $row[1];
		$customers[$ci][2] = $row[2];
		$ci++;
	}
?>
<div id="seeCustomers" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Clients</h4>
			</div>
			<div class="modal-body">
				<?php
					foreach ($customers as $customer){
						echo $customer[0].' '.$customer[1].' - '.$customer[2].'<br>';
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
</div>
<!-- Display customers modal end -->