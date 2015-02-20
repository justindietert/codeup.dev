
// Inputs
//-------------------------------------------------------------

var input = document.getElementById('input');


// Calculator Buttons
//-------------------------------------------------------------

var key = document.getElementById('key');


// Functions to add values to inputs
//-------------------------------------------------------------

function placeOnScreen() {
    
    input.innerHTML = key.innerHTML;
}




// Event Listeners for Calculator Buttons
//-------------------------------------------------------------

key.addEventListener('click', placeOnScreen, false);








