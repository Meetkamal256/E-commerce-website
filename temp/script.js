// select elements
const menuOpen= document.querySelector('#menu-open');
const navbar = document.querySelector('#navbar');
const close = document.querySelector('#close');

// add event listener
if(menuOpen){
    menuOpen.addEventListener('click', () =>{
        navbar.classList.add('active');
    })

if(close){
    close.addEventListener('click', () =>{
        navbar.classList.remove('active');
    })
}
}