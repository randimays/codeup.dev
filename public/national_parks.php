<?php

// List all national parks from your parks_db database. Each page load should retrieve the parks from the database and display them. Modify the query to load only 4 parks at a time. Add links for pagination and logic to determine whether to show the previous/next links.

function pageController() {
	
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'parks_db');
	define('DB_USER', 'parks_user');
	define('DB_PASS', 'parkspassword');

	require '../php/db_connect.php';

	$query = "SELECT * FROM national_parks";
	$stmt = $dbc->query($query);

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
	}
	// var_dump($rows);
	return ['rows' => $rows];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

	<h2 class="text-center">National Parks Database</h2>

	<div class="container">
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>Number</th>
					<th>National Park</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Area (Acres)</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rows as $park) : ?>
					<tr>
						<?php foreach ($park as $detail) : ?>
								<td><?= $detail ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>