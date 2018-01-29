 <!DOCTYPE html>
<?php 
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		$_SESSION["current"] = "adminTools";
		include("../Content/Display/navbar.php");
	?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
	<h2 class="text-center">Outils administratifs</h2>
	
	<!-- Options menu beta start -->
	<div class="container-full">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
				<h4>Employés</h4><hr>
					<button class="btn btn-primary" data-toggle="modal" data-target="#addEmp">Ajouter un employé</button><br><br>
					<button class="btn btn-primary" data-toggle="modal" data-target="#deleteEmp">Supprimer un employé</button><br><br>
					<button class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Modifier les administrateurs</button>
			</div>
			<div class="col-sm-3">
				<h4>Clients</h4><hr>
				<button class="btn btn-primary" data-toggle="modal" data-target="#seeCustomers">Liste des clients</button><br><br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#unbanCustomer">Autoriser un client</button><br><br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#">Liste des rendez-vous</button><br><br>
			</div>
			<div class="col-sm-3">
				<h4>Services</h4><hr>
				<button class="btn btn-primary" data-toggle="modal" data-target="#">Changer les services offerts</button><br><br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#changeSchedule">Changer les heures d'ouverture</button><br><br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#">Rapports</button>
			</div>
		</div>
	</div>
	<br>
	<!-- Options menu beta end -->
	<!-- Options menu start -->
	
	<!-- Modals definition start -->
		<?php 
			//Add barber modal
			include("../Content/Display/Modals/addBarberModal.php");
			//Delete barber modal
			include("../Content/Display/Modals/deleteEmployeeModal.php");
			//Display customers modal
			include("../Content/Display/Modals/displayCustomersModal.php");
			//Change schedule modal
			include("../Content/Display/Modals/changeScheduleModal.php");
			//Unban customer modal
			include("../Content/Display/Modals/unbanCustomerModal.php");
			//Add admin modal
			include("../Content/Display/Modals/addAdminModal.php");
		?>
	<!-- Modals definition end -->
	
	<!-- Database actions start -->
		<?php
			//Add barber to db
			include("../Content/AdminActions/addBarber.php");
			//Delete barber
			include("../Content/AdminActions/deleteEmployee.php");
			//Change schedule in db
			include("../Content/AdminActions/changeSchedule.php");
			//Change strikes
			include("../Content/AdminActions/unbanCustomer.php");
			//Add admin
			include("../Content/AdminActions/addAdmin.php");
		?>
	<!-- Database action end --> 
	
</div>
	<!-- Footer start -->
	<?php include("../Content/Display/footer.php"); ?>
	<!-- Footer end -->
</body>
</html>