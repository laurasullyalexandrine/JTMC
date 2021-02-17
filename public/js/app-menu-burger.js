let left = document.querySelector('#menu-search');
let sidebarBody = document.querySelector('#hamburger-sidebar-body');
let button = document.querySelector('#hamburger-button');
let overlay = document.querySelector('#hamburger-overlay');
let activatedClass = 'hambuger-activated';

sidebarBody.innerHTML = left.innerHTML;

button.addEventListener('click', function(e)
{
    e.preventDefault();
   this.parentNode.classList.add(activatedClass);
});

button.addEventListener('click', function(e)
{
    if(this.parentNode.classList.contains(activatedClass))
    {
        if (e.repeat === false)
        {
            this.parentNode.classList.remove(activatedClass);
        }
    }
});

// on se sert de notre var. overlay pour dans un premier temps 
overlay.addEventListener('click', function(e)
{
    e.preventDefault();
    this.parentNode.classList.remove(activatedClass);
});