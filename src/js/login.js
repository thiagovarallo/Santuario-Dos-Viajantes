/* mostrar a senha escrita no input para o usuario */ 

const tagImg = document.getElementById('passwordShow');
const inputPassword = document.getElementById('password');
var click = false;

tagImg.addEventListener('click', () => {
    
    if ( click == false ) {
        click = true
        tagImg.setAttribute('src', '../img/icons/eyeSlash.svg')
        inputPassword.setAttribute('type', 'password')
    } else if (click == true) {
        click = false
        tagImg.setAttribute('src', '../img/icons/eye.svg')
        inputPassword.setAttribute('type', 'text')
    }
})







