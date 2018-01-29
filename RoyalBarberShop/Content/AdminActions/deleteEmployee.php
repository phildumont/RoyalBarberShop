<?php 
	if (isset($_POST["setDeleteEmployee"])){
		$id = $_POST["barber_id"];
		
		$deleteSql = "DELETE FROM barber WHERE barber_id=".$id;
		if (mysqli_query($conn, $deleteSql) === true){}
		else {
			echo "failed";
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
?>