// Variables
var toggleButton = document.getElementById('toggleButton');
var Navbar = document.getElementById('Navbar');
var secondToggleButton = document.getElementById('secondToggleButton');

// Fonctions
function toggleNavbar (){
    Navbar.classList.toggle('hiddenNavbar');
    secondToggleButton.classList.toggle('hiddenNavbar')
    }

// Code
toggleButton.addEventListener('click', toggleNavbar);
secondToggleButton.addEventListener('click', toggleNavbar);