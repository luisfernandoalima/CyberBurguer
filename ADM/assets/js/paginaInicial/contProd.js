//Select da categoria
var categoria = document.querySelector('#cat_prod')
var i = 0

//Tabelas
const tabelaProdutos = document.querySelector('#tabelaProdutos')
const tabelaHamburguer = document.querySelector('#tabelaHamburguer')
const tabelaBebidas = document.querySelector('#tabelaBebidas')
const tabelaAcompanhamento = document.querySelector('#tabelaAcompanhamento')
const tabelaFornecedor = document.querySelector('#tabelaFornecedor')

var Tabelas = [tabelaProdutos,tabelaHamburguer,tabelaBebidas,tabelaAcompanhamento,tabelaFornecedor]


/*Esconder todas as tabelas*/
const escondeTabela = () => {
    while(i < Tabelas.length){
        Tabelas[i].classList.add('disable')
        i++
    }
    i = 0
}


escondeTabela()

//Muda as tabelas
categoria.addEventListener('change', () =>{
    if(categoria.value === '1'){
        escondeTabela()
        tabelaProdutos.classList.remove('disable')
    } else if(categoria.value === '2'){
        escondeTabela()
        tabelaHamburguer.classList.remove('disable')
    } else if(categoria.value === '3'){
        escondeTabela()
        tabelaBebidas.classList.remove('disable')
    } else if(categoria.value === '4'){
        escondeTabela()
        tabelaAcompanhamento.classList.remove('disable')
    } else if(categoria.value === '5'){
        escondeTabela()
        tabelaFornecedor.classList.remove('disable')
    }
})

tabelaProdutos.classList.remove('disable')
