<?php
	$q = strval($_GET['q']);
	$servername = 'localhost';
	$usernamedb = 'root';
	$passwordb = '';
	$databaseName = $q;
	$conn = new mysqli($servername, $usernamedb, $passwordb, $databaseName);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$sql = "SHOW TABLES";
	$result = $conn->query($sql);
	$allTable = array();
	if($result){
		$allTable = $result->fetch_all();
		$result->free();
		echo '<option selected>Chọn bảng</option>';
		foreach ($allTable as $allTable) {
			echo '<option value="'.$allTable[0].'">'.$allTable[0].'</option>';
		}
	}
		
	$conn->close();
?>