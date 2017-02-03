<?php

$number = 45;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sum Up Those Digits!</title>
</head>
<body>

  <form method="POST">
    <label>Type a number, we'll add up the digits!</label>
    <input type="text" name="number" />
    <input type="submit" />
  </form>

  <p>The sum is: <?= $number; ?></p>

</body>
</html>
