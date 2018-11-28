<?php
	session_start();
	$tableName = strval($_GET['tb']);
	$databaseName = strval($_GET['db']);
	// $tableName = "sinhvien";
	// $databaseName = "tieuluancsdlnc";

	$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $databaseName);
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
	// foreach ($columns as $columns) {
	// 	echo $columns[0];
	// }
	// for ($i=0; $i < count($columns); $i++) { 
	// 	echo $columns[$i][0];
	// }

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
	}

	$str = "";
	$str .= '<div class="card-header">
			<div class="row">
				<div class="col-md-6 h5 font-weight-bold">BIỂU DIỄN DOM</div>
				<div class="col-md-6">
					<div class="text-right">
			            <button type="button" class="btn btn-warning" onclick="ConvertSQLtoXML()">CHUYỂN ĐỔI</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="tree well">
			    <ul>
			        <li>
			            <span><i class="fas fa-folder-open"></i> table_'.$tableName.' </span>
			            <ul>';
			            foreach ($data as $a => $arr) {
			            	$str .= '<li>';
			            	for ($i=0; $i < count($arr) ; $i++) { 
			            		if($i == 0){
			            			$str .= '<span><i class="fas fa-minus-circle"></i> '.$tableName.' </span> '.$columns[$i][0].' = '.$arr[$i].'
			            			<ul>';
			            		} else {
			            			$str .= '<li>
			                            <span><i class="fas fa-leaf"></i> '.$columns[$i][0].' </span> '.$arr[$i].'
			                        </li>';
			            		}
			            	}
			            	$str .='
			                    </ul>
			                </li>';
			            }
			         	$str .='
			            </ul>
			        </li>
			    </ul>
			</div>
		</div>
		<!-- End-Body -->';
	echo $str;
 ?>