<!DOCTYPE html>
<?php 
	session_start();
	
	include("../Pages/connection.inc");
	$flag = false;
	if ($_SESSION["loggedin"] == "loggedin"){
		if (isset($_SESSION["email"])){
			$email = $_SESSION["email"];
			$infoSql = "SELECT customer_fname, customer_lname, email FROM customer WHERE email='".$email."'";
			$infoRes = $conn->query($infoSql) or die("cant connect");
			$user = mysqli_fetch_array($infoRes);
			
			$firstName = $user["customer_fname"];
			$lastName = $user["customer_lname"];
			$email = $user["email"];
			
			$user_info = array($firstName, $lastName, $email);
			$flag = true;
		}
	}
	else {
		$userNotloggedIn = "Vous n'êtes pas connecté. Veuillez vous connecter avant d'accéder à cette page.";
		$flag = false;
	}
	
	include("../Content/Display/hideElements.php");
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
</head>
<body class="mainBackground">
<div class="wrapper">
	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "myaccount";
		include("../Content/Display/navbar.php");
	?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
	<h2 class="text-center">Informations</h2>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<ul class="user_info">
				<?php
					if ($flag == true){
					?>
						<li>Prénom: <?php echo $user_info[0] ?></li>
						<li>Nom de famille: <?php echo $user_info[1] ?></li>
						<li>Adresse courriel: <?php echo $user_info[2] ?></li>
						<li><a href="#">Changer le mot de passe</a></li>
					<?php
					}
					else {
						echo '<li>'.$userNotloggedIn.'</li>
							<li><a href="login.php">Connexion</a></li>
							<li><a href="signup.php">Créer un compte</a></li>';
					}
				?>
			</ul>
		</div>
	</div>
	</div>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>