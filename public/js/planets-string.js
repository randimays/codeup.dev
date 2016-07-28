(function(){
    "use strict";

    var planetsString = "Mercury|Venus|Earth|Mars|Jupiter|Saturn|Uranus|Neptune";

    // TODO: Convert planetsString to an array, save it to planetsArray.

    var planetsArray = planetsString.split('|');

    // TODO: Create a string with <br> tags between each planet. console.log() your results.

    var planetsString2 = planetsArray.join('<br>');

    // Bonus: Create a second string that would display your planets in an undordered list.

    var planetsString3 = ('<ul><li>') + planetsArray.join('</li><li>') + ('</li></ul>');
    console.log("Planets array: " + planetsArray + "\nPlanets string 2: " + planetsString2 + "\nPlanets string 3: " + planetsString3);
})();
