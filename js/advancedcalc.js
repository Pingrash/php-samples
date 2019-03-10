var oneBtn = document.querySelector('#calc-one');
var twoBtn = document.querySelector('#calc-two');
var threeBtn = document.querySelector('#calc-three');
var fourBtn = document.querySelector('#calc-four');
var fiveBtn = document.querySelector('#calc-five');
var sixBtn = document.querySelector('#calc-six');
var sevenBtn = document.querySelector('#calc-seven');
var eightBtn = document.querySelector('#calc-eight');
var nineBtn = document.querySelector('#calc-nine');
var zeroBtn = document.querySelector('#calc-zero');

var decimalBtn = document.querySelector('#calc-decimal');
var clearBtn = document.querySelector('#calc-clear');
var backspaceBtn = document.querySelector('#calc-backspace');
var displayValElement = document.querySelector('#calc-display-val');
var equationDisplay = document.querySelector('.equation-display');

var calcNumBtns = document.querySelectorAll('.calc-btn-num');
var calcOperatorBtns = document.querySelectorAll('.calc-btn-operator');

var displayVal = '0';
var pendingVal;
var evalStringArray = [];
var fontSizeChanged = false;
var newEquation = false;

// Overflow function that decreases the font size in the value element if overflow is detected
var isOverflowed = () => {
  let displayValLength = displayVal.length;
  if (displayValLength >= 6 && !fontSizeChanged) {
    displayValElement.style.fontSize='24px';
    displayValElement.style.padding='30px 12px';
    fontSizeChanged = true;
  } else if (displayValLength <= 6 && fontSizeChanged) {
    displayValElement.style.fontSize = '48px';
    displayValElement.style.padding='12px';
    fontSizeChanged = false;
  }
}

var updateEquationDisplay = () => {
  equationDisplay.innerText = evalStringArray.join(' ') + '';
}

var clearEquationDisplay = () => {
  equationDisplay.innerText = '';
}

// Function to update the display element text
var updateDisplayElement = () => {
  displayValElement.innerText = displayVal;
}

var updateDisplayVal = (clickObj) => {
  // Grabs the text of the button that was clicked
  var btnText = clickObj.target.innerText;

  // Clears the display element if it is a new equation so the user doesn't need to clear the display for every new equation
  if (newEquation) {
    displayVal = '';
    updateDisplayElement();
    newEquation = false;
  }

  // Prevents multiple zeros being displayed at start of the number
  if (displayVal === '0') {
    displayVal = '';
  }

  // Add new number to the current display value
  displayVal += btnText;
  // Update display element with new value
  updateDisplayElement();
}

// Evaluation function to complete the equation
var evaluate = () => {
  if (evalStringArray.includes('^')) {
    displayVal = Math.pow(evalStringArray[0], evalStringArray[2])
    updateDisplayElement();
    isOverflowed();
    evalStringArray = [];
    clearEquationDisplay();
    newEquation = true;
    return;
  }
  let evaluation = eval(evalStringArray.join(' '));
  if (!Number.isInteger(evaluation)) {
    evaluation = evaluation.toFixed(6); // May add setting for user to define how many decimal places to display
  }
  displayVal = evaluation + '';
  updateDisplayElement();
  isOverflowed();
  evalStringArray = [];
  clearEquationDisplay();
  newEquation = true;
}

// Function for operator buttons
var performOperation = (clickObj) => {
  // Grab text of the button that was pressed for switch statement
  let operator = clickObj.target.innerText;

  switch (operator){
    // Addition
    case '+':
      pendingVal = displayVal;
      displayVal = '0';
      updateDisplayElement();
      isOverflowed();
      evalStringArray.push(pendingVal);
      evalStringArray.push('+');
      updateEquationDisplay();
      break;
    // Subtraction
    case '-':
      pendingVal = displayVal;
      displayVal = '0';
      updateDisplayElement();
      isOverflowed();
      evalStringArray.push(pendingVal);
      evalStringArray.push('-');
      updateEquationDisplay();
      break;
    // Multiplication
    case 'x':
      pendingVal = displayVal;
      displayVal = '0';
      updateDisplayElement();
      isOverflowed();
      evalStringArray.push(pendingVal);
      evalStringArray.push('*');
      updateEquationDisplay();
      break;
    // Division
    case '÷':
      pendingVal = displayVal;
      displayVal = '0';
      updateDisplayElement();
      isOverflowed();
      evalStringArray.push(pendingVal);
      evalStringArray.push('/');
      updateEquationDisplay();
      break;
    // Equals (submit)
    case '=':
      evalStringArray.push(displayVal);
      evaluate();
      break;
    // Invert
    case '±':
      displayValLength = displayVal.length;
      if (displayVal.includes('-')) {
        displayVal = displayVal.slice(1, displayValLength);
        updateDisplayElement();
        break;
      } else{
        displayVal = '-' + displayVal;
        updateDisplayElement();
        break;
      }
    // Square Root
    case '√':
      displayVal = Math.sqrt(displayVal);
      updateDisplayElement();
      isOverflowed();
      break;
    // Squared
    case '#²':
      displayVal = displayVal * displayVal;
      updateDisplayElement();
      isOverflowed();
      break;
    // Cubed
    case '#³':
      displayVal = displayVal * displayVal * displayVal;
      updateDisplayElement();
      isOverflowed();
      break;
    // Percentage
    case '%':
      displayVal = evalStringArray[0] * displayVal / 100;
      evalStringArray.push(displayVal);
      evaluate();
      break;
    // PI
    case 'π':
      displayVal = Math.PI;
      updateDisplayElement();
      isOverflowed();
      break;
    // To the power of
    case '^':
      evalStringArray.push(displayVal);
      evalStringArray.push('^');
      displayVal = '0';
      updateDisplayElement();
      updateEquationDisplay();
      break;
      // This only works for one set of numbers. Would need to redo for more advanced equations. eg. 2 + (3^6)
    default:
      break;
  }
}

// Add EventListeners to all buttons
for (let i = 0; i < calcNumBtns.length; i++){
  calcNumBtns[i].addEventListener('click', updateDisplayVal, false);
  calcNumBtns[i].addEventListener('click', isOverflowed, false);
}
for (let i = 0; i < calcOperatorBtns.length; i++){
  calcOperatorBtns[i].addEventListener('click', performOperation, false);
}

// Onclick event for the clear button
clearBtn.onclick = () => {
  displayVal = '0';
  pendingVal = undefined;
  evalStringArray = [];
  if (fontSizeChanged) {
    displayValElement.style.fontSize='48px';
  }
  updateDisplayElement();
}
// Onclick event for the backspace button
backspaceBtn.onclick = () => {
  // Get current length of display value
  let lengthOfDisplayVal = displayVal.length;
  // Slice displayVal from the first value to the second last value
  displayVal = displayVal.slice(0, lengthOfDisplayVal - 1);

  isOverflowed();
  
  // Set zero on display if last value is deleted
  if (displayVal === '') {
    displayVal = '0';
  }

  updateDisplayElement();
}
// Onclick event for decimal button
decimalBtn.onclick = () => {
  // Ensure only one decimal is present
  if (!displayVal.includes('.')) {
    displayVal += '.';
  }
  updateDisplayElement();
}