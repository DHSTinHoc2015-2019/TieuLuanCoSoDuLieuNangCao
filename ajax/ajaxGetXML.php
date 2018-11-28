<?php 
	session_start();
	$databasename = strval($_GET['db']);
	$tableName = strval($_GET['tb']);
	// echo $databasename;
	$myFile = "../dataXML/db.".$databasename.".".$tableName.'.xml';
	$fh = fopen($myFile, 'w') or die("Không thể mở file"); 

	$xml = "";
	$xml .= '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
	$xml .= '<table_'.$tableName.'>'.PHP_EOL."\t";
	

	$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $databasename);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	$sql = "SELECT * FROM `".$tableName."`";
	$result = $conn->query($sql);

	if($result){
		$count = 1;
		while($row = $result->fetch_assoc()){	 
			
			$sql1 = "SHOW COLUMNS FROM `".$tableName."`";
			$result1 = $conn->query($sql1);

			if($result1){
				$xml .= '<'.$tableName.' ';
				$column = $result1->fetch_all();
				$result1->free();
				$khoa = 1;
				foreach ($column as $column) {
					if($khoa == 1){
						$khoa = 0; $xml .= $column[0].'="'.$row[$column[0]] .'">'.PHP_EOL."\t\t";
						continue;
					} else {
						$xml .= '<'.$column[0].'>';
						$xml .= $row[$column[0]];
						// echo $row[$column[0]];
						$xml .= '</'.$column[0].'>'.PHP_EOL."\t\t";
					}
				}
				$xml = substr($xml, 0, strlen($xml) - 1);
				$xml .= '</'.$tableName.'>'.PHP_EOL."\t";
			}

			$count++;
		}
	}
	$xml = substr($xml, 0, strlen($xml) - 1);
	$xml .= '</table_'.$tableName.'>'.PHP_EOL;
	fwrite($fh, $xml);
	fclose($fh);
	$conn->close();




	//Hiển thị file xml đến web
	if (file_exists("../dataXML/db.".$databasename.".".$tableName.'.xml')) {
	    $xml = file_get_contents("../dataXML/db.".$databasename.".".$tableName.'.xml');
	    $content = str_replace("<", "&lt;", $xml);
	    $content = str_replace(">", "&gt;", $content);
	    
	    $showHTML = '<div class="card">
						<div class="card-header bg-primary" style="color: white; text-transform: uppercase; text-align: center; font-weight: bold;">
							XML
						</div>
						<div class="card-body">
        <pre class="brush: xml"> 
'.$content.'
						</div>
					</div>';
					echo $showHTML;

	} else {
	    exit('Không tìm thấy file.');
	}

?>
