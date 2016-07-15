<?php

function pageController() {

	$data = [];
	$data["message"] = "";

	function authenticated() {
		$username = isset($_POST["username"]) ? $_POST["username"] : null;
		$password = isset($_POST["password"]) ? $_POST["password"] : null;

		if ($username == "guest" && $password == "password") {
			$authenticated = true;
		} elseif ($username == null && $password == null) {
			$authenticated = null;
		} else {
			$authenticated = false;
		}

		return $authenticated;
	}

	if (authenticated()) {
		header("Location: authorized.php");
		exit();
	} elseif (authenticated() === false) {
		$data["message"] = "Authentication failed.";
	}

	return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.css">
	<style>

		.container {
			width: 400px;
			margin: 100px auto 0 auto;
			border: 1px solid #eee;
		}

		.loginTitle {
			color: slategray;
		}

		.form {
			padding: 30px;
		}

		.title {
			background-color: #f4f7f9;
			padding-bottom: 8px;
		}

		.loginFormLabel {
			color: slategray;
		}

		.btn-default {
			background-color: slategray;
			color: #fff;
			border-color: slategray;
			margin-top: 5px
			vertical-align: middle;
		}

		.btn-default:hover, .btn.btn-default:active {
			background-color: #fff;
			color: cadetblue;
		}

		.authFail {
			display: inline;
			color: tomato;
			margin-left: 12px;
		}

	</style>
</head>
<body>

	<div class="container">

		<div class="row title text-center">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="loginTitle">LOG IN</h3>
			</div>
		</div>

		<div class="row form">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form method="POST">
					<div class="form-group">
						<label for="username" class="loginFormLabel">Username</label>
						<input type="text" name="username" placeholder="username" id="usernameField" class="form-control">
					</div>

					<div class="form-group">
						<label for="password" class="loginFormLabel">Password</label>
						<input type="password" name="password" placeholder="password" id="passwordField" class="form-control">
					</div>
					<input type="submit" class="btn btn-default"><p class="authFail"><?= $message ?></p>
				</form>
			</div>
		</div>

	</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>