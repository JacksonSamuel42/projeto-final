<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="./assets/css/apple/app.min.css" rel="stylesheet" />
	<link href="./assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(./assets/img/login-bg/login-bg-11.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>SIG-PAUTA</b> Painel Admin</h4>
					<p>
						<!-- Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit. -->
					</p>
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
				<!-- begin login-header -->
				<div class="login-header">
					<div class="brand">
						<span class="">SIG-PAUTA</span>
					</div>
					<div class="icon">
						<i class="fa fa-sign-in-alt"></i>
					</div>
				</div>
				<!-- end login-header -->
                <!-- begin login-content -->
                <?php include('./config/auth.php')?>
				<div class="login-content">
					<form action="login.php" method="POST" class="margin-bottom-0">
						<div class="form-group m-b-15">
							<input type="text" name="email" class="form-control form-control-lg" placeholder="Email" required />
						</div>
						<div class="form-group m-b-15">
							<input type="password" name="pass" class="form-control form-control-lg" placeholder="Senha" required />
						</div>
						<div class="login-buttons">
							<button name="login_btn" type="submit" class="btn btn-success btn-block btn-lg">Entrar</button>
						</div>
						<hr />
						<p class="text-center text-grey-darker mb-0">
							&copy; SIG-PAUTA 2021
						</p>
					</form>
				</div>
				<!-- end login-content -->
			</div>
			<!-- end right-container -->
		</div>
		<!-- end login -->
		
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="./assets/js/app.min.js"></script>
	<script src="./assets/js/theme/apple.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>
