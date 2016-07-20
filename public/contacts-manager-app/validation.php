<?php

require_once "controller.php";

function isValidName($name){
	if (!empty($name)) {
		return $name;
	} else {
		return false;
	}
}

function isValidNumber($number) {
	if (!empty($number) && is_numeric($number) && (strlen($number) ==7 || strlen($number) == 10)) {
		return $number;
	} else {
		return false;
	}
}

?>