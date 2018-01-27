<?php 
	if (isset($_POST["setUnbanCustomer"])){
		$email = $_POST["email"];
		$strikes = $_POST["strikes"];
		
		$unbanSql = "UPDATE customer SET strikes=".$strikes." WHERE email='".$email."'";
		if (mysqli_query($conn, $unbanSql) === true){}
		else {
			echo "failed";
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
?>