"use strict";

var operatorButtonsArray = document.getElementsByClassName("operator-btn");
var operatorCenter = document.getElementById("operator");
var operandLeft = document.getElementById("leftOperand");
var operandRight = document.getElementById("rightOperand");
var decimalButton = document.getElementById("decimalbtn");
var leftMaxLength = operandLeft.getAttribute("maxlength");
var rightMaxLength = operandRight.getAttribute("maxlength");

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
(document.getElementById("posnegbtn")).addEventListener ("click", toggleNumberSign);
(document.getElementById("exponentbtn")).addEventListener ("click", raiseNumberToPower);

function numberPushToTop () {
	for (var i = 0; i < operatorButtonsArray.length; i++) {
		operatorButtonsArray[i].removeAttribute("disabled");
	}
	if (operatorCenter.value == "") {
		if (operandLeft.value.length >= leftMaxLength) {
			operandLeft.value = ((parseFloat(operandLeft.value)).toExponential(0)); 
			operandLeft.value += parseFloat(this.value);
		} else {
			operandLeft.value += this.value;
		}
	} else {
		if (operandRight.value.length >= rightMaxLength) {
			operandRight.value = ((parseFloat(operandRight.value)).toExponential(0));
			operandRight.value += parseFloat(this.value);
		} else
			operandRight.value += this.value;
	}
}

function decimalPushToTop () {
	if (operatorCenter.value == "") {
		operandLeft.value = parseInt(operandLeft.value) + decimalButton.value; 
	} else {
		operandRight.value = parseInt(operandRight.value) + decimalButton.value;
	}
}

function checkMaxLength () {
	operandLeft.getAttribute("maxlength");
	operandRight.getAttribute("maxlength");
}

function operatorPushToTop () {
	operatorCenter.value = this.value;
}

function clearData () {
	operandLeft.value = "";
	operandRight.value = "";
	operatorCenter.value = "";
}

function getSquareRoot () {
	if (operatorCenter.value == "") {
		operandLeft.value = (Math.sqrt(operandLeft.value)).toFixed(5);
	} else {
		operandRight.value = (Math.sqrt(operandRight.value)).toFixed(5);
	}
}

function toggleNumberSign () {
	if (operatorCenter.value == "") {
		operandLeft.value *= (-1);
	} else {
		operandRight.value *= (-1);
	}
}

function raiseNumberToPower () {
	if (operatorCenter.value == "") {
		operandLeft.value = Math.pow(operandLeft.value, pressNumberButtons);
	} else {
		operandRight.value = Math.pow(operandRight.value, pressNumberButtons);
	}
}

function solveEquation () {
	var a = operandLeft.value;
	var b = operandRight.value;
	var result;
	if (operatorCenter.value == "+") {
		result = parseFloat(a) + parseFloat(b);
		console.log(result);
	} else if (operatorCenter.value == "-") {
		result = parseFloat(a) - parseFloat(b);
	} else if (operatorCenter.value == "/") {
		result = parseFloat(a) / parseFloat(b);
	} else if (operatorCenter.value == "*") {
		result = parseFloat(a) * parseFloat(b);
	}
	if (((result.toString()).length) > leftMaxLength) {
		operandLeft.value = result.toFixed(2);
	} else {
		operandLeft.value = result;
	}
	operandRight.value = "";
	operatorCenter.value = "";
}

pressNumberButtons(event);
pressOperatorButtons(event);