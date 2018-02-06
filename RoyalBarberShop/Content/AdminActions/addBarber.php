<!-- Add employee to db start -->
<?php
	if (isset($_POST["setAddEmp"])){
		//Retrieving values
		$b_fname = $_POST["b_fname"];
		$b_lname = $_POST["b_lname"];
		$b_phone = $_POST["b_phone"];
		$b_mail = $_POST["b_mail"];
		$b_pass = $_POST["b_pass"];
		$addBarberInfo = array($b_fname, $b_lname, $b_phone, $b_mail);
		$_SESSION["addBarberInfo"] = $addBarberInfo;
		$hashed_pass = md5($b_mail).md5('thisguyisgood').md5($b_pass).md5('yesyesdovisio').md5('isthatsecureamin?');
		$b_avail = "";
		
		//Put picture in db
		$picture_tmp = $_FILES["photo"]["tmp_name"];
		$picture_type = $_FILES["photo"]["type"];
		$picture_name = $_FILES["photo"]["name"];
		$allowed_type = array('image/png', 'image/gif', 'image.jpg', 'image/jpeg');
		$error_message = "";
		$picFlag = "false";
		
		if (in_array($picture_type, $allowed_type)){
			$path = '../Content/dbImages/'.$picture_name;
			move_uploaded_file($picture_tmp, $path);
			$picFlag = "true";
		}
		else {
			$error_message = "Veuillez importer une photo de type jpeg, gif ou png seulement.";
		}
		$_SESSION["errorPic"] = $error_message;
		
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
		//Add barber to db
		if ($picFlag == "true"){
			$insertBarber = "INSERT INTO barber 
					VALUES (0, '".$b_fname."', '".$b_lname."', '".$b_phone."', '".$b_mail."', '".$hashed_pass."', '".$b_avail."', '".$path."', 'hhhhh')";
			//echo $insertBarber;
			if (mysqli_query($conn, $insertBarber) === true){}
			else {
				echo '<br>failed<br>';
				printf("Errormessage: %s\n", $conn->error);
			}
			$_SESSION["openModalAgain"] = "false";
		}
		else {
			$_SESSION["openModalAgain"] = "true";
		}
		echo "<script>window.location.replace('adminTools.php');</script>";
	}
?>
<!-- Add employee to db end -->