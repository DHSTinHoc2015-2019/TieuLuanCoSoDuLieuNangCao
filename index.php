<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiểu luận Cơ sở dữ liệu nâng cao</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
</head>
<body style="background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); min-height: 100vh;">
	<div class="container">
		<form method="post" action="handle/ketnoi.php" enctype="application/x-www-form-urlencoded">
			<div class="row">
				<div class="col-md-12" style="margin-top: 15vh;">
					<p class="font-weight-bold text-center h1">CHUYỂN ĐỔI SQL - XML</p>
				</div>
				<div class="col-md-4 mt-5">
					<div class="form-group">
						<label>Tên server</label>
						<input type="text" class="form-control" placeholder="Nhập tên server" value="localhost" name="servername">
					</div>
				</div>
				<div class="col-md-4 mt-5">
					<div class="form-group">
						<label>Tên user database</label>
						<input type="text" class="form-control" placeholder="Nhập tên user database" value="root" name="username">
					</div>
				</div>
				<div class="col-md-4 mt-5">
					<div class="form-group">
						<label>Mật khẩu database</label>
						<input type="text" class="form-control" placeholder="Nhập mật khẩu" value="" name="password">
					</div>
				</div>

				<div class="col-md-4 mt-5"></div>
				<div class="col-md-4 mt-5">
					<div class="form-group">
						<input type="submit" class="btn btn-outline-primary btn-lg btn-block font-weight-bold" value="KẾT NỐI CƠ SỞ DỮ LIỆU" name="">
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
</body>
</html>