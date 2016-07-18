<?php

session_start();

function clearSession() {
	session_unset();
	session_regenerate_id(true);
}

// dumps all session data, redirects user to login page
clearSession();
header("Location: /login.php");

?>