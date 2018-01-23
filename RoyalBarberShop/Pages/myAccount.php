<!DOCTYPE html>
<?php 
	session_start();
	include("../Pages/connection.inc");
	$flag = false;
	setlocale(LC_ALL, 'FR');
	if ($_SESSION["loggedin"] == "loggedin"){
		if (isset($_SESSION["email"])){
			//Retrieve user info
			$email = $_SESSION["email"];
			$infoSql = "SELECT customer_fname, customer_lname, email, customer_id FROM customer WHERE email='".$email."'";
			$infoRes = $conn->query($infoSql) or die("cant connect");
			$user = mysqli_fetch_array($infoRes);
			
			//Put user info in variables
			$firstName = $user["customer_fname"];
			$lastName = $user["customer_lname"];
			$email = $user["email"];
			$id = $user["customer_id"];
			$user_info = array($firstName, $lastName, $email);
			
			//Retrieve user appointments
			$appSql = "SELECT appointment_date, appointment_time, service_id, barber_id,appointment_id FROM appointment
						WHERE customer_id = ".$id;
			$appRes = $conn->query($appSql) or die ("cant connect");
			$apps = array(array());
			$i = 0;
			$apps_flag = "false";
			$f_flag = "false";
			$p_flag = "false";
			
			//Put appointments in array
			while ($row = mysqli_fetch_array($appRes)){
				//Convert date
				$month = utf8_encode(strftime("%B", strtotime($row[0])));
				$day = strftime("%#d", strtotime($row[0]));
				$year = '20'.date("y", strtotime($row[0]));
				$apps[$i]["date"] = $day.' '.$month.', '.$year;
				$apps[$i]["time"] = date("H:i", strtotime($row[1]));
				$apps[$i]["service"] = $row[2];
				$apps[$i]["barber"] = $row[3];
				$apps[$i]["id"] = $row[4];
				$apps[$i]["year"] = $year;
				$apps[$i]["normalDate"] = $row[0];
				$i++;
				$apps_flag = "true";
			}
			
			if ($apps_flag == "true"){
				//Find barber and service
				$i=0;
				foreach ($apps as $app){
					$barberSql = "SELECT first_name, last_name FROM barber WHERE barber_id = ".$app["barber"];
					$barberRes = $conn->query($barberSql) or die ("cant connect");
					$barberInfo = mysqli_fetch_array($barberRes);
					$apps[$i]["barber"] = $barberInfo[0].' '.$barberInfo[1];
					
					$serviceSql = "SELECT name, price FROM service WHERE service_id = ".$app["service"];
					$serviceRes = $conn->query($serviceSql) or die ("cant connect");
					$serviceInfo = mysqli_fetch_array($serviceRes);
					$apps[$i]["service"] = $serviceInfo[0].', '.$serviceInfo[1].'$';
					$i++;
				}
			
				$today = '20'.date("y").'-'.date("m")."-".date("d");
				$currentYear = '20'.date("y");
				//Future and past appointments
				$futureApp = array(array());
				$pastApp = array(array());
				$fi = 0;
				$pi = 0;
				foreach ($apps as $app){
					if ($app["normalDate"] >= $today){
						$futureApp[$fi]["date"] = $app["date"];
						$futureApp[$fi]["time"] = $app["time"];
						$futureApp[$fi]["service"] = $app["service"];
						$futureApp[$fi]["barber"] = $app["barber"];
						$fi++;
						$f_flag = "true";
					}
					else if ($app["year"] == $currentYear){
						$pastApp[$pi]["date"] = $app["date"];
						$pastApp[$pi]["time"] = $app["time"];
						$pastApp[$pi]["service"] = $app["service"];
						$pastApp[$pi]["barber"] = $app["barber"];
						$pi++;
						$p_flag = "true";
					}
				}
			}
			//Confirm
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-type" value="text/html; charset=utf-8" />
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
</head>
<body class="mainBackground">

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
						</ul>
		</div></div>
						<div class="row">
						<?php
							echo "<div class=col-lg-1></div>";
							echo "<div class='col-lg-5'><h3>Futures rendez-vous</h3>";
							echo "<ul class='user_info'>";
							if ($f_flag == "true"){
								foreach ($futureApp as $app){
									echo "<li>".$app["date"]." - ".$app["time"]."</li>
											<li>&nbsp;&nbsp;Barbier: ".$app["barber"]."</li>
											<li>&nbsp;&nbsp;Service: ".$app["service"]."</li>
											<li><hr></li>";
								}
							}
							else {
								echo "<li>Vous n'avez pas de futures rendez-vous.</li>";
							}
							echo "</ul></div>
								<div class='col-lg-5'>
								<h3>Rendez-vous passés</h3>
								<ul class='user_info'>";
							if ($p_flag == "true"){
								foreach ($pastApp as $app){
									echo "<li>".$app["date"]." - ".$app["time"]."</li>
											<li>&nbsp;&nbsp;Barbier: ".$app["barber"]."</li>
											<li>&nbsp;&nbsp;Service: ".$app["service"]."</li>
											<li><hr></li>";
								}
							}
							else {
								echo "<li>Vous n'avez pas de rendez-vous passés.</li>";
							}
							echo "</ul></div>";
						?>
					</div>
					<?php
					}
					else {
						echo '<ul class="user_info"><li>'.$userNotloggedIn.'</li>
							<li><a href="login.php">Connexion</a></li>
							<li><a href="signup.php">Créer un compte</a></li></ul>';
					}
				?>
		</div>
	</div>
	</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>