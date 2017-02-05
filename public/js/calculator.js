$(document).ready(function() {
	"use strict";

	var operatorBtns = $(".operator");
	var numberBtns = $(".number-btn");
	var screen = $('#screen');
	var decimalButton = $("#decimalbtn");
	var signBtn = $("#signBtn");

	// function grayButtonPushToTop () {

	// 	operatorBtns.attr("disabled", false);

	// 	if (centerBox.val() === "") {
	// 		if (leftBox.val().length >= leftMaxLength) {
	// 			leftBox.val(parseFloat(leftBox.val().toExponential(0)) + this.value); 
	// 		} else {
	// 			if (leftBox.val() == "" && this.value == decimalButton.val()) {
	// 				leftBox.val("0" + decimalButton.val());
	// 			} else {
	// 				leftBox.val(leftBox.val() + this.value);
	// 			}
	// 		}
	// 	} else {
	// 		if (rightBox.val().length >= rightMaxLength) {
	// 			rightBox.val(parseFloat(rightBox.val().toExponential(0)) + this.value);
	// 		} else {
	// 			if (rightBox.val() == "" && this.value == decimalButton.val()) {
	// 				rightBox.val("0" + decimalButton.val());
	// 			} else {
	// 				rightBox.val(rightBox.val() + this.value);
	// 			}
	// 		}
	// 	}

	// 	signBtn.attr("disabled", false);
	// 	$("#exponentbtn").attr("disabled", false);
	// 	$("#sqrtbtn").attr("disabled", false);
	// }

	// function operatorPushToTop () {
	// 	centerBox.val(this.value);
	// }

	// function clearData () {
	// 	leftBox.val("");
	// 	rightBox.val("");
	// 	centerBox.val("");
	// }

	// function getSquareRoot () {
	// 	if (leftBox.val() < 0 || rightBox.val() < 0) {
	// 		alert("You cannot take the square root of a negative number.");
	// 		leftBox.val("undefined");
	// 	}
	// 	if (centerBox.val() == "") {
	// 		leftBox.val((Math.sqrt(leftBox.val())).toFixed(5));
	// 	} else {
	// 		rightBox.val((Math.sqrt(rightBox.val())).toFixed(5));
	// 	}
	// }

	// function toggleNumberSign () {
	// 	if (centerBox.val() == "") {
	// 		leftBox.val(leftBox.val() * (-1));
	// 	} else {
	// 		rightBox.val(rightBox.val() * (-1));
	// 	}
	// }

	// function solveEquation () {
	// 	var a = parseFloat(leftBox.val());
	// 	var b = parseFloat(rightBox.val());
	// 	var result;
	// 	if (centerBox.val() == "+") {
	// 		result = a + b;
	// 	} else if (centerBox.val() == "-") {
	// 		result = a - b;
	// 	} else if (centerBox.val() == "/") {
	// 		if (b == 0) {
	// 			alert("You cannot divide by zero.");
	// 			result = "undefined";
	// 		} else {
	// 			result = a / b;
	// 		}
	// 	} else if (centerBox.val() == "*") {
	// 		result = a * b;
	// 	} else if (centerBox.val() == "^") {
	// 		result = Math.pow(a, b);
	// 	}
	// 	if (result.toString().length > leftMaxLength) {
	// 		leftBox.val(result.toExponential(0));
	// 	} else {
	// 		leftBox.val(result);
	// 	}
	// 	rightBox.val("");
	// 	centerBox.val("");
	// }

	// decimalButton.on("click", grayButtonPushToTop);
	// numberBtns.on("click", grayButtonPushToTop);
	// operatorBtns.on("click", operatorPushToTop);
	// signBtn.on("click", toggleNumberSign);
	// $("#clearbtn").on("click", clearData);
	// $("#equalsbtn").on("click", solveEquation);
	// $("#sqrtbtn").on("click", getSquareRoot);

});