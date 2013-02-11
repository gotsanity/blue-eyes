/*
 * Anonymous function which gets activated
 * on load and changes divs to height "100%"
 */
window.onload = function()
{
        // Fill the array with the divs you would like
        // to have equal height.
        var navs = ["primary","secondary"];

        // Array for comparison
        var comp = new Array();

        // Loop through the array and get the elements
        // from the dom.
        for(var i = 0, ar=navs.length; i<ar; i++){
            navs[i] = document.getElementById(navs[i]);
                
            // add the height to the comparison array.
            comp.push(navs[i].offsetHeight);
         }

        // Find the highest div using the Math module and Prototype.
        h = Math.max.apply(null, comp);
        // Iterate through the array once
        // more to assign the height.
        navs.forEach(function (element) {
                element.style.height = h+"px";  });
         }
