
// console.log('Hello !')
// here we create many variables to then build our function js

let searchEngine = document.querySelector('.search-engine');
let sidebarHeader = document.querySelector('.hamburger-sidebar-header');

let content = document.querySelector('.hamburger-content');
let sidebarBody = document.querySelector('.hamburger-sidebar-body');

let btn = document.querySelector('.hamburger-button');
let sidebar = document.querySelector('.hamburger-sidebar');
let overlay = document.querySelector('.hamburger-overlay');


// Here the hamburger-sidebar-body id will replace the hamburger-content id same think for search-engine id with sidebar-header id. 
sidebarHeader.innerHTML = searchEngine.innerHTML;
sidebarBody.innerHTML = content.innerHTML;


// Here we create two functions that make it possible to boost the responsive interface
btn.onclick = function() {
    sidebar.classList.toggle('sidebar-open');
    overlay.classList.toggle('overlay-open');
    // console.log(btn);
}


overlay.onclick = function() {
    if(overlay)
    {
        sidebar.classList.remove('sidebar-open');
        overlay.classList.remove('overlay-open');
    }
    // console.log(overlay);
}
 