<?php

function addNumbers($number) {
  $sum = 0;
  if (is_numeric(intval($number))) {
    for ($i = 0; $i < strlen($number); $i++) {
      $sum += $number[$i];
    }
    return $sum;
  }
  return false;
}

function runProgram() {
  fwrite(STDOUT, "Please enter a number: ");
  $number = trim(fgets(STDIN));
  $result = addNumbers($number);
  if ($result) {
    fwrite(STDOUT, "The sum of your number is: " . $result . "\n");
  }
  fwrite(STDERR, "You did not enter a number, please try again.\n");
}

runProgram();

do {
  fwrite(STDOUT, "Want to try again? y/n: ");
  $response = trim(fgets(STDIN));
  if ($response == "y" || $response == "Y") {
    runProgram();
  } else if ($response == "n" || $response == "N") {
    fwrite(STDOUT, "Exiting app.\n");
    exit(0);
  }
} while ($response !== "n" && $response !== "N");
