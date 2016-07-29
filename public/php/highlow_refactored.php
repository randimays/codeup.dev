<?php

// Refactor highlow exercise using sessions

session_start();
$random = mt_rand(1, 100);
$guessCount = 0;

function pageController($random, $guessCount) {	

	if (!isset($_SESSION["random"])) {
		$_SESSION["random"] = $random;
	}	

	if (!isset($_SESSION["guessCount"])) {
		$_SESSION["guessCount"] = $guessCount;
	}
	
	$_SESSION["display"] = "alert-info hidden";
	isset($_POST["guess"]) ? $_POST["guess"] : "";

	if (isset($_POST["guess"])) {
		$_SESSION["display"] = "alert-info";
		if ($_POST["guess"] < $_SESSION["random"]) {
			$_SESSION["feedback"] = "Higher!";
			$_SESSION["guessCount"] = $_SESSION["guessCount"] + 1;
			var_dump($_SESSION["guessCount"]);
		} elseif ($_POST["guess"] > $_SESSION["random"]) {
			$_SESSION["feedback"] = "Lower!";
			$_SESSION["guessCount"] = $_SESSION["guessCount"] + 1;
			var_dump($_SESSION["guessCount"]);
		} else {
			$_SESSION["display"] = "alert-success";
			var_dump($_SESSION["guessCount"]);
			$_SESSION["feedback"] = "You got it! Click 'New Game' to play again!";
		}
	}

	return $_SESSION;
}

extract(pageController($random, $guessCount));

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
			integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
			crossorigin="anonymous"
		>
		<title>High-Low game</title>
		<!--[if lt IE 9]>
			  <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
			  </script>
			  <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
			  </script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<header class="page-header">
				<h1>High-Low Game</h1>
			</header>
			<!-- Switch the class from info to success when the user win -->
			<div class="alert <?=$display?>" role="alert"> <!-- Remove hidden class after first attempt -->
				<p><?=$feedback?></p>
			</div>
			<form method="post">
				<div class="form-group">
					<label for="guess">Guess</label>
					<input
						type="number"
						class="form-control"
						name="guess"
						id="guess" autofocus>
				</div>
				<button type="submit" class="btn btn-primary">
					Guess!
				</button>
			</form>
			<a href="/newgame.php">New Game</a>
		</div>
		<script
			src="https://code.jquery.com/jquery-2.2.4.min.js"
			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			crossorigin="anonymous"
		></script>
		<script
			src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
			integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
			crossorigin="anonymous"
		></script>
	</body>
</html>