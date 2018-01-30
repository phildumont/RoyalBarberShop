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
		
		if (mysqli_query($conn, $deleteSql) === true){}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
	
	//Change
	if (isset($_POST["setAddService"])){
		$name = $_POST["serviceName"];
		$price = $_POST["servicePrice"];
		
		$insertSql = "INSERT INTO service VALUES(0, '".$name."', '".$price."')";
		if (mysqli_query($conn, $insertSql) === true){}
		else {
			echo "failed";
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
?>