<?php
function redirect($location) {
	header("Location: $location");
	exit;
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

?>