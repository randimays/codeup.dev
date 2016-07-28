<?php

// Create a page with a HIT and Miss button. When you click HIT, the counter should increase and continue the game on Ping's page. If you click MISS, the player missed and the counter resets.

require_once "../../src/Input.php";

function pageController() {
	return [ "counter" => Input::get("counter", 0) ];
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Counter</title>
</head>
<body>

	<h1>Pong</h1>
	<h3>Hit Counter: <?= $counter?></h3>

	<p>
		<a href="/php/ping.php?outcome=hit&amp;counter=<?=$counter + 1 ?>">HIT</a>
	</p>
	
	<p>
		<a href="/php/ping.php?outcome=miss&amp;counter=<?=$counter = 0 ?>">MISS</a>
	</p>

</body>
</html>