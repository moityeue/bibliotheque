let body = document.querySelector('body');
let bodyChild = body.childNodes;
let nodeList = Array.from(bodyChild);
let logo = document.querySelector('.bibli-lyon');
let text = ['bienvenue sur le site de',' la bibliothèque de Lyon'];


function animationWelcome(){

    childNone();

    let animContainer = document.createElement('div');
    animContainer.classList.add('anim-container')

    let logoAnim = document.createElement('img');
    logoAnim.src = 'views/templates/ressource/logo/logo-simple-couleur.png';
    logoAnim.classList.add('logo-anim');

    
    let textAnim = document.createElement('p');
    textAnim.classList.add('text-anim');
    animContainer.append(textAnim);

    animContainer.prepend(logoAnim);
    body.prepend(animContainer);

    setTimeout(() => {
        textTyping(text);
    }, 350);
    

    endAnim(animContainer,5000);

}

function endAnim(element, delay){

    setTimeout(() => {
        deleteAnim(element);
        childBack();
    }, delay);

    setTimeout(() => {
        document.cookie = 'animControl=skip';

        let script = document.createElement('script');
        script.src = '/php/Library-Lyon/views/templates/js/template-user.js';
        body.append(script);
    }, delay + 250)
}

function childNone(){
    for (let i = 0; i < nodeList.length; i++) {
        if((i % 2) !== 0){
            nodeList[i].classList.add('none')
        } 
    } 
}

function childBack(){
    for (let i = 0; i < nodeList.length; i++) {
        if((i % 2) !== 0){
            nodeList[i].classList.remove('none');
        } 
    }
}

function deleteAnim(element){
    element.style.top = '-100vh';
    element.style.position = 'absolute';
    
    setTimeout(() => {
        element.classList.add('none')
    }, 1200);
}

async function textTyping(blocSentence, delayLetters = 100) {

    let lettersBloc1 = blocSentence[0].split('');
    let lettersBloc1Length = lettersBloc1.length;
    let i = lettersBloc1Length;

    let lettersBloc2 = blocSentence[1].split('');
    let lettersBloc2Length = lettersBloc2.length;
    let j = 0;

    while(i > 0 && j < lettersBloc2Length){

        await waitDelay(delayLetters);

        let divTyping = document.getElementsByClassName('text-anim');
        divTyping[0].prepend(lettersBloc1[i-1]);
        divTyping[0].append(lettersBloc2[j]);
        i--
        j++
        }
        
    return;
}

function waitDelay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms))
}

if(document.cookie !== 'animControl=skip'){
    animationWelcome();
} else {
    let script = document.createElement('script');
    script.src = '/php/Library-Lyon/views/templates/js/template-user.js';
    body.append(script);
}