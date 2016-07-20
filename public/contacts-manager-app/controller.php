<?php

require_once "middleware.php";
require_once "functions.php";
require_once "validation.php";

$message = "";

function newContact($contacts, $name, $number) {
	$matches = searchContact($contacts, $name);
	if (count($matches) > 0) {
		$message = "There's already a contact named $name. Try another one.";
	}
	$message = "Contact saved successfully!";
	$contacts[] = addContact($name, $number);
	return $contacts;
}


function pageController() {
	$contacts = loadContacts();
	$searchName = inputHas("search-name") ? inputGet("search-name") : null;
	$name = inputHas("newName") ? inputGet("newName") : null;
	$number = inputHas("newNumber") ? inputGet("newNumber") : null;
	
	if (inputGet("search-name")) { // IF USER SEARCHES
		if (isValidName($searchName)) {
			$contacts = searchContact($contacts, $searchName);
			return ["contacts" => $contacts];
		} else {
			$message = "Please enter a valid name.";
		}

	} elseif (inputGet("newName") && inputGet("newNumber")) { // IF USER ADDS	
		if (isValidName($name) && isValidNumber($number)) {
			$contacts = newContact($contacts, $name, $number);
			if (updateContactsFile($contacts)) {
				$message = "Contact successfully stored.";
				$contacts = loadContacts();
				return ["contacts" => $contacts];
			} else {
				$message = "File write error. Please try again.";
			}
		} else {
			$message = "Please be sure you've entered a valid name and that your number is 7 or 10 digits in length.";
		}

	} elseif (inputHas("deleteName")) { // IF USER DELETES
		$deleteName = inputGet("deleteName");
		if (isValidName($deleteName)) {
			$contacts = deleteContact($contacts, $deleteName);
			if (updateContactsFile($contacts)) {
				$message = "Contact successfully deleted.";
				$contacts = loadContacts();
				return ["contacts" => $contacts];
			} else {
				$message = "File write error. Please try again.";
			}
		} else {
			$message = "Please enter a valid name.";
		}
	}
	return ["contacts" => $contacts];
}

?>