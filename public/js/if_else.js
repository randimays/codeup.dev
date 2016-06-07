"use strict";

console.log("Grade Problem");

var grade1 = 70;
var grade2 = 80;
var grade3 = 95;
var combinedGrades = grade1 + grade2 + grade3;
var numberOfGrades = 3;
var awesomeGrade = 80;
var average = combinedGrades / numberOfGrades;

if (average > awesomeGrade) {
	console.log("You're awesome!");
} else {
	console.log("You need to practice more");
}

reworked after arrays for practice

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

	student.name = prompt('Please enter your name.');
	
	do {
	var subjectMessage = prompt('Please enter the subject:');
	student.addToSubjectsArray(subjectMessage);
	var gradeMessage = prompt('Please enter a grade:');
	student.addToGradesArray(gradeMessage);
	var moreGrades = confirm('Do you have more grades?');
	} while (moreGrades);

	var awesomeGrade = 80;

	var averageGrade = Math.round(student.averagedGrades());

	if (averageGrade > awesomeGrade) {
		alert(student.name + ", your overall average is " + averageGrade + " which is awesome!");
	} else {
		alert(student.name + ", your overall average is " + averageGrade + " which means you need to study.");
	}


})();

console.log("HEB Problem");

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

// reworked for practice

(function() {
	var customers = ['cameron', 'ryan', 'george'];
	var spend = [180, 250, 320];
	var qualify = 200;
	var discount = .35;
	var discountedPrice;
	var message;

	for (var i = 0; i < spend.length; i++) {
		if (spend[i] > qualify) {
			discountedPrice = (spend[i]) * discount;
			message = customers[i] + " will save $" + ((discount * spend[i]).toFixed(2)) + ". Final price: $" + (spend[i] - discountedPrice).toFixed(2);
		} else {
			message = customers[i] + " will spend his original amount of: $" + spend[i];
		}
		console.log(message);
	}
})();

console.log("Coin-Flipping Problem");

var flipACoin = Math.floor(Math.random()* 2);

console.log("Random number is: " + flipACoin);

if (flipACoin) {
	console.log("Buy a house!");
} else {
	console.log("Buy a car!");
}

console.log((flipACoin) ? "Buy a house!" : "Buy a car!");