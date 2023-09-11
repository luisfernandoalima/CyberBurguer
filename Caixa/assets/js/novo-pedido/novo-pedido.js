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