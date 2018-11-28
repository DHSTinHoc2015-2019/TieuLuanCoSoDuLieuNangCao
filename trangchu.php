<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiểu luận Cơ sở dữ liệu nâng cao</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bower_components/datatable/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="bower_components/css/style.css">
	<style>
		div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
	</style>
</head>
<body style="min-height: 100vh; background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);">
	<div class="row" style="min-height: 9vh; background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%); width: 100%;">
		<div class="container" style="margin-top: 2vh;">
			<div class="row" style="background-color: white;">
				<div class="col-md-6 button" style="margin: 0px; padding: 0px">
					<button type="button" class="btn btn-outline-danger btn-block font-weight-bold text-uppercase" onclick="chuyenDoi('SQLtoXML');">Chuyển đổi SQL sang XML</button>
				</div>
				<div class="col-md-6 button" style="margin: 0px; padding: 0px">
					<button type="button" class="btn btn-outline-danger btn-block font-weight-bold text-uppercase" onclick="chuyenDoi('XMLtoSQL');">Chuyển đổi XML sang SQL</button>
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
					<div class="card-header font-weight-bold h5">SQL SANG XML</div>
					<div class="card-body">
						<div class="row">
							<!-- Khoi -->
							<div class="col-md-3"></div>
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
							<div class="col-md-3"></div>
							<!-- End-Khoi -->

						</div>
						<!-- End-Row -->
					</div>
					<!-- End-Body -->
				</div>
				<!-- End-Card -->
			</div>

			<div class="col-md-6" id="showList">
				<!-- <div class="card" style="margin-top: 2em;">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">BẢNG</div>
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
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td>Tiger</td>
					                <td>Nixon</td>
					                <td>System Architect</td>
					            </tr>
					        </tbody>
					    </table>
					</div>
				</div> -->
				<!-- End-Card -->
			</div>
			<div class="col-md-6">
				<div class="card" style="margin-top: 2em;" id="showDom">
					<!-- <div class="card-header">
						<div class="row">
							<div class="col-md-6 h5 font-weight-bold">BIỂU DIỄN DOM</div>
							<div class="col-md-6">
								<div class="text-right">
						            <button type="button" class="btn btn-warning" onclick="showxml()">CHUYỂN ĐỔI</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="tree well">
						    <ul>
						        <li>
						            <span><i class="fas fa-folder-open"></i>table_sinhvien </span>
						            <ul>
						                <li>
						                	<span><i class="fas fa-minus-circle"></i> sinhvien </span> id = 1
						                    <ul>
						                        <li>
						                            <span><i class="fas fa-leaf"></i> ten </span> Nguyễn A
						                        </li>
						                        <li>
							                        <span><i class="fas fa-leaf"></i> lop </span> Tin A
						                        </li>
						                    </ul>
						                </li>
						                 <li>
						                    <span><i class="fas fa-minus-circle"></i> sinhvien </span> id = 1
						                    <ul>
						                        <li>
						                            <span><i class="fas fa-leaf"></i> ten </span> Nguyễn A
						                        </li>
						                        <li>
						                            <span><i class="fas fa-leaf"></i> lop </span> Tin A
						                        </li>
						                    </ul>
						                </li>
						            </ul>
						        </li>
						    </ul>
						</div>
					</div> -->
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
	<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="bower_components/datatable/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bower_components/datatable/dataTables.bootstrap4.min.js"></script>
	<script>
		function forDom() {
			$(function () {
				$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
				$('.tree li.parent_li > span').on('click', function (e) {
					var children = $(this).parent('li.parent_li').find(' > ul > li');
					if (children.is(":visible")) {
						children.hide('fast');
						$(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus-circle').removeClass('fa-minus-circle');
					} else {
						children.show('fast');
						$(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
					}
					e.stopPropagation();
				});
			});
		}
		// forDom();
	</script>
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

		//Show dữ liệu cho chọn bảng
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

		//Show dữ liệu cho table
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

		//Show dữ liệu cho DOM
		function showDOM(){
			var idshowDom = document.getElementById("showDom");
			var db = document.getElementById('database').value;
			var tb = document.getElementById('table').value;
			if(db == ""){
				idshowDom.innerHTML = "";
			} else {
				if (window.XMLHttpRequest) {
		            xmlhttp = new XMLHttpRequest();
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                idshowDom.innerHTML = this.responseText;
		                forDom();
		            }
		        };
		        xmlhttp.open("GET","ajax/ajaxGetDOM.php?tb=" + tb + "&db=" + db,true);
		        xmlhttp.send();
			}
		}

		//Chuyển đổi SQL sang XML
		function ConvertSQLtoXML(db, tb){
			var hienthidemo = document.getElementById("HienThidemo");
			var db = document.getElementById('database').value;
			var tb = document.getElementById('table').value;
			if(db == ""){
				return;
			} else {
				if (window.XMLHttpRequest) {
		            xmlhttp = new XMLHttpRequest();
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                if(confirm("Bạn muốn mở file xml?")){
		                	// window.location = "dataXML/db." + db + "." + tb + ".xml";
		                	window.open("dataXML/db." + db + "." + tb + ".xml", "blank");
		                }
		            }
		        };
		        xmlhttp.open("GET","ajax/ajaxCreateXMLFile.php?tb=" + tb + "&db=" + db,true);
		        xmlhttp.send();
			}
		}
	</script>
</body>
</html>