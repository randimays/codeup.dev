<?php

$favoriteThings = ["kittens", "the smell of snow", "weddings", "clean things", "a cool day", "ice skating", "fishing", "hiking", "an upbeat playlist", "coding", "web design"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
	<style>
		#table {
			border: 1px solid darksalmon;
			padding: 10px;
			margin: auto;
			width: 40%;
			text-align: center;
			background-color: linen;
			color: chocolate;
			font-family: monospace;
		}

		th {
			padding-bottom: 10px;
			font-size: 1.25em;
		}

		td {
			border: 1px solid mistyrose;
			padding: 10px;
			margin: 0;
			background-color: oldlace;
		}

		tbody tr:nth-child(odd) td {
			background-color: floralwhite;
		}

	</style>
</head>
<body>
		<table id="table">
			<thead>
				<th>My Favorite Things</th>
			</thead>
			<tbody>
				<?php foreach ($favoriteThings as $thing) : ?>
			<tr><td> <?= $thing; ?></td></tr>
				<?php endforeach; ?>
			</tbody>
		</table>

</body>
</html>