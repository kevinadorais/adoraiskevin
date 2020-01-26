// Variables

var previewButton = document.getElementById('previewButton')
var playButton = document.getElementById('playButton')
var nextButton = document.getElementById('nextButton')
var randomButton = document.getElementById('randomButton')
var sliderImg = document.getElementById('visiblePhoto')
var sliderTitle = document.getElementById('sliderTitle')
var timeNext
var boleenPlay = false

var momentsPhotos = 
[{
    lien:"https://assets.sport.francetvinfo.fr/sites/default/files/styles/large_16_9/public/2019-06/rts2jjto.jpg?h=1722d8bf&itok=2_32Gy4A",
    title:"Giannis Antetokounpo remporte le trophé MVP",
},{
    lien:"https://www.gannett-cdn.com/media/2019/06/27/USATODAY/usatsports/usatsi_12893873.jpg?width=1080&quality=50",
    title:"Raptors champion de NBA",
},{
    lien:"https://le10static.com/img/cache/article/624x351/0000/0014/148066.webp",
    title:"Parker prend sa retraite",
},{
    lien:"https://cdn.nba.net/nba-drupal-prod/styles/landscape/s3/2019-02/joeharris_mvptrophy.jpg?itok=0hcNQWPC",
    title:"Joe Harris gagne le concour de 3pts",
},{
    lien:"http://img.over-blog-kiwi.com/1/42/65/05/20190217/ob_375514_972cc.jpg",
    title:"Hamidou Diallo gagne le concour de dunk",
},{
    lien:"http://img.over-blog-kiwi.com/1/42/65/05/20190217/ob_fd5e37_20190217-031903.jpg",
    title:"Jayson Tatum remporte le Skill Challenge",
},{
    lien:"https://www.parlons-basket.com/wp-content/uploads/2019/07/Dirk-NBA-1000x520.jpg",
    title:"Nowitzki prend sa retraite",
},]





var photoNumber = Math.floor(Math.random()*momentsPhotos.length)

// Fonctions

function nextPhoto (event){
    event.preventDefault();
    photoNumber++   
    if (photoNumber == momentsPhotos.length) {
        photoNumber = 0;
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
    else{
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
}

function previewPhoto (event){
    event.preventDefault();
    photoNumber--
    if (photoNumber == -1) {
        photoNumber = momentsPhotos.length-1
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
    else{
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
}

function sliderPlay (event){
    event.preventDefault();
    if (boleenPlay==false) {
        timeNext = setInterval(intervalNextPhoto, 1500);
        boleenPlay = true;
        playButton.innerHTML='<i class="fas fa-pause"></i>';
    }
    else if(boleenPlay==true){
        clearInterval(timeNext);
        boleenPlay = false;
        playButton.innerHTML='<i class="fas fa-play"></i>';
    }
}

function intervalNextPhoto (){
    photoNumber++   
    if (photoNumber == momentsPhotos.length) {
        photoNumber = 0;
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
    else{
        sliderImg.src = momentsPhotos[photoNumber].lien
        sliderTitle.innerHTML= momentsPhotos[photoNumber].title
    }
}

function randomPhoto(event){
    event.preventDefault();
    let random = Math.floor(Math.random()*momentsPhotos.length)
    while (random == photoNumber) {
        random = Math.floor(Math.random()*momentsPhotos.length)
    }
    photoNumber=random
    sliderImg.src = momentsPhotos[photoNumber].lien
    sliderTitle.innerHTML= momentsPhotos[photoNumber].title
}

// Code

sliderImg.src = momentsPhotos[photoNumber].lien
sliderTitle.innerHTML= momentsPhotos[photoNumber].title
nextButton.addEventListener("click", nextPhoto)
previewButton.addEventListener("click", previewPhoto)
playButton.addEventListener("click", sliderPlay)
randomButton.addEventListener("click", randomPhoto)