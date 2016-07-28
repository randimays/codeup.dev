(function(){
	"use strict";

	// TODO: Create person object with firstName and lastName properties. Add a sayHello method that alerts a greeting using those properties. Say hello from the person object.
	var person = {
		firstName: 'Randi',
		lastName: 'Mays',
		sayHello: function() {
			return this.firstName + ' ' + this.lastName;
		}
	};

	console.log(person.sayHello() + ' says hello!');
})();
