<?php

function pageController() {

	session_start();
	var_dump($_SESSION);
	$_SESSION["message"] = "";

	// checks is user is logged in, redirects to authorized.php if true)
	if (isset($_SESSION["loggedInUser"])) {
		$_SESSION["message"] = $_SESSION["username"] . ", you are already logged in.";
		header("Location: /authorized.php");
	}

	// checks validity of credentials and returns true only when correct
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

	// checks for true from authenticated and sends user to authorized.php page with all relevant data when true
	if (authenticated()) {
		$_SESSION["loggedInUser"] = session_id();
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["message"] = "Authenticated.";
		header("Location: authorized.php");
	} elseif (authenticated() === false) {
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