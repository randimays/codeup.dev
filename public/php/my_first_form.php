<?php

// Experiment with GET and POST methods by submitting the form and viewing the results in your browser. Try deleting the name attributes from the inputs and submit again. What do you observe?

  var_dump($_GET);
  var_dump($_POST);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My First HTML Form</title>
	</head>
	<body>
		<h2>Login Form</h2>
		<form method="POST" action="http://requestb.in/1ittlxw1">
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Enter username here.">
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Enter your password.">
			</p>
			<p>
				<input type="submit" value="Login">
			</p>
		</form>

		<h2>Compose An Email</h2>
		<form method="POST" action="http://requestb.in/1ittlxw1">
			<p>
				<label for="to">To:</label>
				<input id="to" name="to" type="text">
			</p>
			<p>
				<label for="from">From:</label>
				<input id="from" name="from" type="text">
			</p>
			<p>
				<label for="subject">Subject:</label>
				<input id="subject" name="subject" type="text">
			</p>
			<p>
				<label for="body">Email Body:</label>
				<textarea name="body" id="body" rows="5" cols="40"></textarea>
			</p>
			<p>
				<label>
					<input type="checkbox" id="savecopy" name="savecopy" value="yes" checked>Save a copy to your sent folder?
				</label>
			<p>
				<input type="submit" value="Send">
			</p>
		</form>

		<h2>Multiple Choice Test</h2>
		<form method="POST" action="http://requestb.in/1ittlxw1">

			<p>Who sang the song "Purple Rain"?</p>
				<label>
					<input type="radio" name="q1" value="britney spears">Britney Spears
				</label>
				<label>
					<input type="radio" name="q1" value="elton john">Elton John
				</label>
				<label>
					<input type="radio" name="q1" value="prince">Prince
				</label>
				<label>
					<input type="radio" name="q1" value="tears for fears">Tears for Fears
				</label>

			<p>What color is aubergine?</p>
				<label>
					<input type="radio" name="q2" value="red">Red
				</label>
				<label>
					<input type="radio" name="q2" value="yellow">Yellow
				</label>
				<label>
					<input type="radio" name="q2" value="blue">Blue
				</label>
				<label>
					<input type="radio" name="q2" value="purple">Purple
				</label>

			<p>What will you be learning in Codeup?</p>
				<label>
					<input type="checkbox" name="lang[]" value="Linux">Linux
				</label>
				<label>
					<input type="checkbox" name="lang[]" value="Apache">Apache
				</label>
				<label>
					<input type="checkbox" name="lang[]" value="MySQL">MySQL
				</label>
				<label>
					<input type="checkbox" name="lang[]" value="PHP">PHP
				</label>
				
			<p>
				<select id="os" name="os[]" multiple>
					<option>Linux</option>
					<option>Apache</option>
					<option>MySQL</option>
					<option>PHP</option>
				</select>
			</p>
			<p>
				<button type="submit" value="Send Answers">Send Answers</button>
			</p>
		</form>

		<h2>Select Testing</h2>
		<form method="POST" action="http://requestb.in/1ittlxw1">
			<label for="heard">Have you ever heard of Codeup?</label>
			<select id="heard" name="heard">
				<option value="1" selected>Yes</option>
				<option value="2">No</option>
			</select>
			<p>
				<button type="submit">Submit</button>
			</p>
		</form>
	</body>
</html>