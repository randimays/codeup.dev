<?php

require_once "functions.php";

function pageController($location) {
	session_start();
	clearSession();
	redirect("login.php");
}

pageController();

?>