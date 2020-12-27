<?php

session_start();
include __DIR__. "../../backend/controllers/ingresso.php";
include __DIR__. "../../backend/models/ingresso.php";

if(isset($_SESSION["validar"])){
	header("location: ./admin/dashboard");
}      

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>SIG-Pauta | Login</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="./assets/css/apple/app.min.css" rel="stylesheet" />
	<link href="./assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-loader -->

	<div class="login login-with-news-feed right">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image:url(../frontend/assets/img/login-bg/login-bg-11.jpg)"></div>

			<div class="news-caption">
				<h4 class="caption-title"><b>SGN</b> Painel Admin</h4>
				<p>
					<!-- Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet,
						ggggg consectetur adipiscing elit. -->

				</p>
			</div>
		</div>

		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header mb-2">
				<div class="brand">
					<span class=""><i class="far fa-user-circle"></i></span> <b>SGN</b> Admin
					<small>Coloque seus dados para acessar</small>
				</div>
				<div class="icon">
					<i class="fa fa-sign-in-alt"></i>
				</div>
			</div>

			<?php
				$login = new ingresso();
				$login -> IngressoController();
			?>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
				<form method="POST" class="margin-bottom-0">
					<div class="form-group m-b-15">
						<input type="text" name="usuarioIngresso" class="form-control form-control-lg"
							placeholder="Email" required />
					</div>
					<div class="form-group m-b-15">
						<input type="password" name="passwordIngresso" class="form-control form-control-lg"
							placeholder="Senha" required />
					</div>
					<div class="login-buttons">
						<input type="submit" name="login_btn" class="btn btn-success btn-block btn-lg" value="Entrar">
					</div>



					<hr />
					<p class="text-center text-grey-darker mb-0">
						&copy; SGN 2020
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

	<!-- ================== END BASE JS ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="./assets/js/app.min.js"></script>
	<script src="./assets/js/theme/apple.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>

</html>