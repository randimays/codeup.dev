<?php

// List all national parks from your parks_db database. Each page load should retrieve the parks from the database and display them. Modify the query to load only 4 parks at a time. Add links for pagination and logic to determine whether to show the previous/next links.

// Update Input.php functions to throw exceptions if the user entry does not fit the proper data type. Add an additional method that returns an instance of the DateTime class and update the code to correctly handle a DateTime object when inserting.

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parkspassword');

require '../../php/db_connect.php';
require '../../src/Input.php';

function getTotalParks (PDO $dbc) {
	$stmt = $dbc->prepare("SELECT count(*) FROM national_parks");
	$stmt->execute();
	return $stmt->fetchColumn();
}

function getMaxPage ($rowCount, $pageSize) {
	return ceil($rowCount/$pageSize);
}

function getCurrentPage ($maxPage) {
	$currentPage = Input::has('page') ? Input::get('page') : 1;

	if ($currentPage < 1 || !is_numeric($currentPage)) {
		return 1;
	} elseif ($currentPage > $maxPage) {
		return $maxPage;
	}
	return $currentPage;
}

function getOffset ($page, $pageSize) {
	return ($page - 1) * $pageSize;	
}

function getLimitedPages (PDO $dbc, $page, $pageSize, $offset) {
	$stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");
	$stmt->bindValue(':limit', $pageSize, PDO::PARAM_INT);
	$stmt->bindValue(':offset', getOffset($page, $pageSize), PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pageController(PDO $dbc) {
	$pageSize = 4;
	$rowCount = getTotalParks($dbc);
	$maxPage = getMaxPage($rowCount, $pageSize);
	$page = getCurrentPage($maxPage);
	$parks = getLimitedPages($dbc, $page, $pageSize, getOffset($page, $pageSize));

	// Define variables for user entry form
	$name = Input::getString('name');
	$location = Input::getString('location');
	$date = Input::getString('date');
	$area = Input::getNumber('area');
	$description = Input::getString('description');
	
	// Create & execute query for user entry
	if (Input::isPost()) {
		$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
		$stmt = $dbc->prepare($query);
		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $date, PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres', $area, PDO::PARAM_INT);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
		$stmt->execute();
	}

	return [
		'parks' => $parks, 
		'page' => $page, 
		'maxPage' => $maxPage
	];
}

extract(pageController($dbc));

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		h3 {
			margin-top: 20px;
			margin-bottom: 20px;
		}

		hr {
			margin-top: 35px;
			margin-bottom: 35px;
		}
	</style>
</head>
<body>

	<h2 class="text-center">National Parks Database</h2>
	<div class="container">
		<hr>
		<h3 class="text-center">Add A New Park</h3>
		<form method="post" class="form-horizontal">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">
					Park Name
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name" placeholder="Name">
				</div>
			</div>
			<div class="form-group">
				<label for="location" class="col-sm-2 control-label">
					Location
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="location" id="location" placeholder="State">
				</div>
			</div>
			<div class="form-group">
				<label for="date" class="col-sm-2 control-label">
					Date Established
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="date" id="date" placeholder="YYYY-MM-DD">
				</div>
			</div>
			<div class="form-group">
				<label for="area" class="col-sm-2 control-label">
					Area (Acres)
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="area" id="area" placeholder="00000.00">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">
					Description
				</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="description" id="description" placeholder="Text description">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
						</span>
						Save
					</button>
				</div>
			</div>
		</form>
		<hr>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Number</th>
					<th>National Park</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Area (Acres)</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($parks as $park) : ?>
					<tr>
						<?php foreach ($park as $detail) : ?>
							<td><?= $detail ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot> <!-- Pagination -->
				<tr>
					<td colspan="6">
						<nav aria-label="Page navigation" class="text-center">
							<ul class="pagination">
								<?php if ($page > 1) : ?>
									<li>
										<a href="?page=<?= ($page - 1) ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
								<?php endif; ?>

								<?php for ($i = 1; $i <= $maxPage; $i++) : ?>
									<li>
										<a href="?page=<?= $i ?>"><?=$i?></a>
									</li>
								<?php endfor; ?>

								<?php if ($page < $maxPage) : ?>
									<li>
										<a href="?page=<?= $page + 1?>" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</nav>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>