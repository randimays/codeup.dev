"use strict";

// Reverse an array of numbers without using a premade reverse function. For example, given the array [1, 2, 3, 4, 5], return [5, 4, 3, 2, 1].

var numbers = [1, 2, 3, 4, 5];

var inversed = [];

function reverseArray(numbers, inversed) {
	numbers.forEach(function(element) {
		inversed.unshift(element);
	});
	return inversed;
}

console.log(reverseArray(numbers, inversed));

// Capitalize the first letter of every word in a sentence. For example, given the sentence "please excuse my dear aunt sally," return "Please Excuse My Dear Aunt Sally."

var string = "Please excuse my dear aunt Sally";

function capitalizeString(string) {
	var array = string.toLowerCase().split(' ');
	for (var i = 0; i < array.length; i++) {
		var stringSegment = array[i];
		var firstLetter = (stringSegment.charAt(0)).toUpperCase();
		var subString = stringSegment.substring(1, stringSegment.length);
		array[i] = firstLetter + subString;
	}
	return array;
}

console.log((capitalizeString(string)).join(' '));

// Bonus: Find a missing number in a set of integers. Assume you are only missing one number.

var numbers = [1, 2, 3, 5, 6, 7, 8, 9, 10];

// var numbers1 = [4, 5, 6, 7, 9, 10, 11, 12];

function findMissingNumber(numbers) {
	for (var i = 0; i < numbers.length; i++) {
		if (numbers[i + 1] - numbers[i] != 1) {
			return numbers[i] + 1;
		}
	}
}

console.log(findMissingNumber(numbers));