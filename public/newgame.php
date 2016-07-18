<?php
session_start();

function clearSession() {
	session_unset();
	session_regenerate_id(true);
}

clearSession();
header("Location: /highlow_refactored.php");

?>