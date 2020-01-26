var quizz1Button = document.getElementById('quizz1');
var quizz2Button = document.getElementById('quizz2');
var quizz3Button = document.getElementById('quizz3');
var score1Display = document.getElementById('score1');
var score2Display = document.getElementById('score2');
var score3Display = document.getElementById('score3');

function quizzButtonToggle(){
    quizz1Button.classList.toggle("none");
    quizz2Button.classList.toggle("none");
    quizz3Button.classList.toggle("none");
    score1Display.classList.toggle("none");
    score2Display.classList.toggle("none");
    score3Display.classList.toggle("none");
}

function quizz1Display(){
    quizzButtonToggle();
    $.get('quizz/quizz1.php', quizzDisplay); 
}

function quizz2Display(){
    quizzButtonToggle();
    $.get('quizz/quizz2.php', quizzDisplay); 
}

function quizz3Display(){
    quizzButtonToggle();
    $.get('quizz/quizz3.php', quizzDisplay);
}

function quizzDisplay(response){
    $('#quizzDisplay').html(response);
}

quizz1Button.addEventListener('click', quizz1Display);
quizz2Button.addEventListener('click', quizz2Display);
quizz3Button.addEventListener('click', quizz3Display);
