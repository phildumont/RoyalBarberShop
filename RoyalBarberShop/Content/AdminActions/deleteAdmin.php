<?php 
	if (isset($_POST["setDeleteAdmin"])){
		$adminId = $_POST["adminId"];
		
		$adminSql = "DELETE FROM admin WHERE id=".$adminId;
		
		if (mysqli_query($conn, $adminSql) === true){
			$_SESSION["displayMessage"] = "L'administrateur à été supprimé.";
		}
		else {
			echo "failed";
			echo $conn->error;
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
?>