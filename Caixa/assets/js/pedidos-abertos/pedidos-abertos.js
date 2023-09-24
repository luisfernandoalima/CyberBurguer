const Comanda = document.querySelectorAll('.optionComanda')

Comanda.forEach((Comanda) => {
    Comanda.addEventListener('click', () => {
        tiraSeleção()
        Comanda.classList.add('optionComandaSelect')
    })
});

const tiraSeleção = () => {
    Comanda.forEach((Comanda) => {
        Comanda.classList.remove('optionComandaSelect')
    });
}

//PopUp de pedido
const btnVerPedido = document.querySelectorAll('.btnVerPedido')
const popUpPediodo = document.querySelector('.popUpPediodo')
const opaco = document.querySelector('.opaco')

const form = document.querySelectorAll('.formsConfirm')

const mostrarPopUp = () => {
    opaco.classList.remove('popDown');
    popUpPediodo.classList.remove('popDown');
}

btnVerPedido.forEach((btnVerPedido) => {
    btnVerPedido.addEventListener('click', () => {
        mostrarPopUp()
    })
})

const fecharPopUp = document.querySelector('.fecharPopUp')

const fecharPOP = () => {
    opaco.classList.add('popDown');
    popUpPediodo.classList.add('popDown');
}

fecharPopUp.addEventListener("click", fecharPOP)


const btnConcluirPedido = document.querySelector('.btnConcluirPedido')
const popUpConfirm = document.querySelector('.popUpConfirmEx')
const opacoConfirm = document.querySelector('.opacoConfirmEx')

const radioButton = document.querySelectorAll(".radioButton")
const numComanda = document.querySelectorAll('.numComanda')
const numComandaArea = document.querySelector('.numComandaArea')

for (let x; x < radioButton.length; x++) {
    radioButton[x].addEventListener('change', () => {
        numComandaArea.innerHTML = numComanda
    })
}

const mostrarPopUpConfirm = () => {
    opacoConfirm.classList.remove('popDown');
    popUpConfirm.classList.remove('popDown');
}

btnConcluirPedido.addEventListener('click', () => {
    mostrarPopUpConfirm()
})

const fecharPopUpConfirm = document.querySelector('.fecharPopUpConfirm')

const fecharPOPUpConfirm = () => {
    opacoConfirm.classList.add('popDown');
    popUpConfirm.classList.add('popDown');
}

fecharPopUpConfirm.addEventListener("click", fecharPOPUpConfirm)