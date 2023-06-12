const infoPessoais = document.querySelector('.infoPessoais')
const infoConta = document.querySelector('.infoConta')
const info = document.querySelector('.menuOptionConfig')
const formConfirm = document.querySelector('.confirmForms')

const infoContaShow = () =>{
    infoPessoais.classList.remove('activeConfig')
    infoConta.classList.add('activeConfig')
    info.style.display = 'block'
    formConfirm.style.display = 'none'
}

const confirmForms = () =>{
    infoPessoais.classList.add('activeConfig')
    infoConta.classList.remove('activeConfig')
    info.style.display = 'none'
    formConfirm.style.display = 'block'

    infoConta.addEventListener('click', infoContaShow)
}

infoPessoais.addEventListener('click', confirmForms)