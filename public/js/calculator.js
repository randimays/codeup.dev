$(document).ready(function() {

	// Build a JavaScript calculator. Put your data in three separate input fields. Use one or more click event listeners for your buttons. Bonus: 1) add a decimal point 2) use HTML/CSS to make it pretty 3) consider adding square roots, exponents, trigonometry, etc.
	
	"use strict";

	var operatorButtonsArray = $(".operator-btn");
	var numberButtonsArray = $(".number-btn");
	var centerBox = $("#centerBox");
	var leftBox = $("#leftBox");
	var rightBox = $("#rightBox");
	var leftMaxLength = leftBox.attr("maxlength");
	var rightMaxLength = rightBox.attr("maxlength");
	var decimalButton = $("#decimalbtn");
	var posNegButton = $("#posnegbtn");

	function grayButtonPushToTop () {

		operatorButtonsArray.attr("disabled", false);

		if (centerBox.val() === "") {
			if (leftBox.val().length >= leftMaxLength) {
				leftBox.val(parseFloat(leftBox.val().toExponential(0)) + this.value); 
			} else {
				if (leftBox.val() == "" && this.value == decimalButton.val()) {
					leftBox.val("0" + decimalButton.val());
				} else {
					leftBox.val(leftBox.val() + this.value);
				}
			}
		} else {
			if (rightBox.val().length >= rightMaxLength) {
				rightBox.val(parseFloat(rightBox.val().toExponential(0)) + this.value);
			} else {
				if (rightBox.val() == "" && this.value == decimalButton.val()) {
					rightBox.val("0" + decimalButton.val());
				} else {
					rightBox.val(rightBox.val() + this.value);
				}
			}
		}

		posNegButton.attr("disabled", false);
		$("#exponentbtn").attr("disabled", false);
		$("#sqrtbtn").attr("disabled", false);
	}

	function operatorPushToTop () {
		centerBox.val(this.value);
	}

	function clearData () {
		leftBox.val("");
		rightBox.val("");
		centerBox.val("");
	}

	function getSquareRoot () {
		if (leftBox.val() < 0 || rightBox.val() < 0) {
			alert("You cannot take the square root of a negative number.");
			leftBox.val("undefined");
		}
		if (centerBox.val() == "") {
			leftBox.val((Math.sqrt(leftBox.val())).toFixed(5));
		} else {
			rightBox.val((Math.sqrt(rightBox.val())).toFixed(5));
		}
	}

	function toggleNumberSign () {
		if (centerBox.val() == "") {
			leftBox.val(leftBox.val() * (-1));
		} else {
			rightBox.val(rightBox.val() * (-1));
		}
	}

	function solveEquation () {
		var a = parseFloat(leftBox.val());
		var b = parseFloat(rightBox.val());
		var result;
		if (centerBox.val() == "+") {
			result = a + b;
		} else if (centerBox.val() == "-") {
			result = a - b;
		} else if (centerBox.val() == "/") {
			if (b == 0) {
				alert("You cannot divide by zero.");
				result = "undefined";
			} else {
				result = a / b;
			}
		} else if (centerBox.val() == "*") {
			result = a * b;
		} else if (centerBox.val() == "^") {
			result = Math.pow(a, b);
		}
		if (result.toString().length > leftMaxLength) {
			leftBox.val(result.toExponential(0));
		} else {
			leftBox.val(result);
		}
		rightBox.val("");
		centerBox.val("");
	}

	decimalButton.on("click", grayButtonPushToTop);
	numberButtonsArray.on("click", grayButtonPushToTop);
	operatorButtonsArray.on("click", operatorPushToTop);
	posNegButton.on("click", toggleNumberSign);
	$("#clearbtn").on("click", clearData);
	$("#equalsbtn").on("click", solveEquation);
	$("#sqrtbtn").on("click", getSquareRoot);

});