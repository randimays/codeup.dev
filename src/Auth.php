<?php

require_once "Log.php";

class Auth {

	public static $username = "guest";
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password) {
		$log = new Log();
		if ($username === self::$username && password_verify($password, self::$password)) {
			Log::info("User {$username} logged in." . PHP_EOL);
			return true;
		} elseif ($username == null && $password == null) {
			return null;
		} else {
			Log::error("User {$username} failed to log in." . PHP_EOL);
			return false;
		}
	}

	public static function check() {
		return isset($_SESSION["loggedInUser"]);
	}

	public static function user() {
		return $_SESSION["username"];
	}

	public static function redirect($location) {
		header("Location: $location");
		exit;
	}

	public static function logout() {
		session_unset();
		session_regenerate_id(true);
		self::redirect("login.php");
	}

}