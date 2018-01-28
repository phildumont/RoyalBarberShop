<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php");
	include("connection.inc");
	
	//Check for access
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] != "loggedin"){
			header("Location: index.php");
		}
		if (isset($_SESSION["barber"])){
			if ($_SESSION["barber"] != "yes"){
				header("Location: index.php");
			}
		}
		else {
			header("Location: index.php");
		}
	}
	else {
		header("Location: index.php");
	}
	$pageName = "barberAccount.php";
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Royal Baber Shop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="mainBackground">
	<!-- Nav bar start-->
	<?php
		$_SESSION["current"] = "myaccount";
		include("../Content/Display/navbar.php");
		
		//Get the barber's information
		$email = $_SESSION["email"];
		$barberSql = "SELECT barber_id, first_name, last_name, barber_day, picture, description from BARBER WHERE email='".$email."'";
		$barberRes = $conn->query($barberSql) or die ("cant connect");
		$barber = mysqli_fetch_array($barberRes);
		$barber_day = $barber["barber_day"];
		
		//Checking the days
		$m="";$t="";$w="";$r="";$f="";$s="";$u="";
		$c = "checked";
		for ($i=0;$i<strlen($barber_day);$i++){
			$char = substr($barber_day, $i, 1);
			if ($char == 'M')
				$m=$c;
			if ($char == 'T')
				$t=$c;
			if ($char == 'W')
				$w=$c;
			if ($char == 'R')
				$r=$c;
			if ($char == 'F')
				$f=$c;
			if ($char == 'S')
				$s=$c;
			if ($char == 'U')
				$u=$c;
		}
		
		include("../Content/Display/Modals/changePasswordModal.php");
		include("../Content/Display/Modals/passWordConfirm.php");
		
		//Change password actions start
		#Retrieve session variables from controller
		if (isset($_SESSION["fromController"])){
			if ($_SESSION["fromController"] == "true"){
				$fromControllerFlag = "true";
				$error_message = $_SESSION["errors"];
				$openPassModal = $_SESSION["openPassModal"];
				$openConfirmModal = $_SESSION["setConfirmModal"];
				#unset session variables
				unset($_SESSION["errors"]);
				unset($_SESSION["openPassModal"]);
				unset($_SESSION["setConfirmModal"]);
				unset($_SESSION["fromController"]);
			}
			#Check which modal to open when coming back
			if ($openPassModal == "true"){
				echo '<button type="button" data-toggle="modal" data-target="#changePass" style="display:none" id="openPassModal">Open Modal</button>';
				?>
					<script>
						document.getElementById("openPassModal").click();
					</script>
				<?php
			}
			else if ($openConfirmModal == "true"){
				echo '<button type="button" data-toggle="modal" data-target="#passConfirm" style="display:none" id="openPassConfirmModal">Open Modal</button>';
				?>
					<script>
						document.getElementById("openPassConfirmModal").click();
					</script>
				<?php
			}
			
		}
		//Change password actions end
	?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center margin_bottom_5">Royal Barber Shop</h1>
	<h2 class="text-center"><?php echo $barber[1].' '.$barber[2]; ?></h2>
	<center><img src="<?php echo $barber["picture"]; ?>" alt="profile pic" style="width:150px;"/></center>
	<h3 class="text-center">Changer vos informations</h3>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-6">
			
			<form action = "barberAccount.php" method="post" enctype="multipart/form-data">
			<table>
				<input type="hidden" name="setBarberAccount" value="yes" />
				<tr>
					<td><label for="email">Adresse courriel:</label></td>
					<td><input type="email" id="email" name="email" value="<?php echo $email; ?>" required /></td>
				</tr>
				<tr>
					<td><label for="picture">Photo:</label></td>
					<td><input type="file" name="picture" value="picture" /></td>
				</tr>
				<tr>
					<td><label>Jours disponibles:</label></td>
					<td>
						<input type="checkbox" name="monday" id="mon" value="yes" <?php echo $m; ?>/>
						<label for="mon" style="font-weight:normal">Lundi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="tuesday" id="tue" value="yes" <?php echo $t; ?>/>
						<label for="tue" style="font-weight:normal">Mardi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="wednesday" id="wed" value="yes" <?php echo $w; ?>/>
						<label for="wed" style="font-weight:normal">Mercredi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="thursday" id="thu" value="yes" <?php echo $r; ?>/>
						<label for="thu" style="font-weight:normal">Jeudi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="friday" id="fri" value="yes" <?php echo $f; ?>/>
						<label for="fri" style="font-weight:normal">Vendredi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="saturday" id="sat" value="yes" <?php echo $s; ?>/>
						<label for="sat" style="font-weight:normal">Samedi</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="sunday" id="sun" value="yes" <?php echo $u; ?>/>
						<label for="sun" style="font-weight:normal">Dimanche</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="custom_button" value="Confirmer" />
			</table>
			</form>
		</div>
	</div>
	</div>
	<ul class="user_info text-center"><li><a href="#" data-toggle="modal" data-target="#changePass">Changer le mot de passe</a></li></ul>
	<?php 
		//Change barber info
		if (isset($_POST["setBarberAccount"])){
			if ($_POST["setBarberAccount"] == "yes"){
				$email = $_POST["email"];
				$_SESSION["email"] = $email;
				//Put picture in db
				$picture_tmp = $_FILES["picture"]["tmp_name"];
				$picture_type = $_FILES["picture"]["type"];
				$picture_name = $_FILES["picture"]["name"];
				$allowed_type = array('image/png', 'image/gif', 'image.jpg', 'image/jpeg');
				$path = $barber["picture"];
				if (in_array($picture_type, $allowed_type)){
					$path = '../Content/dbImages/'.$picture_name;
					move_uploaded_file($picture_tmp, $path);
				}
				else {
					//TODO error
				}
				//Checking for availability
				$b_avail = "";
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
				
				//Update record in d
				$updateSql = "UPDATE barber
								SET email='".$email."', picture='".$path."', barber_day='".$b_avail."'
								WHERE barber_id='".$barber["barber_id"]."'";
				if (mysqli_query($conn, $updateSql) === true){}
				else {
					echo '<br>failed<br>';
					printf("Errormessage: %s\n", $conn->error);
				}
			}
			echo "<script>window.location.replace('barberAccount.php');</script>";
		}
	?>
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>



