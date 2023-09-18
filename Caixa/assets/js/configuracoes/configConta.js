const infoPessoais = document.querySelector('.infoPessoais')
const infoConta = document.querySelector('.infoConta')
const info = document.querySelector('.menuOptionConfig')
const formConfirm = document.querySelector('.confirmForms')

const infoContaShow = () =>{
    infoPessoais.classList.remove('activeConfig')
    infoConta.classList.add('activeConfig')
    info.classList.remove('disable')
    formConfirm.classList.add('disable')
}

const confirmForms = () =>{
    infoPessoais.classList.add('activeConfig')
    infoConta.classList.remove('activeConfig')
    info.classList.add('disable')
    formConfirm.classList.remove('disable')

    infoConta.addEventListener('click', infoContaShow)  

}

infoPessoais.addEventListener('click', confirmForms)