const Comanda = document.querySelectorAll('.optionComanda')

Comanda.forEach((Comanda) => {
    Comanda.addEventListener('click',()=>{
        tiraSeleção()
        Comanda.classList.add('optionComandaSelect')
    })
});

const tiraSeleção = () =>{
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