const btnCupom = document.querySelector('.btnCupom')
const forms = document.querySelector('.formularioCupom')

btnCupom.addEventListener('click', () => {
    forms.classList.remove('disable')
    btnCupom.classList.add('disable')
})

const inputCupom = document.querySelector('.inputCupom')

inputCupom.addEventListener('blur', () =>{
    if(inputCupom.value != ''){

    }
})