<?php
$server_Name ="localhost";
$dbUsername ="root";
$dbPass ="";
$dbName ="clthup";

$conn = mysqli_connect($server_Name, $dbUsername, $dbPass, $dbName);

if (!$conn){
	die("Connection Error" .mysqli_connect_error());
}