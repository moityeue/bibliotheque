// Menu Burger

let btnBurger = document.getElementsByClassName('icone-burger');
// console.log(btnBurger);
let menuBurger = document.getElementsByClassName('menu-user-burger');
// console.log(menuBurger);
btnBurger[0].addEventListener('click', function(){
    menuBurger[0].classList.toggle('show');
})

// Sélection des éléments

let link = document.querySelectorAll('.lien-li-nav-user');
let header = document.querySelector('header');
let logoCo = document.querySelector('#logo-connexion-user')
let logoCoBurger = document.querySelector('#logo-connexion-user-burger');
let iconeBurger = document.querySelector('.icone-burger');


// Calcul margin top des liens du header

function setLinkMargin(){ 
    let linkHeight = link[0].offsetHeight;
    let headerHeight = header.clientHeight;
    let margin = ((headerHeight - linkHeight) / 2) + "px";

    link.forEach(element => {
        element.style.marginTop = margin;
    });
}

setLinkMargin();

// Calcul margin top du logo de connexion

function setLogoCoMargin(){
    let logoCoHeight = logoCo.offsetHeight;
    let headerHeight = header.offsetHeight;

    let margin = ((headerHeight - (logoCoHeight*1.1)) / 2) + "px";

    // logoCo.style.marginTop = margin;  
}

setLogoCoMargin();

// Calcul margin top et side logo de co burger et logo menu burger

function setMenuBurgerMargin(){
    let headerHeight = header.offsetHeight;
    let iconeBurgerHeight = iconeBurger.offsetHeight;
    let logoCoBurgerHeight = logoCoBurger.offsetHeight;

    let marginMenu = ((headerHeight - iconeBurgerHeight) / 2) + "px"
    let marginLogo = ((headerHeight - logoCoBurgerHeight) / 2) + "px"

    let marginMenuSide = ((headerHeight - iconeBurgerHeight) / 3) + "px"
    let marginLogoSide = ((headerHeight - logoCoBurgerHeight) / 3) + "px"

    iconeBurger.style.marginTop = marginMenu;
    iconeBurger.style.marginLeft = marginMenuSide;
    logoCoBurger.style.marginTop = marginLogo;
    logoCoBurger.style.marginRight = marginLogoSide;
}

setMenuBurgerMargin();

// Calcul margin menu déroulant

function setSousmenuTopAndWidth(){
    let headerHeight = header.offsetHeight;
    let sousmenu = document.querySelector('.sous-menu-user');
    let sousmenuBurger = document.querySelector('.sous-menu-user-burger');
    let linkConnexion = document.querySelector('#link-connexion-user');
    let connexionBurgerContainer = document.querySelector('#connexion-burger-container');
    let linkConnexionWidth = linkConnexion.clientWidth;
    let connexionBurgerContainerWidth = connexionBurgerContainer.clientWidth;

    sousmenu.style.top = headerHeight + "px";
    
    sousmenu.style.width = linkConnexionWidth + "px";

    sousmenuBurger.style.top = headerHeight + "px";

    sousmenuBurger.style.width = connexionBurgerContainerWidth + "px";
}

setSousmenuTopAndWidth();

// Recalcul lors d'un changement de taille de fenêtre

window.onresize = function (){
    setLinkMargin();
    setLogoCoMargin();
    setMenuBurgerMargin();
    setSousmenuTopAndWidth();
}