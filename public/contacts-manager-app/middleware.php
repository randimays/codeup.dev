<?php

require_once "model.php";

function loadContacts() {
	$content = trim(file_get_contents('data/contacts.txt'));
	$lines = explode("\n", $content);
	$contacts = [];
	foreach ($lines as $line) {
		$contact = explode('|', $line);
		$person["name"] = $contact[0];
		$person["number"] = $contact[1];
		$contacts[] = $person;
	}
	return $contacts;
}

?>