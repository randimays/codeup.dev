"use strict";

(function() {
	var myNameIs = 'Randi'; 
	function sayHello(myNameIs) {
	console.log("Hello, " + myNameIs + "!");
	} sayHello(myNameIs);

	var random = Math.floor((Math.random()*100)+1);
	console.log("Random number: " + random);
	function isOdd(random) {
	(random % 2 == 1) ? console.log(random + " is odd!") : console.log(random + " is even!");
	} isOdd(random);
})();

