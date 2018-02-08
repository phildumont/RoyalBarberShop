<!-- Confirm cancelled appointment modal start -->
<div id="appCancelled" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onClick="refreshMyPage()">&times;</button>
				<h4 class="modal-title">Rendez-vous annulé</h4>
			</div>
			<div class="modal-body">
				<h3>Le rendez-vous à été annulé</h3>
				<h4><a href="appointment.php">Prendre un rendez-vous</a></h4>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!-- Confirm cancelled appointment modal end -->
<button data-toggle="modal" data-target="#appCancelled" style="display:none" id="openAskCa2" data-backdrop="static" data-keyboard="false" onClick="refreshMyPage()"></button>
<?php 
	if (isset($_SESSION["openModal2"])){
		unset($_SESSION["openModal2"]);
		?>
			<script>
				document.getElementById("openAskCa2").click();
			</script>
		<?php
	}
?>
<script>
	function refreshMyPage(){
		window.location.replace('myAccount.php');
	}
</script>