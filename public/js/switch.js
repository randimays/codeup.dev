"use strict";

console.log("Walmart Promotion");

var luckyNumber = Math.floor(Math.random()* 6);
var totalPurchase = 60

var discountOne = .1
var discountTwo = .25
var discountThree = .35
var discountFour = .5
var discountFive = 1


console.log("Your lucky number is: " + luckyNumber);

switch (luckyNumber) {
	case 1:
	console.log("Your total with discount is: $" + (totalPurchase - (totalPurchase*discountOne)));
	break;
	case 2:
	console.log("Your total with discount is: $" + (totalPurchase - (totalPurchase*discountTwo)));
	break;
	case 3:
	console.log("Your total with discount is: $" + (totalPurchase - (totalPurchase*discountThree)));
	break;
	case 4:
	console.log("Your total with discount is: $" + (totalPurchase - (totalPurchase*discountFour)));
	break;
	case 5:
	console.log("Your total with discount is: $" + (totalPurchase - (totalPurchase*discountFive)));
	break;
	default:
	console.log("Sorry, no discount. Your total is: $" + totalPurchase);
}

console.log("Month Problem");

var randomNumber = Math.floor(Math.random()* 12) + 1;

switch (randomNumber){
	case 1:
	console.log("Month " + randomNumber + " is January");
	break;
	case 2:
	console.log("Month " + randomNumber + " is February");
	break;
	case 3:
	console.log("Month " + randomNumber + " is March");
	break;
	case 4:
	console.log("Month " + randomNumber + " is April");
	break;
	case 5:
	console.log("Month " + randomNumber + " is May");
	break;
	case 6:
	console.log("Month " + randomNumber + " is June");
	break;
	case 7:
	console.log("Month " + randomNumber + " is July");
	break;
	case 8:
	console.log("Month " + randomNumber + " is August");
	break;
	case 9:
	console.log("Month " + randomNumber + " is September");
	break;
	case 10:
	console.log("Month " + randomNumber + " is October");
	break;
	case 11:
	console.log("Month " + randomNumber + " is November");
	break;
	default:
	console.log("Month " + randomNumber + " is December");
}


