var score1Display = document.getElementById('score1');
var score2Display = document.getElementById('score2');
var score3Display = document.getElementById('score3');
var quizz1Submit = document.getElementById('quizz1Submit');
var quizz2Submit = document.getElementById('quizz2Submit');
var quizz3Submit = document.getElementById('quizz3Submit');
var timerDisplay = document.getElementById('timerDisplay');
var timer = 350;

function quizz1Verify(){
    let score = 0;

    if ($("input[name=question1]:checked").val() == '3') {
        score++;
    }       
    if ($("input[name=question2]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question3]:checked").val() == '2') {
        score++;
    }
    if ($("input[name=question4]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question5]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question6]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question7]:checked").val() == '2') {
        score++;
    }
    if ($("input[name=question8]:checked").val() == '1') {
        score++;
    }
    if ($("input[name=question9]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question10]:checked").val() == '1') {
        score++;
    }

    score1Display.innerHTML = score + ' / 10';
    resultDisplay(score, score1Display);
};

function quizz2Verify(){
    let score = 0;

    if ($("input[name=question1]:checked").val() == '3') {
        score++;
    }       
    if ($("input[name=question2]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question3]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question4]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question5]:checked").val() == '1') {
        score++;
    }
    if ($("input[name=question6]:checked").val() == '1') {
        score++;
    }
    if ($("input[name=question7]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question8]:checked").val() == '2') {
        score++;
    }
    if ($("input[name=question9]:checked").val() == '1') {
        score++;
    }
    if ($("input[name=question10]:checked").val() == '2') {
        score++;
    }

    score2Display.innerHTML = score + ' / 10';
    resultDisplay(score, score2Display);
};

function quizz3Verify(){
    let score = 0;

    if ($("input[name=question1]:checked").val() == '3') {
        score++;
    }       
    if ($("input[name=question2]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question3]:checked").val() == '2') {
        score++;
    }
    if ($("input[name=question4]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question5]:checked").val() == '1') {
        score++;
    }
    if ($("input[name=question6]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question7]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question8]:checked").val() == '4') {
        score++;
    }
    if ($("input[name=question9]:checked").val() == '3') {
        score++;
    }
    if ($("input[name=question10]:checked").val() == '4') {
        score++;
    }

    score3Display.innerHTML = score + ' / 10';
    resultDisplay(score, score3Display);
};

function resultDisplay (score, scoreDisplay){
    
    $('#quizzDisplay').empty();
    clearInterval(quizzTimer);
    quizzButtonToggle();

    if(score >= 8){
        scoreDisplay.setAttribute("class", "goodRate");
        $('#quizzDisplay').append("<div>Excellent, tu as " + score + " bonnes réponse sur 10 Felicitation !</div>");
    } 
    else if(score >= 5 && score <= 7){
        scoreDisplay.setAttribute("class", "middleRate");
        $('#quizzDisplay').append("<div>Pas mal, tu as " + score + " bonnes réponse sur 10 entraîne toi et reessaye.</div>");
    }
    else if(score <= 4 || score === 0){
        scoreDisplay.setAttribute("class", "badRate");
        $('#quizzDisplay').append("<div>Dommage tu n\'as fait que " + score + " bonnes réponse sur 10 entraîne toi et reessaye.</div>");
    }
    else{
        $('#quizzDisplay').append("Un problème est survenu ! " + score);
    }
};
    
function quizzSetTimer(){
    timer = 350;
    
    quizzTimer = setInterval(function(){
        timer--;
        timerDisplay.innerHTML = 'Temps Restant : ' + timer + 's';
        if (timer == 0){
            if($("#quizz1Submit").hasClass("quizzSelected")==true){
                quizz1Verify();
            }
            if($("#quizz2Submit").hasClass("quizzSelected")==true){
                quizz2Verify();
            }
            if($("#quizz3Submit").hasClass("quizzSelected")==true){
                quizz3Verify();
            }
        }
    },1000);
}

quizz1Submit.addEventListener('click', quizz1Verify);
quizz2Submit.addEventListener('click', quizz2Verify);
quizz3Submit.addEventListener('click', quizz3Verify);
quizzSetTimer();
