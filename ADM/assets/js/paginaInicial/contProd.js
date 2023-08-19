const tabelaProdutos = document.querySelector('#tabelaProdutos');
const tabelaHamburguer = document.querySelector('#tabelaHamburguer');
const tabelaBebidas = document.querySelector('#tabelaBebidas');
const tabelaAcompanhamento = document.querySelector('#tabelaAcompanhamento');
const tabelaFornecedor = document.querySelector('#tabelaFornecedor');

var Tabelas = [tabelaProdutos, tabelaHamburguer, tabelaBebidas, tabelaAcompanhamento, tabelaFornecedor];

const radioFiltro = document.querySelectorAll('.radioButton');

const escondeTabela = () => {
    Tabelas.forEach(tabela => {
        tabela.classList.add('disable');
    });
};

escondeTabela();

radioFiltro.forEach(radio => {
    radio.addEventListener('change', (e) => {
        escondeTabela();
        const index = Array.from(radioFiltro).indexOf(radio);
        Tabelas[index].classList.remove('disable');
    });
});

Tabelas[0].classList.remove('disable');