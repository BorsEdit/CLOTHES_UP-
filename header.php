<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
  	<link rel="stylesheet" href="CSS\style.css">
  	<link rel="stylesheet" href="CSS\shopstyle.css">
  	<link rel="stylesheet" href="fontawesome\css\all.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

	<title>We Are Hyped!</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg ">
  		<a class="navbar-brand pl-5" href="#">Clothes UP!</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
	  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    	<div class="navbar-nav ml-auto">
	     	 	<a class="nav-link active pr-5" href="#">Home</a>
			    <a class="nav-link pr-5" href="#feature">Features</a>
			    <a class="nav-link pr-5" href="shop.php">Shop</a>
			    <?php
					if (isset($_SESSION["userId"])) {
						echo"<li><a class='nav-link pr-5' href='#'>Profile</a></li>";
						echo"<li><a class='nav-link pr-5' href='incl/logout.inc.php'>Logout</a></li>";
					}
					else{
						echo"<li><a class='nav-link pr-5' href='signup.php'>Sign Up</a></li>";
						echo"<li><a class='nav-link pr-5' href='login.php'>Log In</a></li>";
					}
				?>
	    	</div>
	  	</div>
	</nav>