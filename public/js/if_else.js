"use strict";

// A student's grades are 70, 80, 95. Write a program that congratulates the student for an average above 80 and advises the student to study more for an average below 80.

// console.log("Grade Problem");

(function() {
	var grades = [70, 80, 95];
	var sum = 0;
	var average;
	var awesomeGrade = 80;
	var message;

	for (var i = 0; i < grades.length; i++) {
		sum = sum + grades[i];
	}	average = sum / grades.length;
		if (average >= awesomeGrade) {
			message = "You're awesome!";
		} else {
			message = "You need to practice more.";
		}

	console.log(message);
})();

// Refactor this code to interact with the user, using prompt, alert, and confirm where needed.
// Prompt the user for her name, and the name of the subject.
// Use at least one object. This object should have at least one function.
// Use at least one array (it must be part of the object).
// Make it work for a variable number of grades.

(function() {

	var student = {
		name: '',
		subjects: [],
		addToSubjectsArray: function (subject) {
			this.subjects.push(subject);
			return this.subjects;
		},
		grades: [],
		addToGradesArray: function (grade) {
			this.grades.push(grade);
			return this.grades;
		}, 
		averagedGrades: function () {
			var sumGrades = 0;
			for (var index = 0; index < this.grades.length; index++){
				sumGrades = sumGrades + Number(this.grades[index]);
				}
				var average = sumGrades / this.grades.length;
				return average;
		}
	};

	var awesomeGrade = 80;
	var averageGrade = Math.round(student.averagedGrades());

	student.name = prompt('Please enter your name.');
	
	do {
		var subjectMessage = prompt('Please enter the subject:');
		student.addToSubjectsArray(subjectMessage);
		var gradeMessage = prompt('Please enter a grade:');
		student.addToGradesArray(gradeMessage);
		var moreGrades = confirm('Do you have more grades?');
	} while (moreGrades);

	if (averageGrade > awesomeGrade) {
		alert(student.name + ", your overall average is " + averageGrade + " which is awesome!");
	} else {
		alert(student.name + ", your overall average is " + averageGrade + " which means you need to study.");
	}

})();

// HEB has an offer for clients that buy products amounting to more than $200. The discount is 35% off the purchase. Cameron bought $180, Ryan bought $250, and George $320. Log each person's total before discount and after discount.

console.log("HEB Problem");

"use strict";

var discount = 0.35;
var discountMin = 200;
var moreCustomers;

function displayInfo() {
	customers.forEach(function(customer) {
		var finalTotal = (customer.totalNoDiscount()).toFixed(2);
		var discountTotal = (customer.totalWithDiscount()).toFixed(2);
		console.log(customer.name + " has spent $" + finalTotal + ", and after the discount the total is: $" + discountTotal);
	});
}

var customers = [];

function collectInfo() {
	var customer = {
		name: null,
		products: [],
		totalNoDiscount: function() {
			var total = 0;
			this.products.forEach(function(product) { 
				total += product.price;
			});
			return total;
		},
		totalWithDiscount: function() {
			var total = this.totalNoDiscount();
			if (total >= discountMin) {
				total -= (total * discount);
			}

			return total;
		}
	};

	customer.name = prompt("Please enter the customer\'s name.");

	do {
		var product = {
			name: null,
			price: 0
		};
		product.name = prompt("Enter a product.");
		product.price = parseFloat(prompt("Enter the product cost. Please enter numbers only."));
		customer.products.push(product);
		var moreProducts = confirm("Do you have more products to enter?");
	} while (moreProducts);

	customers.push(customer);
}

do {
	collectInfo();
	var moreCustomers = confirm("Do you have more customers to add?");
} while (moreCustomers);

displayInfo();

// Isaac cannot decide between buying a new car or house. 'Flip a coin' and help him out. 1 = House, 0 = Car

console.log("Coin-Flipping Problem");

var flipACoin = Math.floor(Math.random()* 2);
console.log("Random number is: " + flipACoin);
console.log((flipACoin) ? "Buy a house!" : "Buy a car!");