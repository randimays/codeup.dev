"use strict";

var myNameIs = 'Randi'; // TODO: Fill in your name here.

// TODO: Create a function called 'sayHello' that takes a parameter 'name'.
// When called, the function should log a message that says hello from the passed in name.

function sayHello(myNameIs) {
	console.log("Hello, " + myNameIs + "!");
}

sayHello(myNameIs);

// TODO: Call the function 'sayHello' passing the variable 'myNameIs' as a parameter.

var random = Math.floor((Math.random()*100)+1);
console.log("Random number: " + random);

// TODO:
// Create a function called 'isOdd' that takes a number as a parameter.
// The function should use the ternary operator to log a message.
// The log should tell the number passed in and whether it is odd or not.

function isOdd(random) {
	(random % 2 == 1) ? console.log(random + " is odd!") : console.log(random + " is even!");
}

// TODO: Call the function 'isOdd' passing the variable 'random' as a parameter.

isOdd(random);

