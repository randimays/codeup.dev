"use strict";


var grade1 = 70;
var grade2 = 80;
var grade3 = 95;

if (((grade1 + grade2 + grade3)/3) > 80) {
	console.log("You're awesome");
} else {
	console.log("You need to practice more");
}


var cameron = 180;
var ryan = 250;
var george = 320;
var qualify = 200;
var discount = .35;

if (cameron > qualify) {
	console.log("Cameron will save $" + (cameron * discount).toFixed(2) + " of $" + cameron + " for a total of $" + (cameron - (cameron * discount)).toFixed(2));
} else {
	console.log("Cameron must pay original price: $" + cameron);
}

if (ryan > qualify) {
	console.log("Ryan will save $" + (ryan * discount).toFixed(2) + " of $" + ryan + " for a total of $" + (ryan - (ryan * discount)).toFixed(2));
} else {
	console.log("Ryan must pay original price: $" + ryan);
}

if (george > qualify) {
	console.log("George will save $" + (george * discount).toFixed(2) + " of $" + george + " for a total of $" + (george - (george * discount)).toFixed(2));
} else {
	console.log("George must pay original price: $" + george);
}


var flipACoin = Math.floor(Math.random()* 2);

console.log(flipACoin);

if (flipACoin) {
	console.log("Buy a house!");
} else {
	console.log("Buy a car!");
}

flipACoin ? console.log("Buy a house!") : console.log("Buy a car!");