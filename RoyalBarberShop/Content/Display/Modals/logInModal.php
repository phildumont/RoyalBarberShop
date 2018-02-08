<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Message</h4>
			</div>
			<div class="modal-body">
				<form action="../Controllers/loginController.php" method="post" >
					<p>Veuillez vous connecter ou créer un compte pour réserver un rendez-vous</p>
					<table>
						<tr>
							<td><label for="email">Adresse courriel:</label></td>
							<td><input type="email" name="email" value="<?php if(!empty($_POST["email"]))echo $_POST["email"]?>" required /></td>
						</tr>
						<tr>
							<td><label for="password">Mot de passe:</label></td>
							<td><input type="password" name="password" required /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Connexion" class="btn btn-default"/></td>
						</tr>
					</table>
				</form>
				<a href="signup.php">Créer un compte</a>
			</div>
			<div class="modal-footer">
				<a href="index.php"><button type="button" class="btn btn-default">Retourner à l'accueil</button></a>
			</div>
		</div>
	</div>
</div>