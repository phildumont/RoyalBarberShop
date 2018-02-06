<?php
	if (isset($_POST["setAddAdmin"])){
		$adminEmail = $_POST["adminEmail"];
		$adminSql = "INSERT INTO admin VALUES (0, '".$adminEmail."')";
		if (mysqli_query($conn, $adminSql) === true){
			$_SESSION["displayMessage"] = "L'administrateur à été ajouté.";
		}
		else {
			echo '<br>failed<br>';
			printf("Errormessage: %s\n", $conn->error);
		}
		echo "<script>window.location.replace('adminTools.php?confirm=yes');</script>";
	}
?>