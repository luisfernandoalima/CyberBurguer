//Abrir as páginas
const opcoes = document.querySelectorAll('.option')
const links = ['novo-pedido/novo-pedido.php', 'novo-pedido.php', 'novo-pedido.php']

for (let i = 0; i < opcoes.length; i++) {
    opcoes[i].addEventListener('click', () => {
        window.location.href = '../' + links[i]
    })
}
