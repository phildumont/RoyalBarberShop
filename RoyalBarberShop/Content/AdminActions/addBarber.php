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