const Cliente = document.querySelectorAll('.optionCliente')

Cliente.forEach((Cliente) => {
    Cliente.addEventListener('click', () => {
        tiraSeleção()
        Cliente.classList.add('optionClienteSelect')
    })
});

const tiraSeleção = () => {
    Cliente.forEach((Cliente) => {
        Cliente.classList.remove('optionClienteSelect')
    });
}

//PopUp de pedido
const btnVerMais = document.querySelectorAll('.btnVerMais')
const popUpCliente = document.querySelector('.popUpCliente')
const opaco = document.querySelector('.opaco')

const form = document.querySelectorAll('.formsConfirm')

const mostrarPopUp = () => {
    opaco.classList.remove('popDown');
    popUpCliente.classList.remove('popDown');
}

btnVerMais.forEach((btnVerMais) => {
    btnVerMais.addEventListener('click', () => {
        mostrarPopUp()
    })
})

const fecharPopUp = document.querySelector('.fecharPopUp')

const fecharPOP = () => {
    opaco.classList.add('popDown');
    popUpCliente.classList.add('popDown');
}

fecharPopUp.addEventListener("click", fecharPOP)

//Cadastro de Clientes

const btnCadastro = document.querySelector('.btnCadastro')

btnCadastro.addEventListener('click', () =>{
    window.location.href = 'cadastro-de-clientes/cadastro-de-clientes.php'
})