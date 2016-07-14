<?php

	function pageController() {

		$data = [];

		if (isset($_GET["counter"])) {
			$data["counter"] = $_GET["counter"];
		} else {
			$data["counter"] = 0;
		}

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

	<h1>Hit Counter: <?= $counter ?></h1>

	<p>
		<a href="/ping.php?outcome=hit&counter=<?=$counter + 1 ?>">HIT</a>
	</p>
	
	<p>
		<a href="/ping.php?outcome=miss&counter=<?=$counter = 0 ?>">MISS</a>
	</p>

</body>
</html>