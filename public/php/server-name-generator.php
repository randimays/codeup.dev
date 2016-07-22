<?php

function pageController() {
	$data = [];

	// model
	$adjectives = ["miniature", "tender", "average", "mammoth", "addictive", "loose", "undiscerning", "shy", "crass", "foul", "ridiculous", "sandy", "eccentric", "stagnant"];
	$nouns = ["salesman", "bulldozer", "lima bean", "weasel", "funnel cake", "snowman", "ballad", "rubber duck", "spaceship", "tapdancer", "flounder", "seamstress"];

	// controller
	function randomizer($array) {
		$random = rand(0, count($array));
		return $array[$random];
	}

	function newName($random1, $random2) {
		return $random1 . " " . $random2;
	}

	$randomAdjective = randomizer($adjectives);
	$randomNoun = randomizer($nouns);
	$data["randomName"] = newName($randomAdjective, $randomNoun);
	
	return $data;
}

extract(pageController());

?>

<!-- view -->

<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
	<style>
		p {
			color: chocolate;
			font-weight: bold;
		}

		span {
			color: burlywood;
			font-family: sans-serif;
			font-size: .90em;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<p>New server name: &nbsp;<span><?= $randomName; ?> </span></p>

</body>
</html>