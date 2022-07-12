import './bootstrap';
import '../css/app.css';

const mainNavBarLinks = document.getElementById('main_nav_bar_links');
const mobileMenuToggle = document.getElementById('mobile_menu_toggle');

document.onreadystatechange = function()
{
    if(window.innerWidth <= 1000)
    {
        mainNavBarLinks.classList.add('hidden');
    } else
    {
        mainNavBarLinks.classList.remove('hidden');
    }
}

window.onresize = function()
{
    if(window.innerWidth <= 780)
    {
        mainNavBarLinks.classList.add('hidden');
    }
}

mobileMenuToggle.onclick = function()
{
    if(mainNavBarLinks.classList.contains('hidden'))
    {
        mainNavBarLinks.classList.remove('hidden');
    } else {
        mainNavBarLinks.classList.add('hidden');
    }
}

const LinksInNavBar = mainNavBarLinks.getElementsByTagName('a');

for(let i = 0; i < LinksInNavBar.length; i++)
{
    LinksInNavBar[i].addEventListener('click', function()
    {
        mainNavBarLinks.classList.add('hidden');
    })
}
