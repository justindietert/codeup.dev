
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

