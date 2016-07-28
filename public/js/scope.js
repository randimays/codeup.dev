"use strict";

(function() {
	var myNameIs = 'Randi'; 
	var random = Math.floor((Math.random()*100)+1);
	
	function sayHello(myNameIs) {
		console.log("Hello, " + myNameIs + "!");
	} 

	sayHello(myNameIs);

	function isOdd(random) {
		console.log((random % 2 == 1) ? random + " is odd!" : random + " is even!");
	} 

	console.log("Random number: " + random);
	isOdd(random);
})();

