"use strict";

// Generate a lucky number between 0 and 5. Walmart is having a promotion where you get a certain discount based on that number. 0 = 0% discount. 1 = 10%, 2 = 25%, 3 = 35%, 4 = 50%, 5 = 100%. How much will you have to pay if your bill is $60?

console.log("Walmart Promotion");

(function getDiscount(luckyNumber){
	var discounts = [0, .1, .25, .35, .50, 1];
	var originalPrice = 60;
	var luckyNumber = Math.floor(Math.random()* 6);
	var totalDiscount = discounts[luckyNumber] * originalPrice;
	var newPrice = originalPrice - totalDiscount;		
	console.log("You rolled a " + luckyNumber + " and get a $" + totalDiscount + " discount, making your total $" + newPrice + ".");
})();

console.log("Month Problem");

// reworked for practice

var randomNumber = Math.floor(Math.random() * 12) + 1;
var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
console.log('Month #' + randomNumber + " is " + (months[randomNumber - 1]));