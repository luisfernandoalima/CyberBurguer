//Select da categoria
var categoria = document.querySelector('#cat_prod')
var i = 0


//Tabelas
const tabelaProdutos = document.querySelector('#tabelaProdutos')
const tabelaHamburguer = document.querySelector('#tabelaHamburguer')
const tabelaBebidas = document.querySelector('#tabelaBebidas')
const tabelaAcompanhamento = document.querySelector('#tabelaAcompanhamento')
const tabelaFornecedor = document.querySelector('#tabelaFornecedor')
const tabelaMolhos = document.querySelector('#tabelaMolhos')
const tabelaSobremesas = document.querySelector('#tabelaSobremesas')


var Tabelas = [tabelaProdutos,tabelaHamburguer,tabelaBebidas,tabelaAcompanhamento,tabelaFornecedor,tabelaMolhos,tabelaSobremesas];


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
    }else if(categoria.value === '6'){
        escondeTabela()
        tabelaMolhos.classList.remove('disable')
    }else if(categoria.value === '7'){
        escondeTabela()
        tabelaSobremesas.classList.remove('disable')
    }
})

tabelaProdutos.classList.remove('disable')
