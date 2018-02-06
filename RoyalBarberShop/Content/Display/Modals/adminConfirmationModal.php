<?php 
	if (isset($_SESSION["displayMessage"])){
		$displayMessage = $_SESSION["displayMessage"];
		unset($_SESSION["displayMessage"]);
	}
	else {
		$displayMessage = "";
	}
?>
<!-- Admin action confirmation modal start -->
<div id="adminConfirm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="adminRefresh()">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<?php echo $displayMessage; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="adminRefresh()">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!-- Admin action confirmation modal end -->
<button data-toggle="modal" data-target="#adminConfirm" style="display:none" id="openAdminConfirmModal"></button>

<script>
	function adminRefresh(){
		window.location.replace('adminTools.php');
	}
</script>