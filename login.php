<!DOCTYPE html>
<html>
	<head>
	<title>Login Form</title>
	<meta name="robots" content="noindex, nofollow">
	<!-- Include CSS File Here -->
	<link rel="stylesheet" href="assets/css/login.css"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- Include CSS File Here -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/login.js"></script>
</head>
<body>
	<?php session_start(); session_destroy();?>
	<div class="container">
		<div class="row justify-content-md-center div-title">
			<img src="assets/img/poly-aubergine.jpg" class="rounded float-left aubergine-img" alt="Aubergine">
			<h1 class="title">Aubergine</h1>
		</div>
		<div class="row justify-content-md-center">
			<div id="login-container" class="col-8">
				<form class="form" method="post" action="#">
					<h2>Login Form</h2>
					<div class="form-group">
						<label>User name :</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<a href="register.html" class="link">Register Now!</a>
					<input type="button" name="login" id="login" value="Login" class="form-control btn btn-primary col-2">
				</form>
			</div>
		</div>
	</div>
</body>
</html>