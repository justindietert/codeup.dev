

var inputs = document.getElementsByTagName('input');

function getScreenValue() {
    return inputs.calcScreen.value;
}

function getLastChar() {
    return getScreenValue().substr(getScreenValue().length - 1);
}

// function getNextToLastChar() {
//     var lastTwo = getScreenValue().substr(getScreenValue().length - 2);
//     var target = lastTwo.split('').shift();
//     return target;
// }


function zero() {
    inputs.calcScreen.value += "0";
}

function one() {
    inputs.calcScreen.value += "1";
}

function two() {
    inputs.calcScreen.value += "2";
}

function three() {
    inputs.calcScreen.value += "3";
}

function four() {
    inputs.calcScreen.value += "4";
}

function five() {
    inputs.calcScreen.value += "5";
}

function six() {
    inputs.calcScreen.value += "6";
}

function seven() {
    inputs.calcScreen.value += "7";
}

function eight() {
    inputs.calcScreen.value += "8";
}

function nine() {
    inputs.calcScreen.value += "9";
}




function divide() {
    if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
        inputs.calcScreen.value += "/";
    }   
}

function multiply() {
   if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
        inputs.calcScreen.value += "*";
    }  
}

function subtract() {
    if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
        inputs.calcScreen.value += "-";
    }  
}

function add() {
    if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
        inputs.calcScreen.value += "+";
    }  
}



// (getScreenValue().indexOf('.') === -1) && (getScreenValue().indexOf("+") === -1)

decimalPresent = true;
var operators = ["+", "-", "*", "/"];

function decimal() {
    if ((getScreenValue().indexOf('.') === -1) ) {
        inputs.calcScreen.value += ".";
    }
}



// .toFixed(7)

function equals() {

    if ((getScreenValue().indexOf('.') === -1) ) {
        var answer = eval(inputs.calcScreen.value).toFixed(7);
    } else {
        var answer = eval(inputs.calcScreen.value);
    }
   
    inputs.calcScreen.value = answer;
}

function clear() {
    inputs.calcScreen.value = "";
}


inputs.zero.addEventListener('click', zero, false);
inputs.one.addEventListener('click', one, false);
inputs.two.addEventListener('click', two, false);
inputs.three.addEventListener('click', three, false);
inputs.four.addEventListener('click', four, false);
inputs.five.addEventListener('click', five, false);
inputs.six.addEventListener('click', six, false);
inputs.seven.addEventListener('click', seven, false);
inputs.eight.addEventListener('click', eight, false);
inputs.nine.addEventListener('click', nine, false);

inputs.divide.addEventListener('click', divide, false);
inputs.multiply.addEventListener('click', multiply, false);
inputs.subtract.addEventListener('click', subtract, false);
inputs.add.addEventListener('click', add, false);
inputs.decimal.addEventListener('click', decimal, false);

inputs.equals.addEventListener('click', equals, false);
inputs.clear.addEventListener('click', clear, false);







