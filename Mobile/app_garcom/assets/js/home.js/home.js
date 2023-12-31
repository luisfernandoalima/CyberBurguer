const btnHome = document.querySelectorAll('.btnHome');

const link = ['novo-pedido/novo-pedido.php', 'pedidos-feitos/pedidos-feitos.php', 'perfil/perfil.php']

btnHome.forEach((btnHome, index) => {
    btnHome.addEventListener('click', () =>{
        window.location.href =  link[index]
    })
});