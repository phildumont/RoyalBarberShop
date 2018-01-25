<!-- Add barber modal start -->
<div id="addEmp" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="adminTools.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ajouter un employé</h4>
			</div>
			<div class="modal-body">
				<?php include("../Content/Display/addBarberForm.html"); ?>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Confirmer</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Add barber modal end -->