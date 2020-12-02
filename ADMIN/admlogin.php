<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css">

</head>
<body>
	<section class="signup">	
		<div class="container">
		    <div class="row">
		      	<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
		        	<div class="card card-signin my-5">
			          	<div class="card-body">
				            <h5 class="card-title text-center">Sign In</h5>
				            <form class="form-signin" action="incl/login.inc.php" method="post">
					            <div class="form-label-group">
									<label>Username or E-mail</label>
					            	<input type="text" name="username" class="form-control">
					            </div>

				              	<div class="form-label-group">
								  	<label>Password</label>
				                	<input type="password" name="password" class="form-control">
				              	</div>
				              	<div class="form-label-group">
								  	<label></label>
								  	<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
				            	</div>
							</form>
							<?php
							if (isset($_GET["error"])){
								if ($_GET["error"] == "emptyinput") {
									echo "<p>Fill All Fields</p>";
								}
								else if ($_GET["error"] == "wronglogin") {
									echo "<p>Wrong username or password</p>
									<p>Don't Have Account?? <a href='admsignup.php'>Signup Here!</a></P";
								}
							}
							?>
				        </div>
				    </div>
		          </div>
		        </div>
		      </div>
		    </div>
	  </div>
	</section>
	
	</section>
	<?php
		include "../footer.php";
	?>
</body>
</html>