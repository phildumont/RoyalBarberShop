<!DOCTYPE html>
<?php
	session_start();
	include("../Content/Display/hideElements.php"); 
?>
<html lang="en">
<head>
	<title>Royal Barber Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/bootstrap.min.css">
	<link rel="Stylesheet" type="text/css" href="../Content/Stylesheets/mainStylesheet.css">
	<link rel="stylesheet" type="text/css" href="../Content/Stylesheets/style.css" />
	<script type="text/javascript" src="../Content/Scripts/jquery.js"></script>
</head>
<body class="mainBackground">

	<!-- Nav bar start-->
		<?php
			$_SESSION["current"] = "index";
			include("../Content/Display/navbar.php");
		?>
	<!-- Nav bar end -->
	<h1 class="myTitle text-center">Royal Barber Shop</h1>
	
	<!--  Slideshow start -->
	<div id="wowslider-container1">
		<div class="ws_images"><ul>
			<li><img src="../Content/Images/Index/_MG_3100.jpg" alt="image1" id="wows1_0"/></li>
			<li><img src="../Content/Images/Index/_MG_3497.jpg" alt="image2" id="wows1_1"/></li>
			<li><img src="../Content/Images/Index/_MG_3532.jpg"  alt="image3" id="wows1_2"/></li>
		</ul></div>
		<div class="ws_script" style="position:absolute;left:-99%"></div>
		<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="../Content/Scripts/wowslider.js"></script>
	<script type="text/javascript" src="../Content/Scripts/script.js"></script>
	<!-- Slideshow end -->
	
	<!--About section start -->
	<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-8">
					<h2 class="no_margin_top bold">À propos</h2>
					<!-- TODO change text -->
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius sapien at tincidunt cursus. In porttitor ante pretium nulla molestie, non auctor enim molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque arcu eros, laoreet et magna ultrices, pharetra ultricies tellus. Morbi non consectetur sapien. Etiam id tempus tellus. Pellentesque id tempus odio. Proin ornare elit non ligula rhoncus, eu suscipit lorem eleifend. Aenean fermentum elit dignissim, cursus massa id, lobortis felis. Sed ullamcorper vulputate neque, ac posuere ex porttitor vitae. Aenean est elit, varius non tempus eget, egestas ac purus.</p>
				</div>
				<div class="col-sm-4">
					<img src="../Content/Images/Index/IMG_3071.jpg" alt="aboutImage" class="homePicture hidden-sm img-responsive">
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->
	<?php include("../Content/Display/footer.php"); ?>
</body>
</html>