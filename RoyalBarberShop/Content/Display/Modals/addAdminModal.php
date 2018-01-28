<!-- Add admin modal start -->
<div id="addAdmin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="adminTools.php" method="post">
			<div class="modal-header">
				<h4 class="modal-title">Ajouter un administrateur</h4>
			</div>
			<div class="modal-body">
				<p>Veuillez entrer l'adresse courriel du nouvel administrateur.</p>
				<label for="adminEmail">Adresse courriel: </label>
					<input type="email" id="adminEmail" name="adminEmail" /><br>
				<input type="hidden" name="setAddAdmin" value="yes" />
			</div>
			<div class="modal-footer">
				<input type="submit" value="Ajouter l'administrateur" class="btn btn-default"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Add admin modal end -->