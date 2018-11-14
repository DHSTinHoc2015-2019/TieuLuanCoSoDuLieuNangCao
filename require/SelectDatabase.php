<?php 
	$servername = 'localhost';
	$usernamedb = 'root';
	$passwordb = '';
	$connection = new mysqli($servername, $usernamedb, $passwordb);

	$sql = "SHOW DATABASES";
	$result = $connection->query($sql);
	$allDatabase = array();
	if($result){
		$allDatabase = $result->fetch_all();
		$result->free();
		// foreach ($allDatabase as $allDatabase) {
		// 	echo $allDatabase[0];
		// }
	}
		
	$connection->close();
?>