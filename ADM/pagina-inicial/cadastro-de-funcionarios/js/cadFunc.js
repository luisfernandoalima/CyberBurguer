const formulariojs = () =>{
    const myDate = new Date().toLocaleDateString();

    const inputData = document.querySelector('#adimi_func')

    inputData.value = myDate
}


//PopUp sair/configurações
var options = document.querySelector('#options');
var opções= document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e)=>{
        optionsMenu.classList.toggle('disable')
        opções.classList.toggle('opcoesAble')
})

