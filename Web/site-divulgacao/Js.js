const menu = document.querySelector('#menu');
const NavMenu = document.querySelector('#nav-menu');

NavMenu.style.display = 'none';

menu.addEventListener('click', () => {
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');

    const fechar = () => {
        NavMenu.style.display = 'none';
    };

    if (NavMenu.classList.contains('ativo')) {
        setTimeout(fechar, 1000); // Corrigido aqui
    }
});

const verTela = () => {
    var windowWidth = window.innerWidth;

    if (windowWidth <= 768) {
        NavMenu.style.display = 'none';
    } else {
        NavMenu.style.display = 'flex';
    }
};

setInterval(verTela, 1000); // Corrigido aqui
