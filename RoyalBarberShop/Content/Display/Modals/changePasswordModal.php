<?php 
	if (isset($_SESSION["errors"])){
		$modalErrors = $_SESSION["errors"];
	}
	else $modalErrors = "";
?>
<!-- Change password modal start -->
<!-- $pageName variable required to use this modal -->
<div id="changePass" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="../Controllers/changePasswordController.php" method="post">
			<div class="modal-header">
				<h4 class="modal-title">Changer le mot de passe</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td>Mot de passe actuel: </td>
						<td><input type="password" name="currentPass" required /></td>	
					</tr>
					<tr>
						<td>Nouveau mot de passe: </td>
						<td><input type="password" name="newPass" required /></td>	
					</tr>
					<tr>
						<td>Confirmer le nouveau mot de passe: </td>
						<td><input type="password" name="newPass2" required /></td>	
					</tr>
				</table>
				<span class="error_message"><?php echo $modalErrors; ?></span>
				<input type="hidden" name="setChangePass" value="yes" />
				<input type="hidden" name="returnPage" value="<?php echo $pageName; ?>" />
			</div>
			<div class="modal-footer">
				<input type="submit" value="Changer le mot de passe" class="btn btn-default"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Change password modal end -->