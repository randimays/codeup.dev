<?php

// Use Sequel Pro to create a new database, user and password. Create a park_migration file that connects to the database and creates a table called national_parks. Populate the table with all national park information for the United States using a file called park_seeder.

$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . "", DB_USER, DB_PASS);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";