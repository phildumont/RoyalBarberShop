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
	
	<!-- Options menu start -->
	<ul class="app_ul text-center">
		<a class="contact_link" href="" data-toggle="modal" data-target="#addEmp"><li>Ajouter un employé</li></a>
		<a class="contact_link" href=""><li>Supprimer un employé</li></a>
		<a class="contact_link" href=""><li>Liste des rendez-vous</li></a>
		<a class="contact_link" href="" data-toggle="modal" data-target="#seeCustomers"><li>Liste des clients</li></a>
		<a class="contact_link" href="" data-toggle="modal" data-target="#changeSchedule"><li>Changer les heures d'ouverture</li></a>
		<a class="contact_link" href=""><li>Rapports</li></a>
	</ul>
	<!-- Options menu end -->
	
	<!-- Modals definition start -->
		<?php 
			//Add barber modal
			include("../Content/Display/Modals/addBarberModal.php");
			//Display customers modal
			include("../Content/Display/Modals/displayCustomersModal.php");
			//Change schedule modal
			include("../Content/Display/Modals/changeScheduleModal.php");
		?>
	<!-- Modals definition end -->
	
	<!-- Database actions start -->
		<?php
			//Add barber to db
			include("../Content/AdminActions/addBarber.php");
			//Change schedule in db
			include("../Content/AdminActions/changeSchedule.php")
		?>
	<!-- Database action end --> 
	
</div>
	<!-- Footer start -->
	<?php include("../Content/Display/footer.php"); ?>
	<!-- Footer end -->
</body>
</html>