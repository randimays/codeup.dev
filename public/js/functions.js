"use strict";

var myNameIs = 'Randi'; // TODO: Fill in your name here.

// TODO:
// Create a function called 'sayHello' that takes a parameter 'name'.

function sayHello(name) {
	console.log(myNameIs + ": Hello!");
}

sayHello(myNameIs);

// When called, the function should log a message that says hello from the passed in name.

// TODO: Call the function 'sayHello' passing the variable 'myNameIs' as a parameter.


// Don't modify the following line
// It generates a random number between 1 and 100 and stores it in random
var random = Math.floor((Math.random()*100)+1);

// TODO:
// Create a function called 'isOdd' that takes a number as a parameter.

console.log("This is my chosen random number: " + random.toString());

function isOdd(numberToTest) {
	(numberToTest % 2 === 0 ) ? console.log("This number is even") : console.log("This number is odd");
}

isOdd(random);

// The function should use the ternary operator to log a message.
// The log should tell the number passed in and whether it is odd or not.

// TODO: Call the function 'isOdd' passing the variable 'random' as a parameter.
