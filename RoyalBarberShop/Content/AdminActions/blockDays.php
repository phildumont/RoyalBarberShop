<?php
	if (isset($_POST["setBlockedDay"])){
		$date = $_POST["day"];
		
		$insertSql = "INSERT INTO blockeddays VALUES(0, '".$date."')";
		if (mysqli_query($conn, $insertSql) === true){}
		else {
			echo "failed";
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
?>