<?php
	session_start();
	include("../Pages/connection.inc");

	$email=$_POST["email"];
	$pass2 = $_POST["password"];
	$hashcode = md5($email).md5('thisguyisgood').md5($pass2).md5('yesyesdovisio').md5('isthatsecureamin?');
	
	//Search for barber
	$loginSql = "SELECT email, password, first_name, last_name FROM barber WHERE email='".$email."'";
	$barberRes = $conn->query($loginSql) or die ("cant connect");
	$user = mysqli_fetch_array($barberRes);
	$userFlag = "false";
	if (empty($user)){
		$loginSql="SELECT email, password, customer_fname, customer_lname FROM customer WHERE email='".$email."'";
		$userFlag = "true";
	}
	$_SESSION["userFlag"] = $userFlag;
	$loginres=$conn->query($loginSql) or die("cant connect");
	$user=mysqli_fetch_array($loginres);

	$emailFlag = 0;
	$passwordFlag = 0;

	//Email validation
	if (empty($email) || $email == null){
		$emptyEmailError = "Veuillez entrer votre adress courriel.";
		$emailFlag = 0;
	}
	else if(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email)){
		$invalidEmailError = "Veuillez entrer une adresse courriel valide.";
		$emailFlag = 0;
	}
	else if($email!=$user['email'])	{
		$emailNotFoundError = "Aucun compte n'existe avec cette adresse courriel.";
		$emailFlag = 0;
	}
	else {
		$emailFlag = 1;
	}
	
	//Password validation
	if(empty($pass2) || $pass2 == null){
		$emptyPasswordError = "Veuillez entrer un mot de passe.";
		$passwordFlag = 0;
	}
	else if($hashcode!=$user['password']){
		$invalidPasswordError = "Le mot de pass entré est incorrecte.";
		$passwordFlag = 0;
	}
	else {
		$passwordFlag = 1;
	}
	
	//Put error messages in array
	$login_errors = [];
	if (isset($emptyEmailError)){
		$login_errors[] = $emptyEmailError;
	}
	if (isset($invalidEmailError)){
		$login_errors[] = $invalidEmailError;
	}
	if (isset($emailNotFoundError)){
		$login_errors[] = $emailNotFoundError;
	}
	if (isset($emptyPasswordError)){
		$login_errors[] = $emptyPasswordError;
	}
	if (isset($invalidPasswordError)){
		$login_errors[] = $invalidPasswordError;
	}
	if (isset($isBarberError)){
		$login_errors[] = $isBarberError;
	}
	
	$_SESSION["login_errors"] = $login_errors;
	
	//Redirect
	if ($emailFlag == 0 || $passwordFlag == 0){
		?>
			<form id="loginForm" action="../Pages/login.php" method="post">
				<input type="hidden" value="<?php if(!empty($_POST["email"]))echo $_POST["email"]?>" name="email">
			</form>
			<script type="text/javascript">
				document.getElementById('loginForm').submit();
			</script>
		<?php
	}
	else {
		if ($userFlag == "false"){
			#if ($_POST["emp"] == "yes"){
				$_SESSION["fullname"] = $user["first_name"]." ".$user["last_name"];
				$_SESSION["barber"] = "yes";
			#}
		}
		else {
			$_SESSION["fullname"] = $user["customer_fname"]." ".$user["customer_lname"];
			$_SESSION["barber"] = "no";
		}
		$_SESSION["email"] = $user["email"];
		$_SESSION["loggedin"] = "loggedin";
		//Check admin
		$adminSql = "SELECT email FROM admin";
		$adminRes = $conn->query($adminSql);
		$admins = array(array());
		$i = 0;
		while ($row = mysqli_fetch_array($adminRes)){
			$admins[$i][0] = $row[0];
			$i++;
		}
		$_SESSION["admin"] = "no";
		foreach ($admins as $admin){
			if ($user["email"] == $admin[0]){
				$_SESSION["admin"] = "admin";
				$_SESSION["barber"] = "yes";
			}
		}
		if ($_SESSION["admin"] == "admin"){
			header("Location:../Pages/adminTools.php");
		}
		else if ($_SESSION["barber"] == "yes"){
			header("Location:../Pages/assignedAppointments.php");
		}
		else {
			header("Location:../Pages/appointment.php");
		}
	}
?>





