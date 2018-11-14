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
		// 	// echo $allDatabase[0];
		// }
	}
		
	$connection->close();
		

	// require('Connection.php');
	// $sql = "SHOW TABLES";
	// $result = $conn->query($sql);

	// if($result->num_rows > 0){
	// 	while($row = $result->fetch_assoc()){
	// 			// echo $row['Tables_in_tieuluancsdlnc'] . "&nbsp;"; 
	// 		}
	// }

	// $conn->close();

	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiểu luận Cơ sở dữ liệu nâng cao</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link href="bower_components/SyntaxHighlighter/shCore.css" rel="stylesheet" type="text/css">
    <link href="bower_components/SyntaxHighlighter/shThemeDefault.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<form>
			<div class="row">
				<div class="col-md-4">
					<fieldset class="form-group">
						<label for="">Nhập tên server</label>
						<input type="text" class="form-control" id="" placeholder="Nhập tên server" value="localhost">
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset class="form-group">
						<label for="">Nhập tên user database</label>
						<input type="text" class="form-control" id="" placeholder="Nhập tên user database" value="root">
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset class="form-group">
						<label for="">Nhập mật khẩu database</label>
						<input type="text" class="form-control" id="" placeholder="Nhập mật khẩu database" value="">
					</fieldset>
				</div>

				<div class="col-md-2"></div>
				<div class="col-md-4">
					<fieldset class="form-group">
						<select class="form-control" name="database" onchange="showTable(this.value)" id="database">
							<option selected>Chọn cơ sở dữ liệu</option>
						<?php 
							foreach ($allDatabase as $allDatabase) {
								echo '<option value="'.$allDatabase[0].'">'.$allDatabase[0].'</option>'."\n";
							}
						?>
						</select>
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset class="form-group">
						<select class="form-control" id="table">
							<option selected>Chọn bảng</option>
							
						</select>
					</fieldset>
				</div>
				<div class="col-md-2"></div>

				<div class="col-md-4"></div>
				<div class="col-md-4">
					<button type="button" class="btn btn-warning btn-block btn-lg" onclick="showxml()">Chuyển đổi</button>
				</div>
				<div class="col-md-4"></div>

				<div class="col-md-4" id="showxml">
					<div class="card">
						<div class="card-header bg-primary" style="color: white; text-transform: uppercase; text-align: center; font-weight: bold;">
							XML
						</div>
						<div class="card-body">
        <pre class="brush: xml"> 
&lt;header&gt;
  &lt;h1&gt;Example HTMExample HTMExample HTML&lt;/h1&gt;
  &lt;/header&gt;
  &lt;main class=&quot;style&quot;&gt;
  &lt;p&gt;Some text&lt;/p&gt;
&lt;/main&gt;
</pre>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	<script>
		function showTable(str) {
		    if (str == "") {
		        document.getElementById("table").innerHTML = "";
		        return;
		    } else {
		        if (window.XMLHttpRequest) {
		            xmlhttp = new XMLHttpRequest();
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("table").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","ajaxGetTable.php?q="+str,true);
		        xmlhttp.send();
		    }
		}
		function showxml() {
			var database = document.getElementById('database').value;
			var table = document.getElementById('table').value;
	        if (window.XMLHttpRequest) {
	            xmlhttp = new XMLHttpRequest();
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("showxml").innerHTML = this.responseText;
	                SyntaxHighlighter.highlight();
	                document.getElementById("showxml").getElementsByClassName('toolbar')[0].style.display = "none";
	            }
	        };
	        xmlhttp.open("GET","ajaxGetXML.php?db=" + database + "&tb=" + table, true);
	        xmlhttp.send();
	  		
		}
		// function showxml() {
		// 	console.log(document.getElementById('database').value);
		// 	console.log(document.getElementById('table').value);
		// 	var database = document.getElementById('database').value;
		// 	var table = document.getElementById('table').value;
	 //        $.ajax({
		// 	  url: "ajaxGetXML.php",
		// 	  data: {db: database, tb: table},
		// 	  context: document.body
		// 	}).done(function(ketqua) {
  //               $('#showxml').html(ketqua);
  //               SyntaxHighlighter.highlight();
  //           });
	  		
		// }
		
	</script>
	<script src="bower_components/SyntaxHighlighter/shCore.js"></script>
    <script src="bower_components/SyntaxHighlighter/shBrushXml.js"></script>
	<script>
		SyntaxHighlighter.all();
	</script>
</body>
</html> 