(function(){
    "use strict";

    // TODO: Create an array of 4 people's names using literal array notation, in a variable called 'names'.

    var names = ['John', 'Randi', 'Pam', 'Gary'];

    // TODO: Create a log statement that will log the number of elements in the names array.

    console.log("There are " + names.length + " names in the names array.");

    console.log("For Loop");

    for (var i = 0; i < names.length; i++) {
      console.log("The name at index " + i + " is " + names[i]);
    }

    console.log("ForEach Loop");

    names.forEach(function (element, index) {
      console.log("The name at index " + index + " is " + element);
    })

})();

