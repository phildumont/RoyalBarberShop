<?php 
	session_start();
	include("../Pages/connection.inc");
	if (isset($_POST["setCancelApp"])){
		$_SESSION["appId"] = $_POST["appId"];
		$_SESSION["appDate"] = $_POST["appDate"];
		$_SESSION["appTime"] = $_POST["appTime"];
		$_SESSION["openModal1"] = "true";
	}
	if (isset($_POST["setCancelApp2"])){
		$appSql = "DELETE FROM appointment WHERE appointment_id=".$_POST["appId"];
		if (mysqli_query($conn, $appSql) === true){
			$_SESSION["openModal2"] = "true";
		}
		else {
			echo $conn->error;
		}
	}
	header("Location:../Pages/myAccount.php");
?>