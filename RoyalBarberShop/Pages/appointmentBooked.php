<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	$barber_id = $_POST["barber"];
	$time = $_POST["time"];
	$service_id = $_POST["service"];
	$date = $_POST["date"];
	
	$customerSql = "SELECT customer_id FROM customer WHERE  email='".$_SESSION["email"]."'";
	$customerRes = $conn->query($customerSql) or die ("cant connect");
	$customerArr = mysqli_fetch_array($customerRes);
	$customer_id = $customerArr[0];
	
	$insertApp = "INSERT INTO appointment VALUES (0, '".$date."', '".$time."', '".$service_id."', '".$barber_id."', '".$customer_id."')";
	if (mysqli_query($conn, $insertApp) === true){
		echo 'added';
	}
	
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="mainBackground">
<div class="wrapper">
	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "appointment";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end-->
	<h1 class="myTitle text-center">Confirmation</h1>
	<h2 class="subtitle text-center margin_bottom_30">Veuillez confirmer ces informations</h2>
	<div class="container">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-6">		
			</div>
		</div>
	</div>
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>