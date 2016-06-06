(function(){
    "use strict";

    // TODO: Create person object
    var person = {
    	firstName: 'Randi',
    	lastName: 'Mays',
    	sayHello: function() {
    		return this.firstName + ' ' + this.lastName;
    	}
    };
    
    alert('Hello, ' + person.sayHello());

	console.log(person.sayHello() + ' says hello!');

    // TODO: Create firstName and lastName properties in your person object; assign your name to them


    // TODO: Add a sayHello method to the person object that
    //       alerts a greeting using the firstName and lastName properties

    // Say hello from the person object.
    // person.sayHello();
})();
