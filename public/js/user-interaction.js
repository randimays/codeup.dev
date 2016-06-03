"use strict";

// TODO: Ask the user for their name.
//       Keep asking if an empty input is provided.

	do {
		var userName = prompt("What is your name?");
	} while ((userName == null) || (userName == ""));

// TODO: Show an alert message that welcomes the user based on their input.

	alert("Hello, " + userName + "!");

// TODO: Ask the user if they like pizza.

	var pizza = confirm("Do you like pizza, " + userName + "?");

//       Based on their answer show a creative alert message.

	if (pizza) {
		alert("High five, " + userName + "!");
	} else {
		alert("You are insane, " + userName + "!");
	}