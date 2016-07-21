<?php

require_once "middleware.php";
require_once "functions.php";
require_once "validation.php";

function newContact($contacts, $name, $number) {
	$message = "";
	$matches = searchContact($contacts, $name);
	if (count($matches) > 0) {
		$message = "There's already a contact named $name. Try another one.";
	}
	$message = "Contact saved successfully!";
	$contacts[] = addContact($name, $number);
	return $contacts;
}


function pageController() {
	$message = "";
	$contacts = loadContacts();
	$data = ["contacts" => $contacts, "message" => $message];
	$searchName = inputHas("search-name") ? inputGet("search-name") : null;
	$name = inputHas("newName") ? inputGet("newName") : null;
	$number = inputHas("newNumber") ? inputGet("newNumber") : null;
	
	if (inputGet("search-name")) { // IF USER SEARCHES
		if (isValidName($searchName)) {
			$data["contacts"] = searchContact($contacts, $searchName);
			return $data;
		} else {
			$data["message"] = "Please enter a valid name.";
			return $data;
		}

	} elseif (inputGet("newName") && inputGet("newNumber")) { // IF USER ADDS	
		if (isValidName($name) && isValidNumber($number)) {
			$contacts = newContact($contacts, $name, $number);
			if (updateContactsFile($contacts)) {
				$data["message"] = "Contact successfully stored.";
				return $data;
			} else {
				$data["message"] = "File write error. Please try again.";
				return $data;
			}
		} else {
			$data["message"] = "Please be sure you've entered a valid name and that your number is 7 or 10 digits in length.";
			return $data;
		}

	} elseif (inputHas("deleteName")) { // IF USER DELETES
		$deleteName = inputGet("deleteName");
		if (isValidName($deleteName)) {
			$contacts = deleteContact($contacts, $deleteName);
			if (updateContactsFile($contacts)) {
				$data["message"] = "Contact successfully deleted.";
				$data["contacts"] = loadContacts();
				return $data;
			} else {
				$data["message"] = "File write error. Please try again.";
				return $data;
			}
		} else {
			$data["message"] = "Please enter a valid name.";
			return $data;
		}
	}
	return $data;
}

extract(pageController());

?>