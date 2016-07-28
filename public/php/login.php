<?php

// Create a login, logout and authorized page using Auth and Input objects to authenticate a user and redirect when necessary.

require_once "../../src/Log.php";
require_once "../../src/Auth.php";
require_once "../../src/Input.php";

function pageController() {
	session_start();
	$_SESSION["message"] = "";
	$username = Input::has("username") ? Input::get("username") : null;
	$password = Input::has("password") ? Input::get("password") : null;

	// checks if user is logged in, redirects if true)
	if (Auth::check()) {
		$_SESSION["message"] = $_SESSION["username"] . ", you are already logged in.";
		Auth::redirect("authorized.php");
	}

	// checks for authentication
	if (Auth::attempt($username, $password)) {
		$_SESSION["loggedInUser"] = session_id();
		$_SESSION["username"] = $username;
		$_SESSION["message"] = "Authenticated.";
		Auth::redirect("authorized.php");
	} elseif (Auth::attempt($username, $password) === false) {
		$_SESSION["message"] = "Authentication failed.";
	}

	return $_SESSION;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">
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
					<input type="submit" class="btn btn-default"><p class="authFail"><?=$message?></p>
				</form>
			</div>
		</div>

	</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>