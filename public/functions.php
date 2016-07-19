<?php

function redirect($location) {
	header("Location: $location");
	exit;
}

function clearSession() {
	session_unset();
	session_regenerate_id(true);
}

function inputHas($key) {
	if (isset($_REQUEST["$key"])) {
		return true;
	}
	return false;
}

function inputGet($key) {
	if (inputHas($key)) {
		return $_REQUEST["$key"];
	}
	return null;
}

function escape($input) {
	$input = "";
	return $input;
}

// checks validity of creds & returns true when typed correctly
function authenticated($username, $password) {
	if ($username == "guest" && $password == "password") {
		$authenticated = true;
	} elseif ($username == null && $password == null) {
		$authenticated = null;
	} else {
		$authenticated = false;
	}
	return $authenticated;
}

?>