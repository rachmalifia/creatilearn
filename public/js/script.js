// Navbar Fixed
window.onscroll = function() {
    const header = document.querySelector('#navbar');
    const fixedNav = header.offsetTop;

    if(window.scrollY > fixedNav){
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};


// Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');

hamburger.addEventListener('click', function(){
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

// // Button Mulai
// const buttonStarted = document.getElementById("button-started").onclick = function () {
//     location.href = "/login";
// }


