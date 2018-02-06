<?php
	if (isset($_POST["setBlockedDay"])){
		$date = $_POST["day"];
		
		$insertSql = "INSERT INTO blockeddays VALUES(0, '".$date."')";
		if (mysqli_query($conn, $insertSql) === true){
			$_SESSION["displayMessage"] = "Le jour à été bloqué.";
		}
		else {
			echo "failed";
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
?>