window.onload = function () {

	"use strict";

	var buttonsArray = document.getElementsByClassName("number-btn");

	function pressNumberButtons () {
		for (var i = 0; i < buttonsArray.length; i++) {
			buttonsArray[i].addEventListener ("click", pushToTop);
		}
	}

	pressNumberButtons();
	
	function pushToTop () {
		document.getElementById("leftOperand").value += this.value;
	}
 
} 

	// var buttons = [];
			// var value = buttonsArray[i].getAttribute("value");
			// var buttons = [];
			// buttons.push(parseInt(value));
			// buttons.sort();
