<?php 
	$servername = 'localhost';
	$usernamedb = 'root';
	$passwordb = '';
	$databasename = 'tieuluancsdlnc';

	$conn = new mysqli($servername, $usernamedb, $passwordb, $databasename);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
 ?>