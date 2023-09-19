// novo-pedido.js
//Opções do menu
const radioButtons = document.querySelectorAll('input[type="radio"]');
const imgOptions = document.querySelectorAll('.imgOption');
const textLabel = document.querySelectorAll('.labelText');

//Areas dos pedidos
const combo = document.querySelector('.combos')
const hamburguer = document.querySelector('.hamburguer')
const porcoes = document.querySelector('.porcoes')
const sobremesa = document.querySelector('.sobremesas')
const bebidas = document.querySelector('.bebidas')

const areaPedidos = [combo, hamburguer, porcoes, sobremesa, bebidas]

for (let i = 0; i < radioButtons.length; i++) {
    radioButtons[i].addEventListener('change', () => {
        imgOptions.forEach((imgOption, index) => {
            if (index === i) {
                imgOption.classList.add('ampliar', 'background');
            } else {
                imgOption.classList.remove('ampliar', 'background');
            }
        });
        textLabel.forEach((textLabel, index) => {
            if (index === i) {
                textLabel.classList.add('backgroundColor')
            } else {
                textLabel.classList.remove('backgroundColor')
            }
        });
        areaPedidos.forEach((areaPedidos, index) => {
            if (index === i) {
                areaPedidos.classList.remove('disable')
            } else {
                areaPedidos.classList.add('disable')
            }
        });
    });
}


imgOptions[0].classList.add('ampliar', 'background');
textLabel[0].classList.add('backgroundColor')

//PopUp do carrinho

const btnCarrinho = document.querySelector('.btnCarrinho')
const popUp = document.querySelector('.popUp')
const fundoOpaco = document.querySelector('.opaco')

btnCarrinho.addEventListener("click", function () {
    popUp.classList.remove('popDown');
    fundoOpaco.classList.remove('popDown');
});

//Fechar PopUp

const fecharPopUp = document.querySelector('.fecharPopUp')

const fecharPOP = () => {
    popUp.classList.add('popDown');
    fundoOpaco.classList.add('popDown');
}

fecharPopUp.addEventListener("click", fecharPOP)

//PopUp de confirmação
const btnConfirm = document.querySelector('.btnConfirm')
const btnCancel = document.querySelector('.btnCancel')
const popUpConfirm = document.querySelector('.popUpConfirm')
const opacoConfirm = document.querySelector('.opacoConfirm')

const inputComandaArea = document.querySelector('.inputComandaArea')

const tipoConfirmacao = document.querySelector('#tipoConfirmacao')
const textoConfirm = document.querySelector('#textoConfirm')

const form = document.querySelectorAll('.formsConfirm')

const mostrarPopUp = () => {
    popUpConfirm.classList.remove('popDown');
    opacoConfirm.classList.remove('popDown');
}

btnCancel.addEventListener("click", function () {
    tipoConfirmacao.innerHTML = 'cancelamento'
    textoConfirm.innerHTML = 'o cancelamento'
    form.action = ''
    inputComandaArea.classList.add('disable')
    mostrarPopUp()
});

btnConfirm.addEventListener("click", function () {
    tipoConfirmacao.innerHTML = 'pedido'
    textoConfirm.innerHTML = 'a aprovação'
    form.action = ''
    inputComandaArea.classList.remove('disable')
    mostrarPopUp()
    alert('Confira a comada e o valor pago pelo cliente. Qualquer irregularidade será de total responsabilidade do funcionário.')
});

//Fechar PopUp

const fecharPopUpConfirm = document.querySelector('.fecharPopUpConfirm')

fecharPopUpConfirm.addEventListener("click", () => {
    popUpConfirm.classList.add('popDown');
    opacoConfirm.classList.add('popDown');
})