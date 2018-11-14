<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiểu luận Cơ sở dữ liệu nâng cao</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<style>
		div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
	</style>
</head>
<body style="min-height: 100vh;">
	<div class="row" style="min-height: 9vh; background-color: #007bff; width: 100%;">
		<div class="container" style="margin-top: 2vh;">
			<div class="row" style="background-color: white;">
				<div class="col-md-6 button" style="margin: 0px; padding: 0px">
					<button type="button" class="btn btn-outline-danger btn-block" style="font-weight: bold; text-transform: uppercase;" onclick="chuyenDoi('SQLtoXML');">Chuyển đổi SQL sang XML</button>
				</div>
				<div class="col-md-6 button" style="margin: 0px; padding: 0px">
					<button type="button" class="btn btn-outline-danger btn-block" style="font-weight: bold; text-transform: uppercase;" onclick="chuyenDoi('XMLtoSQL');">Chuyển đổi XML sang SQL</button>
				</div>
			</div>
		</div>
	</div>
	<?php 
		require 'require/SelectDatabase.php';
	?>
	<div class="container-fluid" id="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">SQL SANG XML</div>
					<div class="card-body">
						<div class="row">
							<!-- Khoi -->
							<div class="col-md-2">
								<fieldset class="form-group">
									<label>Tên server</label>
									<input type="text" class="form-control" id="" placeholder="Nhập tên server" value="localhost">
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="form-group">
									<label>Tên user database</label>
									<input type="text" class="form-control" id="" placeholder="Nhập tên user database" value="root">
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="form-group">
									<label>Mật khẩu database</label>
									<input type="text" class="form-control" id="" placeholder="Nhập mật khẩu database" value="">
								</fieldset>
							</div>
							<div class="col-md-3">
								<fieldset class="form-group">
									<label>Chọn database</label>
									<select class="form-control" name="database" onchange="showTable(this.value)" id="database" required="">
										<option selected value="">Chọn cơ sở dữ liệu</option>
									<?php 
										foreach ($allDatabase as $allDatabase) {
											echo '<option value="'.$allDatabase[0].'">'.$allDatabase[0].'</option>'."\n";
										}
									?>
									</select>
								</fieldset>
							</div>
							<div class="col-md-3">
								<fieldset class="form-group">
									<label>Chọn bảng</label>
									<select class="form-control" id="table" onchange="showList(this.value)">
										<option selected>Chọn bảng</option>
										
									</select>
								</fieldset>
							</div>
							<!-- End-Khoi -->

							<!-- Khoi -->
							<!-- <div class="col-md-4"></div>
							<div class="col-md-4">
								<button type="button" class="btn btn-warning btn-block btn-lg" onclick="showxml()">Chuyển đổi</button>
							</div>
							<div class="col-md-4"></div> -->
							<!-- End-Khoi -->

						</div>
						<!-- End-Row -->
					</div>
					<!-- End-Body -->
				</div>
				<!-- End-Card -->
			</div>

			<div class="col-md-8" id="showList">
				<div class="card" style="margin-top: 2em;">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">BANG</div>
							<div class="col-md-6">
								<div class="text-right">
						            <button type="button" class="btn btn-warning" onclick="showxml()">BIỂU DIỄN DOM</button>
						            <button type="button" class="btn btn-warning" onclick="showxml()">CHUYỂN ĐỔI</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th>First name</th>
					                <th>Last name</th>
					                <th>Position</th>
					                <th>Office</th>
					                <th>Age</th>
					                <th>Start date</th>
					                <th>Salary</th>
					                <th>Extn.</th>
					                <th>E-mail</th>
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td>Tiger</td>
					                <td>Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td>$320,800</td>
					                <td>5421</td>
					                <td>t.nixon@.net</td>
					            </tr>
					            <tr>
					                <td>Tiger</td>
					                <td>Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td>$320,800</td>
					                <td>5421</td>
					                <td>t.nixon@.net</td>
					            </tr>
					        </tbody>
					    </table>
					</div>
					<!-- End-Body -->
				</div>
				<!-- End-Card -->
			</div>
			<div class="col-md-4">
				<div class="card" style="margin-top: 2em;">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">BIỂU DIỄN DOM</div>
							<div class="col-md-6">
								<div class="text-right">
						            <button type="button" class="btn btn-warning" onclick="showxml()">CHUYỂN ĐỔI</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<ul id="myUL">
							<li><span class="caret">Bảng sinhvien</span>
								<ul class="nested">
									<li><span class="caret">sinhvien</span>
										<ul class="nested">
											<li>Black Tea</li>
											<li>White Tea</li>
											<li><span class="caret">Green Tea</span>
												<ul class="nested">
													<li>Sencha</li>
													<li>Gyokuro</li>
													<li>Matcha</li>
													<li>Pi Lo Chun</li>
												</ul>
											</li>
										</ul>
									</li>  
								</ul>
							</li>
						</ul>
					</div>
					<!-- End-Body -->
				</div>
				<!-- End-Card -->
			</div>
		</div>
	</div>

	<!-- End-container-fluid -->
	<!-- <div class="row" style="min-height: 25vh; background-color: green; width: 100%;">
		foter
	</div> -->
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script>
		document.getElementById('content').style.display = 'none';
		// document.getElementById('showList').style.display = 'none';
		var checkTable = false;
		var btn = document.getElementsByClassName('button');
		for (var i = 0; i < btn.length; i++) {
			btn[i].onclick = function() {
				for (var i = 0; i < btn.length; i++) {
					btn[i].getElementsByTagName('button')[0].style.backgroundColor = "white";
					btn[i].getElementsByTagName('button')[0].style.color = "#dc3545";
				}
				this.getElementsByTagName('button')[0].style.backgroundColor = "#dc3545";
				this.getElementsByTagName('button')[0].style.color = "white";
				
			}
		}

		function chuyenDoi(str) {
			if(str == 'SQLtoXML'){
				// console.log('SQLtoXML');
				document.getElementById('content').style.display = '';
				if(!checkTable){
					$('#example').DataTable( {
				        "scrollX": true
				    } );
				    checkTable = true;
				}
			} else {
				// console.log('XMLtoSQL');
				document.getElementById('content').style.display = 'none';
			}
		}

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
		        xmlhttp.open("GET","ajax/ajaxGetTable.php?q="+str,true);
		        xmlhttp.send();
		    }
		}

		function showList(str) {
		    if (str == "") {
		        document.getElementById("showList").innerHTML = "";
		        return;
		    } else {
		    	var db = document.getElementById('database').value;
		    	document.getElementById('showList').style.display = '';
		        if (window.XMLHttpRequest) {
		            xmlhttp = new XMLHttpRequest();
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("showList").innerHTML = this.responseText;
		                $('#example').DataTable( {
				        "scrollX": true
				    } );
		            }
		        };
		        xmlhttp.open("GET","ajax/ajaxGetList.php?tb=" + str + "&db=" + db,true);
		        xmlhttp.send();
		    }
		}
	</script>
</body>
</html>