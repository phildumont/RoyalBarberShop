<?php
	$index = "";
	$appointment = "";
	$contact = "";
	$myaccount = "";
	$login = "";
	$signup = "";
	if (!isset($_SESSION["current"])){
		$_SESSION["current"] = "";
		$current = $_SESSION["current"];
	}
	else {
		$current = $_SESSION["current"];
	}
	if ($current == "index"){
		$index = "active";
	}
	else if ($current == "appointment"){
		$appointment = "active";
	}
	else if ($current == "contact"){
		$contact = "active";
	}
	else if ($current == "myaccount"){
		$myaccount = "active";
	}
	else if ($current == "login"){
		$login = "active";
	}
	else if ($current == "signup"){
		$signup = "active";
	}
	if (isset($_SESSION["fullname"])){
		$fullname = $_SESSION["fullname"];
	}
	else {
		$fullname = "";
	}
	$navbar = "
	<nav class='navbar navbar-inverse'>
	  <div class='container-fluid'>
		<div class='navbar-header'>
		  <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>                        
		  </button>
		  <a href='#'><img src='../Content/Images/logo.png' alt='logo' class='inverted  nav_logo'></a>
		</div>
		<div class='collapse navbar-collapse' id='myNavbar'>
		  <ul class='nav navbar-nav'>
			<li class='".$index."'><a href='index.php'>Home</a></li>
			<li class='".$appointment."'><a href='appointment.php'>Rendez-vous</a></li>
			<li class=".$contact."><a href='contact.php'>Contact</a></li>
		  </ul>
		  <ul class='nav navbar-nav navbar-right hide_logged_in'>
			<li class=".$signup."><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
			<li class=".$login."><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
		  </ul>
		  <ul class='nav navbar-nav navbar-right show_logged_in'>
			<li class=".$myaccount."><a href='myAccount.php'><span class='glyphicon glyphicon-user'></span> ".$fullname."</a></li>
			<li><a href='../Controllers/logoutController.php'><span class='glyphicon glyphicon-log-in'></span> Sign out</a></li>
		  </ul>
		</div>
	  </div>
	</nav>";
	echo $navbar;
?>
	