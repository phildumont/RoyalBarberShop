<?php
	session_start();
	include("../Pages/connection.inc");
	if (isset($_POST["setChangePass"])){
		//Retrieve form variables
		$email = $_SESSION["email"];
		$currentPass = $_POST["currentPass"];
		$newPass = $_POST["newPass"];
		$newPass2 = $_POST["newPass2"];
		$returnPage = $_POST["returnPage"];
		$hashedPass = md5($email).md5('thisguyisgood').md5($currentPass).md5('yesyesdovisio').md5('isthatsecureamin?');
		$error_message = "";
		$passFlag = "false";

		//Get current password
		#check type of user
		if ($returnPage == "myAccount.php"){
			$passwordSql = "SELECT password, customer_id FROM customer WHERE email='".$email."'";
		}
		else if ($returnPage == "barberAccount.php"){
			$passwordSql = "SELECT password, barber_id FROM barber WHERE email='".$email."'";
		}
		$passwordRes = $conn->query($passwordSql);
		$passwordArr = mysqli_fetch_array($passwordRes);
		$password = $passwordArr[0];
		$id = $passwordArr[1];
		
		//Validating passwords
		if ($hashedPass != $password){
			$error_message = "Le mot de passe entré est incorrecte.";
		}
		else if ($newPass != $newPass2){
			$error_message = "Les mot de passes entrés ne sont pas identiques.";
		}
		else {
			$passFlag = "true";
		}
		
		//Changing password or setting error message
		if ($passFlag == "true"){
			//Change password
			$newHashedPass = md5($email).md5('thisguyisgood').md5($newPass).md5('yesyesdovisio').md5('isthatsecureamin?');
			if ($returnPage == "myAccount.php"){
				$changePassSql = "UPDATE customer SET password='".$newHashedPass."' WHERE customer_id=".$id;
			}
			else if ($returnPage == "barberAccount.php"){
				$changePassSql = "UPDATE barber SET password='".$newHashedPass."' WHERE barber_id=".$id;
			}
			else {
				$changedPassSql = "";
			}
			if (mysqli_query($conn, $changePassSql) === true){
				$_SESSION["setConfirmModal"] = "true";
				$_SESSION["openPassModal"] = "false";
				$_SESSION["errors"] = "";
			}
			else {
				echo '<br>failed<br>';
				printf("Errormessage: %s\n", $conn->error);
				$_SESSION["openPassModal"] = "false";
				$_SESSION["setConfirmModal"] = "false";
				$_SESSION["errors"] = "";
			}
		}
		else {
			//Error message
			$_SESSION["errors"] = $error_message;
			$_SESSION["openPassModal"] = "true";
			$_SESSION["setConfirmModal"] = "false";
		}
		$_SESSION["fromController"] = "true";
		header("Location: ../Pages/".$returnPage);
	}
	else {
		header("Location: ../Pages/index.php");
	}
?>