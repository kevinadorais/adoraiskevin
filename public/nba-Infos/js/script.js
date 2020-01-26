// Variables

var leftLogo = document.getElementById('confwest');
var rightLogo = document.getElementById('confeast');
var leftDiv = document.getElementById('confwestColored');
var rightDiv = document.getElementById('confeastColored');

// Fonctions

function leftColorChange(){
leftDiv.classList.add("leftColor");
}

function leftColorReturn(){
leftDiv.classList.remove('leftColor');
}

function rightColorChange(){
rightDiv.classList.add('rightColor');
}

function rightColorReturn(){
rightDiv.classList.remove('rightColor');
}

// Code

leftLogo.addEventListener('mouseenter', leftColorChange);
leftLogo.addEventListener('mouseout', leftColorReturn);

rightLogo.addEventListener('mouseenter', rightColorChange);
rightLogo.addEventListener('mouseout', rightColorReturn);