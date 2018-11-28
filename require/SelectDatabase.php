<?php
	session_start();
	$connection = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password']);

	$sql = "SHOW DATABASES";
	$result = $connection->query($sql);
	$allDatabase = array();
	if($result){
		$allDatabase = $result->fetch_all();
		$result->free();
	}
		
	$connection->close();
?>