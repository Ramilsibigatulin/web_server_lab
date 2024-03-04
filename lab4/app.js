const resultElement = document.getElementById('result');
const input1 = document.getElementById('input1');
const submitBtn = document.getElementById('submit_real');
const submitBtnInvisible = document.getElementById('submit_invisible');
const plusBtn = document.getElementById('plus');
const minusBtn = document.getElementById('minus');
const multiplyBtn = document.getElementById('multiply');
const devideBtn = document.getElementById('devide');

const two = document.querySelector('#two');
const three = document.querySelector('#three');
const four = document.querySelector('#four');
const five = document.querySelector('#five');
const six = document.querySelector('#six');
const seven = document.querySelector('#seven');
const eight = document.querySelector('#eight');
const nine = document.querySelector('#nine');
const zero = document.querySelector('#zero');
const one = document.querySelector('#one');
const delet = document.querySelector('#delete');
const simbol = document.querySelector('#simbol');
const leftBracket = document.querySelector('#lBrack');
const rightBracket = document.querySelector('#rBrack');

const addNumb = (numb) => {
  input1.value += numb.innerText;
};
delet.addEventListener('click', () => {
  input1.value = input1.value.slice(0, -1);
});
one.addEventListener('click', () => {
  addNumb(one);
});
leftBracket.addEventListener('click', () => {
  addNumb(leftBracket);
});
rightBracket.addEventListener('click', () => {
  addNumb(rightBracket);
});
two.addEventListener('click', () => {
  addNumb(two);
});
three.addEventListener('click', () => {
  addNumb(three);
});
four.addEventListener('click', () => {
  addNumb(four);
});
five.addEventListener('click', () => {
  addNumb(five);
});
six.addEventListener('click', () => {
  addNumb(six);
});
seven.addEventListener('click', () => {
  addNumb(seven);
});
eight.addEventListener('click', () => {
  addNumb(eight);
});
nine.addEventListener('click', () => {
  addNumb(nine);
});
zero.addEventListener('click', () => {
  addNumb(zero);
});
plusBtn.addEventListener('click', () => {
  addNumb(plusBtn);
});
minusBtn.addEventListener('click', () => {
  addNumb(minusBtn);
});
multiplyBtn.addEventListener('click', () => {
  addNumb(multiplyBtn);
});
devideBtn.addEventListener('click', () => {
  addNumb(devideBtn);
});
submitBtn.addEventListener('click', () => {
  submitBtnInvisible.click();
  // resultElement.textContent = eval(input1.value);
});
