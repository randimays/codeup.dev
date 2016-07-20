<?php

function pageController() {

	$adjectives = ['awesome', 'legendary', 'great', 'cool', 'amazing'];
	$nouns = ['php', 'javascript', 'css', 'html', 'mysql'];

	shuffle($adjectives);
	$randomAdjective = array_shift($adjectives);
	shuffle($nouns);
	$randomNoun = array_shift($nouns);

	return [
		"randomAdjective" => $randomAdjective,
		"randomNoun" => $randomNoun
	];
}

extract(pageController());

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<title>Server name generator</title>
</head>
<body>
	<h1><?="$randomAdjective $randomNoun"?></h1>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js">
</script>
</body>
</html>