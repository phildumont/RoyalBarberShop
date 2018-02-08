<!DOCTYPE html>
<?php 
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	if (isset($_SESSION["loggedin"])){
		if (isset($_SESSION["admin"])){
			if ($_SESSION["admin"] != "admin"){
				header("Location:index.php");
			}
		}
	}
	else {
		header("Location:index.php");
	}
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
					<button class="btn btn-default" data-toggle="modal" data-target="#addEmp" id="addEmpB">Ajouter un employé</button><br><br>
					<button class="btn btn-default" data-toggle="modal" data-target="#deleteEmp">Supprimer un employé</button><br><br>
					<button class="btn btn-default" data-toggle="modal" data-target="#addAdmin">Modifier les administrateurs</button>
			</div>
			<div class="col-sm-3">
				<h4>Clients</h4><hr>
				<button class="btn btn-default" data-toggle="modal" data-target="#seeCustomers">Liste des clients</button><br><br>
				<button class="btn btn-default" data-toggle="modal" data-target="#unbanCustomer">Autoriser un client</button><br><br>
				<button class="btn btn-default" data-toggle="modal" data-target="#seeApp">Liste des futures rendez-vous</button><br><br>
			</div>
			<div class="col-sm-3">
				<h4>Services</h4><hr>
				<button class="btn btn-default" data-toggle="modal" data-target="#changeServices">Changer les services offerts</button><br><br>
				<button class="btn btn-default" data-toggle="modal" data-target="#changeSchedule">Changer les heures d'ouverture</button><br><br>
				<button class="btn btn-default" data-toggle="modal" data-target="#reportsMenu">Rapports</button>
				<button class="btn btn-default" data-toggle="modal" data-target="#blockDays">Bloquer une journée</button>
			</div>
		</div>
	</div>
	<br>
	<!-- Options menu beta end -->
	<!-- Options menu start -->
	
	<!-- Modals definition start -->
		<?php 
			if (isset($_SESSION["errorPic"])){
				if ($_SESSION["errorPic"] == ""){
					$heyy = "true";
				}
				else {
					$heyy = "false";
				}
			}
			else {
				$heyy = "false";
			}
			include("../Content/Display/Modals/addBarberModal.php");
			include("../Content/Display/Modals/deleteEmployeeModal.php");
			include("../Content/Display/Modals/displayCustomersModal.php");
			include("../Content/Display/Modals/changeScheduleModal.php");
			include("../Content/Display/Modals/unbanCustomerModal.php");
			include("../Content/Display/Modals/addAdminModal.php");
			include("../Content/Display/Modals/changeServicesModal.php");
			include("../Content/Display/Modals/blockDaysModal.php");
			include("../Content/Display/Modals/seeAppointmentsModal.php");
			
			//Reports
			include("../Content/Display/Reports/menu.php");
		?>
	<!-- Modals definition end -->
	
	<!-- Database actions start -->
		<?php
			include("../Content/AdminActions/addBarber.php");
			include("../Content/AdminActions/deleteEmployee.php");
			include("../Content/AdminActions/changeSchedule.php");
			include("../Content/AdminActions/unbanCustomer.php");
			include("../Content/AdminActions/addAdmin.php");
			include("../Content/AdminActions/changeServices.php");
			include("../Content/AdminActions/blockDays.php");
			include("../Content/AdminActions/deleteAdmin.php");
		?>
	<!-- Database action end --> 
	
</div>
	<!-- Footer start -->
	<?php include("../Content/Display/footer.php"); ?>
	<?php
		if (isset($_SESSION["openModalAgain"]) == "true" && $heyy == "true"){
			echo "<script>
					document.getElementById('addEmpB').click();
				</script>";
		}
		if (isset($_GET["confirm"])){
			if ($_GET["confirm"] == "yes"){
				include("../Content/Display/Modals/adminConfirmationModal.php");
				echo "<script>
						document.getElementById('openAdminConfirmModal').click();
					</script>";
			}
		}
	?>
	<!-- Footer end -->
</body>
</html>