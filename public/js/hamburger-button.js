
// console.log('Hello !')
// Here we get the hamburger-content and hamburger-sidebar-body 'id' in the DOM
let btn = document.querySelector('.hamburger-button');
let nav = document.querySelector('.nav');
// let content = document.querySelector('.hamburger-content');
// let sidebarBody = document.querySelector('.hamburger-sidebar-body');
// let searchEngine = document.querySelector('.search-engine');
// let sidebarHeader = document.querySelector('.hamburger-sidebar-header');



// Here the hamburger-sidebar-body id will replace the hamburger-content id same think for search-engine id with sidebar-header id. 
// sidebarBody.innerHTML = content.innerHTML;
// sidebarHeader.innerHTML = searchEngine.innerHTML;

btn.onclick = function()
{
    nav.classList.toggle('nav-open');
}