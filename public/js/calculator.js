"use strict";

var operatorButtonsArray = document.getElementsByClassName("operator-btn");
var centerBox = document.getElementById("operator");
var leftBox = document.getElementById("leftOperand");
var rightBox = document.getElementById("rightOperand");
var leftMaxLength = leftBox.getAttribute("maxlength");
var rightMaxLength = rightBox.getAttribute("maxlength");
var decimalButton = document.getElementById("decimalbtn");
var posNegButton = document.getElementById("posnegbtn");

function pressNumberButtons (event) {
	var numberButtonsArray = document.getElementsByClassName("number-btn");
	for (var i = 0; i < numberButtonsArray.length; i++) {
		numberButtonsArray[i].addEventListener ("click", numberPushToTop);
	}
}

function pressOperatorButtons (event) {
	for (var i = 0; i < operatorButtonsArray.length; i++) {
		operatorButtonsArray[i].addEventListener ("click", operatorPushToTop);
	}
}

decimalButton.addEventListener ("click", decimalPushToTop);
(document.getElementById("clearbtn")).addEventListener ("click", clearData);
(document.getElementById("equalsbtn")).addEventListener ("click", solveEquation);
(document.getElementById("sqrtbtn")).addEventListener ("click", getSquareRoot);

function numberPushToTop () {
	for (var i = 0; i < operatorButtonsArray.length; i++) {
		operatorButtonsArray[i].removeAttribute("disabled");
	}
	if (centerBox.value === "") {
		if (leftBox.value.length >= leftMaxLength) {
			leftBox.value = ((parseFloat(leftBox.value)).toExponential(0)); 
			leftBox.value += parseFloat(this.value);
		} else {
			leftBox.value += this.value;
		}
	} else {
		if (rightBox.value.length >= rightMaxLength) {
			rightBox.value = ((parseFloat(rightBox.value)).toExponential(0));
			rightBox.value += parseFloat(this.value);
		} else
			rightBox.value += this.value;
	}
	posNegButton.disabled = false;
	(document.getElementById("exponentbtn")).disabled = false;
	(document.getElementById("sqrtbtn")).disabled = false;
}

posNegButton.addEventListener ("click", toggleNumberSign);

function decimalPushToTop () {
	if (centerBox.value == "") {
		if (leftBox.value == "") {
			leftBox.value = "0" + decimalButton.value;
		} else {
			leftBox.value = parseInt(leftBox.value) + decimalButton.value; 
		}
	} else {
		if (rightBox.value == "") {
			rightBox.value = "0" + decimalButton.value;
		} else {
			rightBox.value = parseInt(rightBox.value) + decimalButton.value;
		}
	}
}

function checkMaxLength () {
	leftBox.getAttribute("maxlength");
	rightBox.getAttribute("maxlength");
}

function operatorPushToTop () {
	centerBox.value = this.value;
}

function clearData () {
	leftBox.value = "";
	rightBox.value = "";
	centerBox.value = "";
}

function getSquareRoot () {
	if (centerBox.value == "") {
		leftBox.value = (Math.sqrt(leftBox.value)).toFixed(5);
	} else {
		rightBox.value = (Math.sqrt(rightBox.value)).toFixed(5);
	}
}

function toggleNumberSign () {
	if (centerBox.value == "") {
		leftBox.value *= (-1);
	} else {
		rightBox.value *= (-1);
	}
}

function solveEquation () {
	var a = leftBox.value;
	var b = rightBox.value;
	var result;
	if (centerBox.value == "+") {
		result = parseFloat(a) + parseFloat(b);
	} else if (centerBox.value == "-") {
		result = parseFloat(a) - parseFloat(b);
	} else if (centerBox.value == "/") {
		result = parseFloat(a) / parseFloat(b);
	} else if (centerBox.value == "*") {
		result = parseFloat(a) * parseFloat(b);
	} else if (centerBox.value == "^") {
		result = Math.pow(a, b);
	}
	if (result.toString().length > leftMaxLength) {
		leftBox.value = result.toExponential(0);
	} else {
		leftBox.value = result;
	}
	rightBox.value = "";
	centerBox.value = "";
}

pressNumberButtons(event);
pressOperatorButtons(event);