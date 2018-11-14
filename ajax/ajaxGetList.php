<?php 
	$tableName = strval($_GET['tb']);
	$databaseName = strval($_GET['db']);
	// echo $databaseName ."<br>" . $tableName;
	$servername = 'localhost';
	$usernamedb = 'root';
	$passwordb = '';

	$conn = new mysqli($servername, $usernamedb, $passwordb, $databaseName);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");

	$sql = "SHOW COLUMNS FROM `".$tableName."`";
	$result = $conn->query($sql);
	$columns = array();
	if($result){
		$columns = $result->fetch_all();
		$result->free();
	}

	$sql = "SELECT * FROM ".$tableName;
	$result = $conn->query($sql);
	$data = array();
	if($result){
		$data = $result->fetch_all();
		$result->free();
		// echo "<pre>";
		// print_r($data);

		// foreach ($data as $i => $arr) {
		// 	foreach ($arr as $key => $value) {
		// 		echo $value."<br>";
		// 	}
		// 	echo "<hr>";
		// }
		$str = "";
		$str .= '<div class="card" style="margin-top: 2em;">
				<div class="card-header">BẢNG</div>
				<div class="card-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
				        <thead>
				            <tr>';
		foreach ($columns as $columns) {
			$str .=  '<th>'.$columns[0].'</th>';
		}
		$str .= '</thead>
				        <tbody>';
		foreach ($data as $i => $arr) {
			$str .= "<tr>";
			foreach ($arr as $key => $value) {
				$str .= "<td>".$value."</td>";
			}
			$str .= "</tr>";
		}
		$str .= '
				        </tbody>
				    </table>
				</div>
				<!-- End-Body -->
			</div>
			<!-- End-Card -->';
	}
		
	$conn->close();
	echo $str;
?>