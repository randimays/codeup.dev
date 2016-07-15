<?php

header("Location: counter.php"); // creates a redirect
exit(); // the rest of the code will be executed if not exited

if($_SERVER["REQUEST_METHOD"] == "POST") { // PHP will convert an empty array to false. At least one value will evaluate to true.
	echo "Post request.\n";
} else {
	echo "Get request.\n";
}

// if($_POST) { // PHP will convert an empty array to false. At least one value will evaluate to true.
// 	echo "Post request.\n";
// } else {
// 	echo "Get request.\n";
// }

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$number = isset($_POST["number"]) ? $_POST["number"] : "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>POST Example</title>
</head>
<body>
	<form method="POST">
		<label>Name</label>
		<input type="text" name="name"><br>
		<label>Number</label>
		<input type="text" name="number"><br>
		<input type="submit">
	</form>
</body>
</html>