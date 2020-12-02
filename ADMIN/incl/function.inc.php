<?php

	function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat){
		$result;
		if (empty($name) || empty($email) || empty($username) || empty($pwd) ||empty($pwdrepeat)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidUsername($username){
		$result;
		if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function invalidEmail($email){
		$result;
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function nmach($pwd, $pwdrepeat){
		$result;
		if ($pwd !== $pwdrepeat) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}

	function uidexist($conn, $username, $email){
		$sql = "SELECT * FROM `admin` WHERE admname = ? OR admEmail=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../admsignup.php?error=stmterror");
			exit();
		}

		mysqli_stmt_bind_param($stmt,"ss", $username, $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else{
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}
	function createAdmin($conn, $name, $pwd, $username, $email){
		$sql = "INSERT INTO `admin` (`admFullname`, `admPassword`, `admname`, `admEmail`) VALUES (?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../admsignup.php?error=stmterror");
		exit();
		}

		$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt,"ssss", $name, $hashedpwd, $username, $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location: ../admsignup.php?error=none");
		exit();
	}
	function emptyInputLogin($username, $password){
		$result;
		if (empty($username) || empty($password)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function loginAdmin($conn, $username, $password){
		$uidExist = uidexist($conn, $username, $username);

		if ($uidExist === false) {
			header("location: ../admlogin.php?error=wronglogin");
			exit();
		}

		$pwdHased = $uidExist['admPassword'];
		$checkpwd = password_verify($password, $pwdHased);

		if ($checkpwd === false) {
			header("location: ../admlogin.php?error=wronglogin");
			exit();
		}
		else if ($checkpwd === true) {
			session_start();
			$_SESSION["userId"] = $uidExist["UserId"];
			$_SESSION["username"] = $uidExist["Username"]; 
			header("location: ../admin.php");
			exit();
		}
	}