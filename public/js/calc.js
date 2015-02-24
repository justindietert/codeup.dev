
var buttons = document.getElementsByClassName('button');
var calcScreen = document.getElementsByTagName('input').calcScreen;
var operators = ["+", "-", "*", "/"];

var answer = "";
decimalPresent = false;


for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', addToScreen, false);   
}

function addToScreen() {

    var buttonValue = this.innerHTML;

    if (buttonValue == "C") {
        calcScreen.value = "";
        decimalPresent = false;
    } else if (buttonValue == "=") {
            answer = eval(calcScreen.value);
            calcScreen.value = answer;
        if (!isNaN(answer) && answer.toString().indexOf('.') != -1) {
            answer = eval(calcScreen.value).toFixed(4);
            calcScreen.value = answer;
        }
        decimalPresent = false;
    } else if (operators.indexOf(buttonValue) > -1) {
        var lastChar = calcScreen.value[calcScreen.value.length - 1];
        if (calcScreen.value != "" && operators.indexOf(lastChar) == -1) {
            calcScreen.value += buttonValue;
        } else if (calcScreen.value == "" && buttonValue == "-") {
            calcScreen.value += buttonValue;
        }   
        decimalPresent = false;
    }  else if (buttonValue == ".") {
        if (!decimalPresent) {
            calcScreen.value += buttonValue;
            decimalPresent = true;
        }
    } else {
        calcScreen.value += buttonValue;
    }
}


























// var inputs = document.getElementsByTagName('input');

// var buttons = document.getElementsByClassName('button');

// console.log(inputs.scalcScreen);

// function getScreenValue() {
//     return inputs.calcScreen.value;
// }

// function getLastChar() {
//     return getScreenValue().substr(getScreenValue().length - 1);
// }

// for (var i=0; i < buttons.length; i++) {
//     buttons[i].addEventListener('click',screenList,false);
// }

// function screenList() {
//     console.log(getScreenValue());
//     return getScreenValue();
// }



// function splitThatOperand(input, operand) {
//     return input.split(operand);
// }


// function getNextToLastChar() {
//     var lastTwo = getScreenValue().substr(getScreenValue().length - 2);
//     var target = lastTwo.split('').shift();
//     return target;
// }

// function placeOnScreen(buttonValue) {
//     inputs.calcScreen.value += inputs.attributes
// }


// function zero() {
//     inputs.calcScreen.value += "0";
//     console.log(getScreenValue());
// }

// function one() {
//     inputs.calcScreen.value += "1";
// }

// function two() {
//     inputs.calcScreen.value += "2";
// }

// function three() {
//     inputs.calcScreen.value += "3";
// }

// function four() {
//     inputs.calcScreen.value += "4";
// }

// function five() {
//     inputs.calcScreen.value += "5";
// }

// function six() {
//     inputs.calcScreen.value += "6";
// }

// function seven() {
//     inputs.calcScreen.value += "7";
// }

// function eight() {
//     inputs.calcScreen.value += "8";
// }

// function nine() {
//     inputs.calcScreen.value += "9";
// }




// function divide() {
//     if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
//         inputs.calcScreen.value += "/";
//     }   
// }

// function multiply() {
//    if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
//         inputs.calcScreen.value += "*";
//     }  
// }

// function subtract() {
//     if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
//         inputs.calcScreen.value += "-";
//     }  
// }

// function add() {
//     if ((getScreenValue() != "") && ((getLastChar() != "/") && (getLastChar() != "*") && (getLastChar() != "-") && (getLastChar() != "+") )) {
//         inputs.calcScreen.value += "+";
//     }  
// }



// (getScreenValue().indexOf('.') === -1) && (getScreenValue().indexOf("+") === -1)

// decimalPresent = true;
// var operators = ["+", "-", "*", "/"];



// function testForOperand(operators) {
//     var splitOperand = getScreenValue().split(operators);
//     console.log(splitOperand);
//     if ((splitOperand[0].indexOf('.') === -1) || (splitOperand[1].indexOf('.') === -1) ) {

//         inputs.calcScreen.value += '.';
//     } else {
//         inputs.calcScreen.value += "";
//         console.log('we are here');
//     }
//     // return splitOperand;
// }
// var test = getScreenValue();

// console.log(test);

// var splitOperand = splitThatOperand(getScreenValue(), '+');
// console.log(splitOperand);

// function decimal() {

//     if (screenList().substr('+').indexOf('.') === -1) {
//         inputs.calcScreen.value += ".";
//     }

    // if ((splitOperand[0].indexOf('.') === -1) || (splitOperand[1].indexOf('.') === -1) ) {
    //     inputs.calcScreen.value += '.';
    //     console.log('some decimal');

    // } else {
    //     inputs.calcScreen.value += "";
    //     console.log('im all about that integer');
       
    // }

        // if ((getScreenValue().indexOf('.') === -1) ) {
        //     inputs.calcScreen.value += ".";
        // }
        // if ((getScreenValue().indexOf('.') !== -1) || ((getLastChar() == "/") || (getLastChar() == "*") || (getLastChar() == "-") || (getLastChar() == "+") ) ) {
        //      inputs.calcScreen.value += ".";
        // }
    // if ((getScreenValue().substr("+")).indexOf('.') === -1) {
    //     inputs.calcScreen.value += ".";
    // }

     // if (((getLastChar() == "/") || (getLastChar() == "*") || (getLastChar() == "-") || (getLastChar() == "+") ) || !isNaN(getLastChar()) ) {
     //    inputs.calcScreen.value += ".";
     // }
     // inputs.calcScreen.value += ".";
// }



// function equals() {
//     if ((getScreenValue().indexOf('.') !== -1)) {
//         var answer = eval(getScreenValue()).toFixed(4);
//     } else {
//         var answer = eval(getScreenValue());
//     }
   
//     inputs.calcScreen.value = answer;
// }

// function clear() {
//     inputs.calcScreen.value = "";
// }


// inputs.zero.addEventListener('click', zero, false);
// inputs.one.addEventListener('click', one, false);
// inputs.two.addEventListener('click', two, false);
// inputs.three.addEventListener('click', three, false);
// inputs.four.addEventListener('click', four, false);
// inputs.five.addEventListener('click', five, false);
// inputs.six.addEventListener('click', six, false);
// inputs.seven.addEventListener('click', seven, false);
// inputs.eight.addEventListener('click', eight, false);
// inputs.nine.addEventListener('click', nine, false);

// inputs.divide.addEventListener('click', divide, false);
// inputs.multiply.addEventListener('click', multiply, false);
// inputs.subtract.addEventListener('click', subtract, false);
// inputs.add.addEventListener('click', add, false);
// inputs.decimal.addEventListener('click', decimal, false);

// inputs.equals.addEventListener('click', equals, false);
// inputs.clear.addEventListener('click', clear, false);







