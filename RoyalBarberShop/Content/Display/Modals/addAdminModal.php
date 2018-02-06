<?php 
	//Get all the admins
	$adminSql = "SELECT id, email FROM admin WHERE email !='".$_SESSION["email"]."'";
	$adminRes = $conn->query($adminSql);
	$admins = array(array());
	$ai = 0;
	
	if ($adminRes != "false"){
		while ($row = mysqli_fetch_array($adminRes)){
			$admins[$ai][0] = $row[0];
			$admins[$ai][1] = $row[1];
			$ai++;
		}
	}
?>
<!-- Add admin modal start -->
<div id="addAdmin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ajouter un administrateur</h4>
			</div>
			<div class="modal-body">
				<form action="adminTools.php" method="post">
					<p>Veuillez entrer l'adresse courriel du nouvel administrateur.</p>
					<input type="hidden" name="setAddAdmin" value="yes" />
					<table>
						<tr>
							<td><label for="adminEmail">Adresse courriel: </label></td>
							<td><input type="email" id="adminEmail" name="adminEmail" /></td>
							<td><input type="submit" value="Ajouter l'administrateur" class="btn btn-default"/></td>
						</tr>
					</table>
				</form>
				<br>
				<?php 
					foreach ($admins as $admin){
						echo "
							<form action='adminTools.php' method='post'>
								<input type='hidden' name='setDeleteAdmin' value='yes' />
								<input type='hidden' name='adminId' value='".$admin[0]."' />
								<table>
									<tr>
										<td>".$admin[1]."</td>
										<td><input type='submit' class='btn btn-default' value='Supprimer' /></td>
									</tr>
								</table>
							</form>";
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</div>
	</div>
</div>
<!-- Add admin modal end -->