<?php

class Input {

	public static function has($key) {
		return isset($_REQUEST[$key]);
	}

	public static function get($key, $default = null) {
		return static::has($key) ? $_REQUEST[$key] : $default;
	}

	public static function isPost(){
	 	return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	public static function getString($key) {
		$value = static::get(trim($key));

		if (static::isPost() && (empty($value) || !is_string(trim($value)))) {
			throw new Exception ("$key does not exist or you did not enter a valid $key.");
		}
		return (string)$value;
	}

	public static function getNumber($key) {
		$value = static::get(trim($key));

		if (static::isPost() && (empty($value) || !is_numeric(trim($value)))) {
			throw new Exception ("$key does not exist or you did not enter a valid $key.");
		}
		return floatval($value);
	}

	public static function getDate($key) {
		$value = static::get(trim($key));
		$year = substr($value, 0, 4);
		$month = substr($value, 5, 1);
		$day = substr($value, 8, 1);
		if (is_int($key) || checkdate($month, $day, $year)) {
			$date = new DateTime($value);
			$date->format('Y-m-d');
		}
		return DateTime::$date;
	}

	private function __construct() {}
}
