(function(){
    "use strict";

    // Create an array of 4 people's names. Log the number of elements in the array and then print each name in the array individually.
    var names = ['Randi', 'John', 'Pam', 'Gary'];

    console.log("The number of elements in the names array is " + names.length);
    
    names.forEach(function(names) {
    	console.log(names);
    });
})();