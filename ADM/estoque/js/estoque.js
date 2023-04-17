var options = document.querySelector('#options');
var opções= document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e)=>{
        optionsMenu.classList.toggle('disable')
        opções.classList.toggle('opcoesAble')
})

/*Modo de exibição*/
var btnBlocks = document.querySelector('#blocos');
var btnTabela = document.querySelector('#tabela');
var blockArea = document.querySelector('.blocos');
var tableArea = document.querySelector('.tabela');

const Tabela = () =>{
        if(blockArea.classList.contains('active')){
                tableArea.classList.add('active')
                blockArea.classList.remove('active')
                btnTabela.classList.add('activeBtn')
                btnBlocks.classList.remove('activeBtn')
        }
}

const Blocos = () =>{
        if(tableArea.classList.contains('active')){
                tableArea.classList.remove('active')
                blockArea.classList.add('active')
                btnBlocks.classList.add('activeBtn')
                btnTabela.classList.remove('activeBtn')
        }
}

btnBlocks.addEventListener('click', Blocos)
btnTabela.addEventListener('click', Tabela)