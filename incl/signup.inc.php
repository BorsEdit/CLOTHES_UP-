<?php

if (isset($_POST["submit"])) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';


	if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidUsername($username) !== false) {
		header("location: ../signup.php?error=invalidUsername");
		exit();
	}
	if (invalidEmail($email) !==false) {
		header("location: ../signup.php?error=invalidEmail");
		exit();
	}
	if (nmach($pwd, $pwdrepeat) !== false) {
		header("location: ../signup.php?error=pwdunmatch");
		exit();
	}
	if (uidexist($conn, $username, $email) !== false) {
		header("location: ../signup.php?error=usernameEmailTaken");
		exit();
	}

	createUser($conn, $name, $pwd, $username, $email);
}
else {
	header("location: ../signup.php");
	exit();
}