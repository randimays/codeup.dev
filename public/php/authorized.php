<?php 

// Create a login, logout and authorized page using Auth and Input objects to authenticate a user and redirect when necessary.

require_once "../../src/Log.php";
require_once "../../src/Auth.php";

function pageController() {
	session_start();

	if (!Auth::check()) {
		$_SESSION["message"] = "Please log in.";
		Auth::redirect("login.php");
	}

	return $_SESSION;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged In</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>

<div class="container">

		<div class="row title text-center">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="loginTitle">Logged In</h3>
			</div>
		</div>

		<div class="row authorize text-center">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<p><?=$message?></p>
				<p class="boldLabel"> Username / Session ID:</p>
				<p class="userData"><?=$username . " / " . $loggedInUser?></p>
			</div>
			<div class="authLinks">
				<a class="loginLink" href="login.php">Back To Login</a>
				<a href="logout.php">Log Out</a>
			</div>
		</div>

	</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>