<?php

	function pageController() {
		$data = [];
		$data["counter"] = isset($_GET["counter"]) ? $_GET["counter"] : 0;
		return $data;
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
		<a href="/ping.php?outcome=hit&amp;counter=<?=$counter + 1 ?>">HIT</a>
	</p>
	
	<p>
		<a href="/ping.php?outcome=miss&amp;counter=<?=$counter = 0 ?>">MISS</a>
	</p>

</body>
</html>