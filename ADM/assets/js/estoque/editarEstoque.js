var options = document.querySelector('#options');
var opções= document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e)=>{
        optionsMenu.classList.toggle('disable')
        opções.classList.toggle('opcoesAble')
})

const searchArea = document.querySelector('.searchArea');
const searchInput = document.querySelector('.searchBar');

searchArea.addEventListener('click', () => {
    searchInput.focus()
})

//voltar
const btnVoltar = document.querySelector('#backButton')

function voltar() {
    window.history.back();
}

btnVoltar.addEventListener('click', voltar)

//Enviar forms
const btnCheck = document.querySelectorAll('.checkBtn')
const forms = document.querySelectorAll('.formEstoque')

for(var i = 0; i < forms; i++){
    btnCheck[i].addEventListener('click', () => {
        forms[i].submit()
    })
}


/*Máscara para o lote*/
var loteProd = document.querySelectorAll('.loteProd');

for (var l = 0; l < loteProd.length; l++) {
    IMask(loteProd[l], {
        mask: '00000'
    });
}

/*Máscara para a Quantidade*/
var qtdProd = document.querySelectorAll('.qtdProd');

for (var l = 0; l < qtdProd.length; l++) {
    IMask(qtdProd[l], {
        mask: '00000'
    });
}
