const codigoPedidoInput = document.querySelector('#codPedido')
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
        inputCod.classList.add("col-3")
        inputCod.name = 'inputCod' + i
        inputCod.type = 'text'
        inputCod.readOnly = 'true'
        divInput.appendChild(inputCod)

        var inputNome = document.createElement("input");
        inputNome.classList.add("col-5")
        inputNome.name = 'inputNome' + i
        inputNome.type = 'text'
        inputNome.readOnly = 'true'
        divInput.appendChild(inputNome)

        var inputQtd = document.createElement("input");
        inputQtd.value = '1'
        inputQtd.classList.add("col-2")
        inputQtd.name = 'inputQtd' + i
        inputQtd.type = 'text'
        divInput.appendChild(inputQtd)

        var inputCancel = document.createElement("input");
        inputCancel.classList.add("col-2", "btnCancel")
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

codigoPedidoInput.addEventListener("blur", inserirPedido);