<?php 
	//Delete
	if (isset($_POST["setDeleteService"])){
		$id = $_POST["service_id"];
		
		//Delete appointments with selected service
		$deleteSql = "DELETE FROM appointment WHERE service_id=".$id;
		
		if (mysqli_query($conn, $deleteSql) === true){}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		
		$deleteSql = "DELETE FROM service WHERE service_id=".$id;
		
		if (mysqli_query($conn, $deleteSql) === true){
			$_SESSION["displayMessage"] = "Le service à été supprimé.";
		}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
	
	//Add
	if (isset($_POST["setAddService"])){
		$name = $_POST["serviceName"];
		$price = $_POST["servicePrice"];
		
		$insertSql = "INSERT INTO service VALUES(0, '".$name."', '".$price."')";
		if (mysqli_query($conn, $insertSql) === true){
			$_SESSION["displayMessage"] =  "Le service à été ajouté.";
		}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
	//Modify
	if (isset($_POST["setModifyService"])){
		//Open modify modal
		$_SESSION["serviceIdTmp"] = $_POST["service_id"];
		$_SESSION["openKewl"] = "yess";

		include("../Content/Display/Modals/ModifyServiceModal.php");
		echo "<script>
					document.getElementById('openModifySModal').click();
				</script>";
	}
	
	//Modify 2
	if (isset($_POST["setModifyService2"])){
		$sName = $_POST["sName"];
		$sPrice = $_POST["sPrice"];
		$sId = $_POST["sId"];
		$alterSql = "UPDATE service SET name='".$sName."', price='".$sPrice."' WHERE service_id=".$sId;
		
		if (mysqli_query($conn, $alterSql) === true){
			$_SESSION["displayMessage"] = "Le service à été modifié.";
		}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
?>