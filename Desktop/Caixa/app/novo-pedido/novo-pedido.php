<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true) { //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

$burguer = $sql->query("SELECT * FROM burguer WHERE status = 'ATIVO' AND nome NOT IN ('CANCELADO')");
$bebida = $sql->query("SELECT * FROM bebida WHERE status = 'ATIVO' AND nome NOT IN ('CANCELADO')");
$sobremesa = $sql->query("SELECT * FROM sobremesa  WHERE status = 'ATIVO' AND nome NOT IN ('CANCELADO')");
$acompanhamento = $sql->query("SELECT * FROM acompanhamento  WHERE status = 'ATIVO' AND nome NOT IN ('CANCELADO')");
$molho = $sql->query("SELECT * FROM molho"); //Está no lugar do combo para fins de teste 
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
    <link rel="stylesheet" href="../../assets/css/novo-pedido/novo-pedido.css">
    <title>Novo pedido</title>
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
                <span class="active">
                    <a href="novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
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
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
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
                <a href="../../PHP/sair_sessao_Caixa.php">Sair</a>
            </aside>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <section class="sidebar">
                            <div class="opcoesSidebar">
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/Burger 2.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Hamburguer">
                                                <label for="Hamburguer" class="labelText backgroundLabel">
                                                    Hamburguer
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/french-fries.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Porções">
                                                <label for="Porções" class="labelText">
                                                    Porções
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/sobremesa 1.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Sobremesas">
                                                <label for="Sobremesas" class="labelText">
                                                    Sobremesas
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/soda.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Bebidas">
                                                <label for="Bebidas" class="labelText">
                                                    Bebidas
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btnArea">

                                <button class="btnCarrinho">
                                    <p>Pedido</p> <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                </button>

                            </div>
                        </section>
                    </div>
                    <div class="col-9">
                        <section class="areaPedidos">
                            <!--Hamburguer-->
                            <div class="hamburguer">
                                <h1>Hamburguer</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <?php foreach ($burguer as $burguers) : ?>
                                            <div class="col-3">
                                                <div class="pedido">

                                                    <div class="imgPedido">
                                                        <img src="../../../<?php echo $burguers['img']; ?>" style="width: 145px; display: block; margin: auto;" alt="">
                                                    </div>
                                                    <div class="textAreaPedido">
                                                        <div class="textPedido">
                                                            <p><?php echo $burguers['nome']; ?></p>
                                                            <p><?php echo 'R$ ' .  $burguers['preco']; ?></p>
                                                            <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $burguers['nome']; ?>')"><button>Adicionar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Porções-->
                            <div class="porcoes disable">
                                <h1>Porções</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <?php foreach ($acompanhamento as $acompanhamentos) : ?>
                                            <div class="col-3">
                                                <div class="pedido">

                                                    <div class="imgPedido">
                                                        <img src="../../../<?php echo $acompanhamentos['img']; ?>" style="width: 145px; display: block; margin: auto;" alt="">
                                                    </div>
                                                    <div class="textAreaPedido">
                                                        <div class="textPedido">
                                                            <p><?php echo $acompanhamentos['nome']; ?></p>
                                                            <p><?php echo 'R$ ' .  $acompanhamentos['preco']; ?></p>
                                                            <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $acompanhamentos['nome']; ?>')"><button>Adicionar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Sobremesa-->
                            <div class="sobremesas disable">
                                <h1>Sobremesas</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <?php foreach ($sobremesa as $sobremesas) : ?>
                                            <div class="col-3">
                                                <div class="pedido">

                                                    <div class="imgPedido">
                                                        <img src="../../../<?php echo $sobremesas['img']; ?>" style="width: 145px; display: block; margin: auto;" alt="">
                                                    </div>
                                                    <div class="textAreaPedido">
                                                        <div class="textPedido">
                                                            <p><?php echo $sobremesas['nome']; ?></p>
                                                            <p><?php echo 'R$ ' .  $sobremesas['preco']; ?></p>
                                                            <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $sobremesas['nome']; ?>')"><button>Adicionar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Bebidas-->
                            <div class="bebidas disable">
                                <h1>Bebidas</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <?php foreach ($bebida as $bebidas) : ?>
                                            <div class="col-3">
                                                <div class="pedido">

                                                    <div class="imgPedido">
                                                        <img src="../../../<?php echo $bebidas['img']; ?>" style="width: 145px; display: block; margin: auto;" alt="">
                                                    </div>
                                                    <div class="textAreaPedido">
                                                        <div class="textPedido">
                                                            <p><?php echo $bebidas['nome']; ?></p>
                                                            <p><?php echo 'R$ ' . $bebidas['preco']; ?></p>
                                                            <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $bebidas['nome']; ?>')"><button>Adicionar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUp popDown">
                <div class="popUpHeader">
                    <h2>Pedido</h2>
                    <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                </div>
                <hr class="popupLinha">
                <div class="popUpInfo container">
                    <p>Itens no pedido:</p>
                    <div id="itensCarrinho" class="itensPedido barra">
                        <ul>
                            <li class="row">
                                <span class="col-6"></span>
                                <span class="col-4"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="popUpButtonsArea">
                    <button class="btnCancel">Cancelar pedido</button>
                    <button class="btnConfirm">Concluir pedido</button>
                </div>
            </aside>
        </div>
        <div class="opacoConfirm popDown">
            <aside class="popUpConfirm popDown">
                <div>
                    <div class="popUpHeaderConfirm">
                        <h2>Confirmar <span id="tipoConfirmacao"></span></h2>
                        <button class="fecharPopUpConfirm"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfoConfirm container">
                        <p>Digite o<span id="inputConfirm"></span> nº de identificação para <span id="textoConfirm"></span> do pedido</p>
                        <div>
                            <form method="post" action="../../PHP/confinfoComanda.php" class="formsConfirm">
                                <div class="inputComandaArea">
                                    <input type="text" name="Nc" id="" class="inputComanda" placeholder="Número da comanda..." required>
                                </div>
                                <div>
                                    <input type="text" name="Ni" id="" class="inputSenha" placeholder="Número de identificação..." required>
                                </div>
                                <div>
                                    <input type="submit" value="Confirmar" class="btnConfirmForms" id="executarScriptPHP">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>


    <form id="confirmarForm" method="post" action="../../PHP/coninfoComanda.php">
        <div class="inputComandaArea">
            <input type="text" name="" id="numeroComanda" class="inputComanda" placeholder="Número da comanda..." required>
        </div>
        <div>
            <input type="text" name="" id="numeroIdentificacao" class="inputSenha" placeholder="Número de identificação..." required>
        </div>
        <div>
            <input type="submit" value="Confirmar" class="btnConfirmForms">
        </div>
    </form>


    <form id="pedidoForm" action="../../PHP/addcomanda.php" method="post">
        <input type="hidden" name="produtos" id="produtosInput">
    </form>


    <script src="../../assets/js/novo-pedido/novo-pedido.js"></script>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
<script>
    //Codigo referete a #
    //Codigos referentes ao carrinho
    let carrinho = [];

    // Carregar o carrinho do armazenamento local, se existir
    if (localStorage.getItem('carrinho')) {
        carrinho = JSON.parse(localStorage.getItem('carrinho'));
        atualizarCarrinhoNaInterface();
    }

    function adicionarProdutoAoCarrinho(nomeProduto, tipoProduto, idProduto) {
        const produtoExistente = carrinho.find(item => item.nome === nomeProduto && item.tipo === tipoProduto);

        if (produtoExistente) {
            produtoExistente.quantidade++;
        } else {
            carrinho.push({
                nome: nomeProduto,
                tipo: tipoProduto,
                id: idProduto,
                quantidade: 1,
            });
        }

        // Salvar o carrinho no armazenamento local, para evitar o bug
        localStorage.setItem('carrinho', JSON.stringify(carrinho)); // Aqui eu uso uma das variaveis que uso para consulta a fim de deixar fixa na pagina

        atualizarCarrinhoNaInterface();
    }

    function atualizarCarrinhoNaInterface() {
        const itensCarrinho = document.getElementById('itensCarrinho');
        itensCarrinho.innerHTML = '';
        carrinho.forEach(produto => {
            const item = document.createElement('li');
            item.classList.add('row', 'produtoListado')
            const produtoTexto = document.createElement('span');
            produtoTexto.innerText = `${produto.nome} x${produto.quantidade}`;
            produtoTexto.classList.add('col-6')
            const botaoExcluir = document.createElement('button');
            botaoExcluir.innerText = 'X';
            botaoExcluir.classList.add('botao-excluir', 'col-6'); // Adicione uma classe CSS ao botão
            botaoExcluir.addEventListener('click', () => {
                removerProdutoDoCarrinho(produto.nome, produto.tipo);
            });
            item.appendChild(produtoTexto);
            item.appendChild(botaoExcluir);
            itensCarrinho.appendChild(item);
        });
    }

    function removerProdutoDoCarrinho(nomeProduto, tipoProduto) {
        carrinho = carrinho.filter(produto => !(produto.nome === nomeProduto && produto.tipo === tipoProduto));
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        atualizarCarrinhoNaInterface();
    }
    //Fim
    //Executar script php forma dinamica 
    document.addEventListener("DOMContentLoaded", function() {
        const formularioConfirm = document.querySelector('.formsConfirm');
        formularioConfirm.addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            // Coleta os dados do formulário
            const formData = new FormData(formularioConfirm);

            // Realiza uma solicitação POST usando a Fetch API
            fetch('../../PHP/confinfoComanda.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    // Faça algo com a resposta da solicitação, se necessário
                    console.log(result);
                    alert("Pedido Concluido com Sucesso");

                    // Limpa o formulário
                    formularioConfirm.reset();

                    // Após a primeira solicitação, chame a função para concluir o pedido
                    concluirPedido();
                })
                .catch(error => {
                    // Lidar com erros, se necessário
                    console.error("Erro na solicitação Fetch:", error);
                });
        });
    });

    function concluirPedido() {
        const produtosParaEnviar = carrinho.map(produto => ({
            nome: produto.nome,
            tipo: produto.tipo,
            id: produto.id,
            quantidade: produto.quantidade
        }));
        console.log(produtosParaEnviar);

        const formData = new FormData();
        formData.append('produtos', JSON.stringify(produtosParaEnviar));

        if (typeof produtosParaEnviar === 'object') {
            console.log("Dados do carrinho em JSON: " + JSON.stringify(produtosParaEnviar));
        } else {
            console.error("Os dados do carrinho não estão no formato JSON válido.");
        }
        const headers = new Headers();


        fetch('../../PHP/addcomanda.php', {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(produtosParaEnviar)
            })
            .then(response => response.text())
            .then(result => {
                console.log(result);
            })
            .catch(error => {
                console.error("Erro na solicitação Fetch:", error);
            });
    }
</script>

</html>