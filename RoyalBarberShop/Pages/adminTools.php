 <!DOCTYPE html>
<?php 
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
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

	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "adminTools";
		include("../Content/Display/navbar.php");
	?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
	<h2 class="text-center">Outils administratifs</h2>
	
	<ul class="app_ul text-center">
		<a class="contact_link" href="" data-toggle="modal" data-target="#addEmp"><li>Ajouter un employé</li></a>
		<a class="contact_link" href=""><li>Supprimer un employé</li></a>
		<a class="contact_link" href=""><li>Liste des rendez-vous</li></a>
		<a class="contact_link" href="" data-toggle="modal" data-target="#seeCustomers"><li>Liste des clients</li></a>
		<a class="contact_link" href=""><li>Rapports</li></a>
	</ul>
	
	<!-- Trigger the modal with a button -->
	<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addEmp">Ajouter un employé</button>-->

	<!-- Add employee modal start -->
	<div id="addEmp" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter un employé</h4>
				</div>
				<div class="modal-body">
					<?php include("../Content/Display/addBarberForm.html"); ?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default">Confirmer</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Add employee modal end -->
	<!-- See customers modal start -->
	<?php 
		//Put customers in array
		$customerSql = "SELECT customer_fname, customer_lname, email FROM customer";
		$customerRes = $conn->query($customerSql) or die ("cant connect");
		$customers = array(array());
		$ci = 0;
		while ($row = mysqli_fetch_array($customerRes)){
			$customers[$ci][0] = $row[0];
			$customers[$ci][1] = $row[1];
			$customers[$ci][2] = $row[2];
			$ci++;
		}
	?>
	<div id="seeCustomers" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Clients</h4>
				</div>
				<div class="modal-body">
					<?php
						foreach ($customers as $customer){
							echo $customer[0].' '.$customer[1].' - '.$customer[2].'<br>';
						}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- See customers modal end -->
	
	<!-- Add employee to db start -->
	<?php
		if (isset($_POST["setAddEmp"])){
			//Retrieving values
			$b_fname = $_POST["b_fname"];
			$b_lname = $_POST["b_lname"];
			$b_phone = $_POST["b_phone"];
			$b_mail = $_POST["b_mail"];
			$b_pass = $_POST["b_pass"];
			$hashed_pass = md5($b_mail).md5('thisguyisgood').md5($b_pass).md5('yesyesdovisio').md5('isthatsecureamin?');
			$b_avail = "";
			
			//Converting picture
			if (!empty($_FILES['image']['tmp_name'])){
				$img_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			}
			else {
				$encoded_img = "";
			}

			//Checking for availability
			if (isset($_POST["monday"])){
				if ($_POST["monday"] == "yes")
					$b_avail.="M";
			}
			if (isset($_POST["tuesday"])){
				if ($_POST["tuesday"] == "yes")
					$b_avail.="T";
			}
			if (isset($_POST["wednesday"])){
				if ($_POST["wednesday"] == "yes")
					$b_avail.="W";
			}
			if (isset($_POST["thursday"])){
				if ($_POST["thursday"] == "yes")
					$b_avail.="R";
			}
			if (isset($_POST["friday"])){
				if ($_POST["friday"] == "yes")
					$b_avail.="F";
			}
			if (isset($_POST["saturday"])){
				if ($_POST["saturday"] == "yes")
					$b_avail.="S";
			}
			if (isset($_POST["sunday"])){
				if ($_POST["sunday"] == "yes")
					$b_avail.="U";
			}
			unset($_POST["setAddEmp"]);
			//Add barber to db
			$insertBarber = "INSERT INTO barber 
					VALUES(0, '".$b_fname."', '".$b_lname."', '".$b_phone."', '".$b_mail."', '".$hashed_pass."', '".$b_avail."', '".$img_data."')";
			if (mysqli_query($conn, $insertBarber) === true){}
			else {
				echo "failed";
			}
		}
	?>
	<!-- Add employee to db end --> 
	
</div>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>