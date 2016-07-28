<?php

// Create a login, logout and authorized page using Auth and Input objects to authenticate a user and redirect when necessary.

require_once "../../src/Log.php";
require_once "../../src/Auth.php";

function pageController() {
	session_start();
	Log::info("User $username logged out.");
	Auth::logout();
}

pageController();

?>