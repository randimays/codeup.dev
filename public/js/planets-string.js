(function(){
    "use strict";

    var planetsString = "Mercury|Venus|Earth|Mars|Jupiter|Saturn|Uranus|Neptune";
    var planetsArray = planetsString.split("|");

    // TODO: Convert planetsString to an array, save it to planetsArray.

    console.log(planetsArray);

    // TODO: Create a string with <br> tags between each planet. console.log() your results.

    var daysOfTheWeek = "Monday<br>Tuesday<br>Wednesday<br>Thursday<br>Friday";

    console.log(daysOfTheWeek);
    //       Why might this be useful?

    // Bonus: Create a second string that would display your planets in an undordered list.

    var daysOfTheWeekListed = "<ul><li>Monday</li><li>Tuesday</li><li>Wednesday</li><li>Thursday</li><li>Friday</li></ul>";

    console.log(daysOfTheWeekListed);

    //        You will need an opening AND closing <ul> tags around the entire string, and <li> tags around each planet.
    //        console.log() your results.
})();
