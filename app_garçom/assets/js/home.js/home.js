const btnHome = document.querySelectorAll('.btnHome');

const link = ['novo-pedido/novo-pedido.html', 'pedidos-feitos/pedidos-feitos.html', 'perfil/perfil.html']

btnHome.forEach((btnHome, index) => {
    btnHome.addEventListener('click', () =>{
        window.location.href =  link[index]
    })
});