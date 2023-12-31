//voltar
const btnVoltar = document.querySelector('.backButton')

btnVoltar.addEventListener('click', (e) => {
    window.history.back();
})