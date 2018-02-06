<?php 
	//Get service information
	$sName = "";
	$sPrice = "";
	$sId = "";
	if (isset($_SESSION["serviceIdTmp"])){
		$sId = $_SESSION["serviceIdTmp"];
		unset($_SESSION["serviceIdTmp"]);
	}
	
	$modifySql = "SELECT name, price FROM service WHERE service_id=".$sId;
	$modifyRes = $conn->query($modifySql);
	
	if ($modifyRes != ""){
		$serviceToMod = mysqli_fetch_array($modifyRes);
	}
	else {
		$serviceToMod = array("", "");
	}
?>
<!-- Modify services modal start -->
<div id="modifyService2" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="adminTools.php" method="post">
			<div class="modal-header">
				<h4 class="modal-title">Ajouter un administrateur</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td><input type="text" name="sName" value="<?php echo $serviceToMod[0]; ?>"  style="width:200px;" required /></td>
						<td><input type="number" name="sPrice" value="<?php echo $serviceToMod[1]; ?>" style="width:50px;" required />$</td>
					</tr>
				</table>
				<input type="hidden" name="setModifyService2" value="yes" />
				<input type="hidden" name="sId" value="<?php echo $sId; ?>" />
			</div>
			<div class="modal-footer">
				<input type="submit" value="Modifier" class="btn btn-default" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Modify services modal end -->
<button data-toggle="modal" data-target="#modifyService2" style="display:none" id="openModifySModal"></button>