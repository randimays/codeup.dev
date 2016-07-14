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

	<h1>Counter Value: <?= $counter ?></h1>

	<p>
		<a href="/counter.php?counter= <?= $counter + 1; ?> ">Up</a>
	</p>
	
	<p>
		<a href="/counter.php?counter= <?= $counter - 1; ?> ">Down</a>
	</p>

</body>
</html>