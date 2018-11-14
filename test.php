<?php
	if (file_exists('dataXML/table_sinhvien.xml')) {
	    // $xml = simplexml_load_file('dataXML/table_sinhvien.xml');
	     $xml = file_get_contents("dataXML/table_sinhvien.xml");
	   	// echo '<pre>', htmlentities($xml), '</pre>';
	    // echo "<pre>";
	    // print_r($xml);
	     echo $xml;
	    

	} else {
	    exit('Echec lors de l\'ouverture du fichier test.xml.');
	}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<button onclick="display()">aaaaaa</button>
	<textarea><?php echo $xml; ?></textarea>
	<script>
		function display() {
			displayXML('dataXML/table_sinhvien.xml');
		}
	</script>
</body>
</html>