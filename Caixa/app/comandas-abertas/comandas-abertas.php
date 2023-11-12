<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
$carrinho = $_SESSION['carrinho'];
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

$comandas = $sql->query("SELECT * FROM pedidos");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/pedidos-abertos/pedidos-abertos.css">
    <title>Comandas Abertas</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span>
                    <a href="../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span class="active">
                    <a href="../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../area-do-cliente/area-do-cliente.php">
                        <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
            </nav>
            <aside class="sidebar-header">
                <img class="logo-img" src="https://sujeitoprogramador.com/steve.png" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc; ?></span>
                </span>
                <div class="hamburger-menu">
                    <input type="checkbox" id="checkbox-menu">

                    <label for="checkbox-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>
            </aside>
            <aside class="menuConfig">
                <a href="../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../index.html">Sair</a>
            </aside>
        </header>
        <main>
            <div class="pedidosAbertosArea">
                <div class="container">
                
                    <h1>Comandas Abertas</h1>
                    <hr class="linha">
                    <div class="pedidosAbertosItems">
                    <?php foreach ($comandas AS $comanda): ?>
                        <div class="pedidosAbertosItemsArea">
                            <input type="radio" name="Comanda" id="1" class="radioButton">
                            <label for="1" class="optionComanda">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="numComanda"><?php echo $comanda['comanda'];?></p>
                                        </div>
                                        <div class="col-3">
                                            <p class="btnVerPedido">Ver pedido</p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo $comanda['horaPedido'];?></p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo $comanda['horaPedido'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="optionButtonArea">
                        <button class="">Excluir</button>
                        <button class="btnConcluirPedido">Concluir</button>
                        
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUpPediodo popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Comanda <span></span></h2>
                        <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container">

                    </div>
                </div>
            </aside>
        </div>
        <div class="opaco opacoConfirmEx popDown">
            <aside class="popUp popUpConfirmEx popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Comanda <span class="numComandaArea">111</span></h2>
                        <button class="fecharPopUpConfirm"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container">
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/pedidos-abertos/pedidos-abertos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>


<script>
    // Declaração da função tiraSeleção
    const tiraSeleção = () => {
        Comandas.forEach((comanda) => {
            comanda.classList.remove('optionComandaSelect');
        });
    }

    // Selecione todos os botões "Ver pedido"
    const btnVerPedido = document.querySelectorAll('.btnVerPedido');
    const numComandaArea = document.querySelector('.popUpHeader h2 span');

    // Adicione um evento de clique a cada botão "Ver pedido"
    btnVerPedido.forEach((btn) => {
        btn.addEventListener('click', (event) => {
            // Encontre o elemento <label> pai do botão clicado
            const label = event.target.closest('label');

            // Encontre o número da comanda dentro do elemento <label>
            const numComanda = label.querySelector('.numComanda').textContent;

            // Atualize o elemento <span> dentro do título da comanda com o número da comanda correspondente
            numComandaArea.textContent = numComanda;

            // Abra o pop-up do pedido (se houver)
            // Certifique-se de que você tenha um elemento pop-up no seu HTML para exibir os itens do pedido.
            // Suponho que esse elemento seja chamado 'popUpPedido'.
            const popUpPedido = document.querySelector('.popUpPedido');
            if (popUpPedido) {
                popUpPedido.classList.remove('popDown');
            }

            // Remove a seleção de todas as comandas
            tiraSeleção();

            // Adiciona a classe de seleção apenas à comanda clicada
            label.classList.add('optionComandaSelect');

            // Obtém o número da comanda
            const numComanda = label.querySelector('.numComanda').textContent;

            // Faz uma solicitação AJAX para obter os itens do pedido
            getItensDoPedido(numComanda);
        });
    });

    const Comandas = document.querySelectorAll('.optionComanda');

    // Suponho que você tenha um pop-up para exibir os itens do pedido
    // Certifique-se de que você tenha um elemento HTML para o pop-up com a classe 'popUpPedido'.

    function getItensDoPedido(numComanda) {
        // Faz uma solicitação AJAX para o arquivo PHP
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `get_items.php?comanda=${numComanda}`, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                // Exibe os dados dos itens do pedido no pop-up
                mostrarItensDoPedido(response);
            }
        };
        xhr.send();
    }

    function mostrarItensDoPedido(itensDoPedido) {
        // Aqui você pode construir a lógica para exibir os itens do pedido no seu pop-up.
        // Por exemplo, você pode criar uma lista ou tabela HTML e preenchê-la com os dados dos itens do pedido.
        // Certifique-se de ter o HTML adequado no seu pop-up para exibir esses itens.
    }
</script>




</html>