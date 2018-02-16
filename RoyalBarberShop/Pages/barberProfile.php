<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" value="text/html; charset=utf-8" />
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="mainBackground">
<?php
	$_SESSION["current"] = "barberProfile";
	include("../Content/Display/navbar.php");
	
		$barberInfo = "SELECT first_name, last_name, description, picture FROM barber";
		
		$barberRes=$conn->query($barberInfo) or die("can't connect");
		
		$barbers=array(array());
		$i=0;
		while($row=mysqli_fetch_array($barberRes)){
			$barber_fname=$row[0];
			$barber_lname=$row[1];
			$barber_description=$row[2];
			
			$barbers[$i][0]=$barber_fname;
			$barbers[$i][1]=$barber_lname;
			$barbers[$i][2]=$barber_description;
			$barbers[$i][3]=$row[3];
			$i++;
		}
?>

<h1 class="myTitle text-center"> Notre équipe </h1>
	
<?php 
	foreach($barbers as $barber){
		echo "<img src='".$barber[3]."' alt='".$barber[0]."' style='width:100px;float:left;margin-right:10px;margin-left:30px;'/><strong>".$barber[0]." ".$barber[1]."</strong><br>";
		echo "<p class='text-justify' style='width:1100px;'>".$barber[2]."</p><br>";
	}
?>
	

	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>