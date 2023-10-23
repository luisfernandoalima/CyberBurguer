/*const codigoPedidoInput = document.querySelector('#codPedido')
const itensPedido = document.querySelector('.itensPedido');

var i = 0

var formulario = document.querySelector("form");

const selecionarBtn = () => {

    var btnCancel = document.querySelectorAll('.btnCancel');

    btnCancel.forEach(btn => {
        btn.addEventListener('click', () => {
            var divPedidosFeitos = document.querySelectorAll('.pedidosFeitos');

            divPedidosFeitos.forEach(div => {
                if (div.classList.contains(btn.value)) {
                    div.style.display = 'none'
                }
            });
        });
    });
}


const inserirPedido = () => {
    if (codigoPedidoInput.value != '') {
        //Criando a div dos inputs
        var divInput = document.createElement("div")
        divInput.classList.add("inputArea", "row", i, "pedidosFeitos")
        itensPedido.appendChild(divInput)

        var inputCod = document.createElement("input");
        inputCod.value = codigoPedidoInput.value
        inputCod.classList.add("col-2")
        inputCod.name = 'inputCod' + i
        inputCod.type = 'text'
        inputCod.readOnly = 'true'
        divInput.appendChild(inputCod)

        var inputNome = document.createElement("input");
        inputNome.classList.add("col-4")
        inputNome.name = 'inputNome' + i
        inputNome.type = 'text'
        inputNome.readOnly = 'true'
        divInput.appendChild(inputNome)

        var inputDetails = document.createElement("details");
        inputDetails.classList.add("col-3")
        divInput.appendChild(inputDetails)
        var detailsSummary = document.createElement("summary");
        inputDetails.appendChild(detailsSummary)
        detailsSummary.innerHTML = 'Mais'
        var detailsP = document.createElement("p")
        detailsP.innerHTML = "Lauren"

        var inputQtd = document.createElement("input");
        inputQtd.value = '1'
        inputQtd.classList.add("col-2")
        inputQtd.name = 'inputQtd' + i
        inputQtd.type = 'text'
        divInput.appendChild(inputQtd)

        var inputCancel = document.createElement("input");
        inputCancel.classList.add("col-1", "btnCancel")
        inputCancel.name = 'inputCancel' + i
        inputCancel.innerHTML = 'Oi'
        inputCancel.value = i
        inputCancel.type = "text"
        divInput.appendChild(inputCancel)

        codigoPedidoInput.value = ''
        i++

        selecionarBtn()
    }
}

codigoPedidoInput.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Impede a ação padrão da tecla Enter
        inserirPedido()
    }
});

codigoPedidoInput.addEventListener("blur", inserirPedido);*/


const tabelas = document.querySelectorAll('table')

const escondeTabela = () => {
    tabelas.forEach(tabela => {
        tabela.style.display = 'none'
    });
}

escondeTabela()

var select = document.querySelector('select')

select.addEventListener('change', () => {
    var opcaoSelecionada = select.value;
    escondeTabela()
    if (opcaoSelecionada === "Hamburguer") {
        tabelas[0].style.display = "block";
    } else if (opcaoSelecionada === "Bebida") {
        tabelas[1].style.display = "block";
    }
})

tabelas[0].style.display = "block";

//popUp
const fundoOpaco = document.querySelector('.fundo');
const popUp = document.querySelector('.popUpDiv');
const more = document.querySelectorAll('.more');

const exibirPopUp = () => {
    fundoOpaco.classList.remove('disable')
    popUp.classList.remove('disable');

    popUp.classList.remove('scale-out-center');
    fundoOpaco.classList.remove('fade-out')

    popUp.classList.add('scale-in-center')
    fundoOpaco.classList.add('fade-in')
}

more.forEach((detalhes) => {
    detalhes.addEventListener('click', () => {
        exibirPopUp();
    });
});

const btnFechar = document.querySelector('.popUpButton button')

btnFechar.addEventListener('click', () => {
    popUp.classList.remove('scale-in-center')
    popUp.classList.add('scale-out-center')
    fundoOpaco.classList.remove('fade-in')
    fundoOpaco.classList.add('fade-out')

    function disable() {
        if (popUp.classList.contains('scale-out-center')) {
            popUp.classList.add('disable')
            fundoOpaco.classList.add('disable')
        }
    }

    setTimeout(disable, 1000)
})




//popUp Carrinho 
const btnCart = document.querySelector(".btnCarrinho")
const popUpCart = document.querySelector('.popUpCart')

btnCart.addEventListener('click', () => {
    fundoOpaco.classList.remove('disable')
    popUpCart.classList.remove('hidden');

    popUpCart.classList.remove('scale-out-center');
    fundoOpaco.classList.remove('fade-out')

    popUpCart.classList.add('scale-in-center')
    fundoOpaco.classList.add('fade-in')
})

const btnFecharCart = document.querySelector('.btnFechar')

btnFecharCart.addEventListener('click', () => {
    popUpCart.classList.remove('scale-in-center')
    popUpCart.classList.add('scale-out-center')
    fundoOpaco.classList.remove('fade-in')
    fundoOpaco.classList.add('fade-out')

    function disable() {
        popUpCart.classList.add('hidden')
        fundoOpaco.classList.add('disable')
    }

    setTimeout(disable, 1000)
})

var inputQtd = document.querySelectorAll('.inputQtdProduto')

inputQtd.forEach(input => {
    input = IMask(input, {
        mask: '000'
    });
});