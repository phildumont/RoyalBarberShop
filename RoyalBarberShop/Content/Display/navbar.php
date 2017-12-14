<?php
	$index = "";
	$appointment = "";
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
	if ($current == "appointment"){
		$appointment = "active";
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
			<li><a href='#'>Contact</a></li>
		  </ul>
		  <ul class='nav navbar-nav navbar-right hide_logged_in'>
			<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
			<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
		  </ul>
		  <ul class='nav navbar-nav navbar-right show_logged_in'>
			<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> My account</a></li>
			<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Sign out</a></li>
		  </ul>
		</div>
	  </div>
	</nav>";
	echo $navbar;
?>
	