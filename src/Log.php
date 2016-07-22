<?php

class Log {
	public static $handle;
	public static $filename;

	public function __construct($prefix = "log-") {
		self::$filename = "$prefix" . date("Y-m-d") . ".log";
		self::$handle = fopen(self::$filename, "a");
	}

	public static function logMessage($level, $message) {
		$formattedMessage = date("Y-m-d H:i:s") . " [$level] $message";
		fwrite(self::$handle, $formattedMessage);
	}

	public static function info($message) {
		self::logMessage("INFO", $message);
	}

	public static function error($message) {
		self::logMessage("ERROR", $message);
	}

	public function __destruct() {
		fclose(self::$handle);
	}

}

?>