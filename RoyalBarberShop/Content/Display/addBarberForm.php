<?php 
	if (isset($_SESSION["addBarberInfo"])){
		$addBarberInfo = $_SESSION["addBarberInfo"];
		unset($_SESSION["addBarberInfo"]);
	}
	else {
		$addBarberInfo = array("", "", "", "");
	}
?>	
	<input type="hidden" name="setAddEmp" value="yes"/>
	<table>
	<tr>
		<td><label for="b_fname">Prénom:</label></td>
		<td><input type="text" name="b_fname" id="b_fname" required value="<?php echo $addBarberInfo[0]; ?>"/></td>
	</tr>
	<tr>
		<td><label for="b_lname">Nom de famille:</label></td>
		<td><input type="text" name="b_lname" id="b_lname" value="<?php echo $addBarberInfo[1]; ?>"/></td>
	</tr>
	<tr>
		<td><label for="b_phone">Numéro de téléphone:</label></td>
		<td><input type="tel" name="b_phone" id="b_phone" value="<?php echo $addBarberInfo[2]; ?>"/></td>
	</tr>
	<tr>
		<td><label for="b_mail">Adresse courriel:</label></td>
		<td><input type="email" name="b_mail" id="b_mail" value="<?php echo $addBarberInfo[3]; ?>"/></td>
	</tr>
	<tr>
		<td><label for="b_pass">Mot de passe:</label></td>
		<td><input type="password" name="b_pass" id="b_pass" required /></td>
	</tr>
	<tr>
		<td><label for="photo">Photo:</label></td>
		<td><input type="file" name="photo" id="photo" required /></td>
	</tr>
	<tr>
		<td></td>
		<td class="error_message"><?php if (isset($_SESSION["errorPic"])) echo $_SESSION["errorPic"];unset($_SESSION["errorPic"]);?></td>
	</tr>
	<tr>
		<td><label for="b_des">Description:</label></td>
		<td><textarea rows='3' col='80' name="b_des" id="b_des"></textarea></td>
	</tr>
	<tr>
		<td><label>Jours disponibles:</label></td>
		<td>
			<input type="checkbox" name="monday" id="mon" value="yes"/>
			<label for="mon" style="font-weight:normal">Lundi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="tuesday" id="tue" value="yes"/>
			<label for="tue" style="font-weight:normal">Mardi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="wednesday" id="wed" value="yes"/>
			<label for="wed" style="font-weight:normal">Mercredi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="thursday" id="thu" value="yes"/>
			<label for="thu" style="font-weight:normal">Jeudi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="friday" id="fri" value="yes"/>
			<label for="fri" style="font-weight:normal">Vendredi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="saturday" id="sat" value="yes"/>
			<label for="sat" style="font-weight:normal">Samedi</label>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="checkbox" name="sunday" id="sun" value="yes"/>
			<label for="sun" style="font-weight:normal">Dimanche</label>
		</td>
	</tr>
</table>