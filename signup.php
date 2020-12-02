<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
  	<link rel="stylesheet" href="fontawesome\css\all.min.css">

</head>
<body>
	<section class="signup">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<form action="incl/signup.inc.php" method="post">
						<h2>Sign Up</h2>
				    	<div class="form-group">
				      		<label for="FName">Fullname</label>
				      		<input type="text" name="name" class="form-control" id="FName" placeholder="Fullname">
				    	</div>
				    	<div class="form-group">
				     		<label for="Userinput">Username</label>
				      		<input type="text" name="username" class="form-control" id="Userinput" placeholder="Username">
				    	</div>
						<div class="form-group">
						    <label for="Emailinput">Email</label>
						    <input type="text" name="email" class="form-control" id="Emailinput" placeholder="Ex. yourname@hotmail.com">
						</div>
						<div class="form-row" col-md-6>
						  	<div class="form-group">
						    	<label for="Passwordinput">Password</label>
						    	<input type="password" name="pwd" class="form-control" id="Passwowrdinput" placeholder="Password">
						  	</div>
						  	<div class="form-group">
						    	<label for="Passwordinput">Confirm Password</label>
						    	<input type="password" name="pwdrepeat" class="form-control" id="Passwowrdinput" placeholder="Password">
						  	</div>
						</div>
					  	<button type="submit" name="submit" class="btn btn-primary">Sign in</button>
					  	<?php
					  	if (isset($_GET["error"])){
							if ($_GET["error"] == "emptyinput") {
								echo "<p>Fill All Fields</p>";
							}
							else if ($_GET["error"] == "invalidUsername") {
								echo "<p>Use Character a-z, A-Z, 0-9!</p>";
							}
							else if ($_GET["error"] == "invalidEmail") {
								echo "<p>Chechk your Email Format</p>";
							}
							else if ($_GET["error"] == "pwdunmatch") {
								echo "<p>Pasword Do Not Match</p>";
							}
							else if ($_GET["error"] == "usernameEmailTaken") {
								echo "<p>Email or Username taken</p>";
							}
							else if ($_GET["error"] == "stmterror") {
								echo "<p>Something went wrong, Please try again</p>";
							}
							else if ($_GET["error"] == "none") {
								echo "<p>You Have sign Up! Go To <a href='login.php'>Login Page</a></p>";
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
		include "footer.php";
	?>
</body>
</html>