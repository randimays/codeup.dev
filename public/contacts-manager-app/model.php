<?php

require_once "controller.php";

function addContact($name, $number) {
	$contact = [
		'name' => $name,
		'number' => $number,
	];
	return $contact;
}

function searchContact($contacts, $name) {
	$matches = [];
	foreach ($contacts as $contact) {
		if (strpos($contact['name'], $name) !== false) {
			$matches[] = $contact;
		}
	}
	return $matches;
}

function updateContactsFile($contacts) {
	$content = '';
	foreach ($contacts as $contact) {
		$content .= implode('|', $contact) . "\n";
	}
	file_put_contents('data/contacts.txt', $content);
}

function deleteContact($contacts, $deleteName) {
	foreach ($contacts as $key => $contact) {
		if (strpos($contact['name'], $deleteName) !== false) {
			unset($contacts[$key]);
		}
	}
	return $contacts;
}

?>