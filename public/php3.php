<?php

if (isset($_GET["name"])) {
	$name = $_GET["name"];
} else {
	$name = "";
}

$names = ["Randi", "John", "Pam", "Gary"];

	// function pageController() {
	// 	$data = [];
	// 	$data["message"] = "Hello Kings!";
	// 	return $data;
	// }
	// extract(pageController());
?>


<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>

	<!-- <h1><?= $message ?></h1> -->

	<h1>Hello <?= $name; ?></h1>

	<?php foreach ($names as $name) : ?>
	<p><a href="/php3.php?name= <?= $name; ?>"><?= $name; ?></a></p>
	<?php endforeach; ?>

	<!-- <form method="GET" action="https://duckduckgo.com/">
    <input type="text" name="q" value="" placeholder="Search DuckDuckGo">
    <button type="submit">Go!</button> -->
</form>

</body>
</html>