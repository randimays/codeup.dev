<?php

$plainTextPassword = "1234";

$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT) . PHP_EOL;

var_dump(password_verify(Input::get("password"), $hashedPassword));

