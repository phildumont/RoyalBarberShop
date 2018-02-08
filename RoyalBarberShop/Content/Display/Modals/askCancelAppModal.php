<?php 
	if (isset($_SESSION["openModal1"])){
		$appId = $_SESSION["appId"];
		$appDate = $_SESSION["appDate"];
		$appTime = $_SESSION["appTime"];
		unset($_SESSION["appId"]);
		unset($_SESSION["appDate"]);
		unset($_SESSION["appTime"]);
	}
	else {
		$appId = "";
		$appDate = "";
		$appTime = "";
	}
?>
<!-- Confirm cancelled appointment modal start -->
<div id="askCancelApp" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="../Controllers/CancelAppointment.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Annuler le rendez-vous</h4>
			</div>
			<div class="modal-body">
				<h3>Voulez-vous vraiment annuler le rendez-vous du <?php echo $appDate; ?> à <?php echo $appTime; ?>?</h3>
				<input type='hidden' name='appId'value='<?php echo $appId; ?>' />
				<input type='hidden' name='setCancelApp2'value='yes' />
				<p>
				
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-default" value="Oui"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Confirm cancelled appointment modal end -->
<button data-toggle="modal" data-target="#askCancelApp" style="display:none" id="openAskCa"></button>
<?php 
	if (isset($_SESSION["openModal1"])){
		unset($_SESSION["openModal1"]);
		?>
			<script>
				document.getElementById("openAskCa").click();
			</script>
		<?php
	}
?>