<?php

require_once "functions.php";

function pageController() {
	$counter = inputHas("counter") ? inputGet("counter") : 0;
	return [ "counter" => $counter ];
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Counter</title>
</head>
<body>

	<h1>Ping</h1>
	<h3>Hit Counter: <?= $counter?></h3>

	<p>
		<a href="/pong.php?outcome=hit&amp;counter=<?=$counter + 1 ?>">HIT</a>
	</p>
	
	<p>
		<a href="/ping.php?outcome=miss&amp;counter=<?=$counter = 0 ?>">MISS</a>
	</p>

</body>
</html>