// Sélection de mes éléments

let header = document.querySelector('header');
let aside = document.querySelector('#side-bar');
let pageName = document.querySelector('#page-name');
let logoCo = document.querySelector('#logo-co-header');

// Calcul de la hauteur de la sidebar et de sa position top

function setAsideSize() {
    let headerHeight = header.offsetHeight;
    let windowHeight = window.innerHeight;
    let asideSize = (windowHeight - headerHeight) + "px";

    aside.style.height = asideSize;
    aside.style.top = headerHeight + "px"; 
}

setAsideSize();

// Calcul de la margin-top de pageName

function setPageNameMargin(){
    let fontsize = window.getComputedStyle(pageName, null).getPropertyValue('font-size');
    let fontsizeInt = parseFloat(fontsize);

    let headerHeight = header.offsetHeight;
    let margin = ((headerHeight - fontsizeInt) / 2) + "px";

    pageName.style.marginTop = margin;
}

setPageNameMargin();

// Calcul de la margin-top du logo de connexion du header

function setLogoCoMargin(){
    let logoCoHeight = logoCo.offsetHeight;
    let headerHeight = header.offsetHeight;

    let margin = ((headerHeight - logoCoHeight) / 2) + "px";

    logoCo.style.marginTop = margin;  
}

setLogoCoMargin();

// Recalcul lors d'un changement de taille de fenêtre

window.onresize = function (){
    setAsideSize();
    setPageNameMargin();
    setLogoCoMargin();
}

// Ouverture Fermeture Retour
let row = document.getElementsByClassName('row-hide');

let openBtn = document.getElementsByClassName('see-more');
let openBtnArray = Array.from(openBtn);;

let closeBtn = document.getElementsByClassName('close-return')

let formReturn = document.getElementsByClassName('form-return');
let formReturnLength = formReturn.length;

for (let i = 0; i < formReturnLength; i++) {
    openBtn[i].addEventListener('click', function(){
        let rowChildArray = Array.from(row[i].childNodes);

        rowChildArray[3].classList.toggle('table-row-show');
        rowChildArray[5].classList.toggle('table-row-show');
    })
}

// for (let i = 0; i < formReturnLength; i++) {
//     closeBtn[i].addEventListener('click', function(){
//         let rowChildArray = Array.from(row[i].childNodes);

//         rowChildArray[3].classList.remove('table-row-show');
//         rowChildArray[5].classList.remove('table-row-show');
//     })
// }

// Affichage des X premiers caractères du titre

let bookTitleContainer = Array.from(document.getElementsByClassName('book-title-return'));

bookTitleContainer.forEach(element => {
    let bookTitle = element.innerHTML;
    let bookTitleLength = bookTitle.length;
    if(bookTitleLength > 25){
        let cutTitle = bookTitle.substring(0, 25);

        let titleExplode = cutTitle.split('');
        let titleExplodeLast = titleExplode[(titleExplode.length) - 1];
        let titleExplodeLength = titleExplode.length;

        if(titleExplodeLast === ' '){
            let cutLastSpace = titleExplode.splice(0, titleExplodeLength - 1);
            console.log(cutLastSpace);
            let titleImplode = cutLastSpace.join('');
            let finalTitle = titleImplode + '...';
            element.innerHTML = finalTitle;
        } else {
            console.log(titleExplode);
            let titleImplode = titleExplode.join('');
            let cutBySpace = titleImplode.split(' ');
            let supprLastWord = cutBySpace.slice(0, (cutBySpace.length - 1))
            let finalTitle = supprLastWord.join(' ');
            console.log(supprLastWord);
            element.innerHTML = finalTitle + '...'
        }
    } 
});

let bookTitleStock = Array.from(document.getElementsByClassName('title-limit-stock'));

bookTitleStock.forEach(element => {
    let bookTitle = element.innerHTML;
    let bookTitleLength = bookTitle.length;
    if(bookTitleLength > 18){
        let cutTitle = bookTitle.substring(0, 18);

        let titleExplode = cutTitle.split('');
        let titleExplodeLast = titleExplode[(titleExplode.length) - 1];
        let titleExplodeLength = titleExplode.length;

        if(titleExplodeLast === ' '){
            let cutLastSpace = titleExplode.splice(0, titleExplodeLength - 1);
            console.log(cutLastSpace);
            let titleImplode = cutLastSpace.join('');
            let finalTitle = titleImplode + '...';
            element.innerHTML = finalTitle;
        } else {
            console.log(titleExplode);
            let titleImplode = titleExplode.join('');
            let cutBySpace = titleImplode.split(' ');
            let supprLastWord = cutBySpace.slice(0, (cutBySpace.length - 1))
            let finalTitle = supprLastWord.join(' ');
            console.log(supprLastWord);
            element.innerHTML = finalTitle + '...'
        }
    } 
});



