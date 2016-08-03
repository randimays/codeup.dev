<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parkspassword');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($query);

$query = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	location VARCHAR(100) NOT NULL,
	date_established DATE NOT NULL,
	area_in_acres DOUBLE PRECISION(20,2) NOT NULL,
	PRIMARY KEY (id)
	)';

$dbc->exec($query);