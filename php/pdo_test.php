<?php

// Use Sequel Pro to create a new database, user and password. Create a park_migration file that connects to the database and creates a table called national_parks. Populate the table with all national park information for the United States using a file called park_seeder.

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'employees');
define('DB_USER', 'vagrant');
define('DB_PASS', 'vagrant');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";