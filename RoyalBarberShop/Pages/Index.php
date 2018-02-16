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
	
	<!--  Carousel start -->
	<center><div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner carousel_img">
			<div class="item active">
				<img src="../Content/Images/Index/1.jpg" alt="team"/>				
			</div>
			<div class="item">
				<img src="../Content/Images/Index/3.jpg"  alt="shower"/>
			</div>
			<div class="item">
				<img src="../Content/Images/Index/4.jpg"  alt="cut"/>
			</div>
			<div class="item">
				<img src="../Content/Images/Index/5.jpg"  alt="cut"/>
			</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
	</div></center>
	<!-- Carousel end -->
	
	<!--About section start -->
	<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-8">
					<h2 class="no_margin_top bold">À propos</h2>
					<!-- TODO change text -->
					<p class="text-justify">Chez Royal Barber Shop, la coiffure est notre passion. 
					Transformer une coupe de cheveux en une expérience captivant. Se faire couper les cheveux n’aura jamais été aussi 
					divertissant et agréable. Toute personne désirant une coupe classique, un Mohawk, un dégradé, un design ou toutes 
					autres styles de coupe seront les bienvenus. Nous attachons un grand soin à la qualité du service que nous vous 
					offririons lors de votre rendez-vous. Nous prendrons le temps de vous écouter afin de vous proposer ce qui vous 
					conviendra le mieux tout en respectant votre personnalité et vos attentes. Faites confiance à nos barbiers talentueux, 
					qui mettront la main à la pâte pour vous rendre élégant et ravissant.</p>
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