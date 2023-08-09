//voltar
const btnVoltar = document.querySelector('#backButton')

function voltar() {
    window.history.back();
}

btnVoltar.addEventListener('click', voltar)
