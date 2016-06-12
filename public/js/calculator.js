"use strict";

var operatorButtonsArray = document.getElementsByClassName("operator-btn");
var operatorCenter = document.getElementById("operator");
var operandLeft = document.getElementById("leftOperand");
var operandRight = document.getElementById("rightOperand");
var decimalButton = document.getElementById("decimalbtn");

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

function pressClearButton (event) {
	(document.getElementById("clearbtn")).addEventListener ("click", clearData);
}

function pressEqualsButton (event) {
	(document.getElementById("equalsbtn")).addEventListener ("click", solveEquation);
}

function numberPushToTop () {
	var leftMaxLength = operandLeft.getAttribute("maxlength");
	var rightMaxLength = operandRight.getAttribute("maxlength");
	for (var i = 0; i < operatorButtonsArray.length; i++) {
		operatorButtonsArray[i].removeAttribute("disabled");
	}
	if (operatorCenter.value == "") {
		if (operandLeft.value.length >= leftMaxLength) {
			operandLeft.value = ((parseInt(operandLeft.value)).toExponential(0)); 
			operandLeft.value += parseInt(this.value);
		} else {
			operandLeft.value += this.value;
		}
	} else {
		if (operandRight.value.length >= rightMaxLength) {
			operandRight.value = ((parseInt(operandRight.value)).toExponential(0));
			operandRight.value += parseInt(this.value);
		} else
			operandRight.value += this.value;
	}
}


function checkMaxLength () {
	operandLeft.getAttribute("maxlength");
	operandRight.getAttribute("maxlength");
}

function operatorPushToTop () {
	operatorCenter.value += this.value;
}

function clearData () {
	operandLeft.value = "";
	operandRight.value = "";
	operatorCenter.value = "";
}

function solveEquation () {
	parseInt(operandLeft.value);
	parseInt(operandRight.value);
	var result;
	if (operatorCenter.value == "+") {
		result = operandLeft.value + operandRight.value;
	} else if (operatorCenter.value == "-") {
		result = operandLeft.value - operandRight.value;
	} else if (operatorCenter.value == "/") {
		result = operandLeft.value / operandRight.value;
	} else if (operatorCenter.value == "*") {
		result = operandLeft.value * operandRight.value;
	}
		operandLeft.value = result;
		operandRight.value = "";
		operatorCenter.value = "";
}

pressNumberButtons(event);
pressOperatorButtons(event);
pressClearButton(event);
pressEqualsButton(event);