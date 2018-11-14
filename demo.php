<?php
	$servername = 'localhost';
	$usernamedb = 'root';
	$passwordb = '';
$a = new mysqli($servername, $usernamedb, $passwordb);
$sql = "SHOW DATABASES";
$result = $a->query($sql);

if($result){
	while($row = $result->fetch_assoc()){
			// echo $row['Tables_in_tieuluancsdlnc'] . "&nbsp;"; 
			echo $row["Database"] . "<br />";
			echo "<hr>";
		}
	}

	$a->close();


// require('Connection.php');
// $sql = "SELECT * FROM `slide`";
// $result = $conn->query($sql);

// if($result->num_rows > 0){
// 	while($row = $result->fetch_assoc()){
// 		echo $row['img_slide']."<br>";
// 		echo $row['tieu_de']."<br>";
// 		echo $row['noi_dung_slide'];
// 		echo "<hr>";
// 	}
// }
// $conn->close();
echo "lấy tên các bảng trong database";
require('Connection.php');
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
			echo $row['Tables_in_tieuluancsdlnc'] . "&nbsp;"; 
		// print_r($row);
			// echo $row["Type"] . "<br />";
			echo "<hr>";
		}
	}

	$conn->close();

$tableName = "sinhvien";
$myFile = "rss.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 

$rss_txt = "";
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
$rss_txt .= '<table_'.$tableName.'>'.PHP_EOL."\t";
require('Connection.php');
$sql = "SELECT * FROM `sinhvien`";
$result = $conn->query($sql);

if($result->num_rows > 0){
	$count = 1;
	while($row = $result->fetch_assoc()){	 
		// echo $row['id']."<br>";
		$rss_txt .= '<'.$tableName.$count.'>'.PHP_EOL."\t";
		$sql1 = "SHOW COLUMNS FROM `sinhvien`";
		$result1 = $conn->query($sql1);

		if($result1->num_rows > 0){
			while($row1 = $result1->fetch_assoc()){
				$rss_txt .= '<'.$row1["Field"].'>';
				$rss_txt .= $row[$row1["Field"]];
				$rss_txt .= '</'.$row1["Field"].'>'.PHP_EOL."\t";
				// echo "<hr>";
			}
		}
		$rss_txt .= '</'.$tableName.$count.'>'.PHP_EOL;
		$count++;
	}
}

$rss_txt .= '</table_sinhvien>'.PHP_EOL;
echo $rss_txt;
fwrite($fh, $rss_txt);
fclose($fh);
$conn->close();

?>                