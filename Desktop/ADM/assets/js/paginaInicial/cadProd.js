//Categoria do produto
const select = document.querySelector('#cat_prod')
var i = 0

//Formulário
const form = document.querySelector('#formsCadastro')

//Formulários
const formProdutos = document.querySelector('#prodForms')
const formHamburguer = document.querySelector('#hamForms')
const formBebidas = document.querySelector('#bebForms')
const formAcompanhamento = document.querySelector('#acomForms')
const formFornecedor = document.querySelector('#fornForms')


var Formularios = [formProdutos,formHamburguer,formBebidas,formAcompanhamento,formFornecedor]

const escondeForms = () => {
    while(i < Formularios.length){
        Formularios[i].classList.add('disable')
        i++
    }
    i = 0
}

select.addEventListener('change', () => {
    if(select.value === '1'){
        escondeForms()
        formProdutos.classList.remove('disable')
        form.action = '../../../PHP/cadastro_prod.php'
        //form.enctype = "multipart/form-data"
    } else if(select.value === '2'){
        escondeForms()
        formHamburguer.classList.remove('disable')
        form.action = '../../../PHP/cadastro_prod.php'
        //form.enctype = "multipart/form-data"
    } else if(select.value === '3'){
        escondeForms()
        formBebidas.classList.remove('disable')
        form.action = '../../../PHP/cadastro_prod.php'
        //form.enctype = "multipart/form-data"
    } else if(select.value === '4'){
        escondeForms()
        formAcompanhamento.classList.remove('disable')
        form.action = '../../../PHP/cadastro_prod.php'
        //form.enctype = "multipart/form-data"
    } else if(select.value === '5'){
        escondeForms()
        formFornecedor.classList.remove('disable')
        form.action = '../../../PHP/cadastro_prod.php'
        //form.enctype = "multipart/form-data"
    }
})

//Mácara do forms produtos
/*Máscara para o telefone*/
var telefoneFornecedor = document.getElementById('telForn')
var telefoneFornecedor = IMask(telefoneFornecedor, {
    mask: '(00) 00000-0000'
});

/*Máscara para a conta bancária*/
var cnpj = document.getElementById('cnpjForn')
var cnpj = IMask(cnpj, {
    mask: '00.000.000/0000-00'
});