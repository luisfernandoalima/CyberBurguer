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
//$carrinho = $_SESSION['carrinho'];
//$_SESSION['carrinho'] = $carrinho;
//$carrinho = [];
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

$burguer = $sql->query("SELECT * FROM burguer");
$bebida = $sql->query("SELECT * FROM bebida");
$sobremesa = $sql->query("SELECT * FROM sobremesa");
$acompanhamento = $sql->query("SELECT * FROM acompanhamento");
$molho = $sql->query("SELECT * FROM molho"); //Está no lugar do combo para fins de teste 
/*if (isset($_SESSION['carrinho'])) {
    $totalcantidad = 0;

    foreach ($carrinho as $item) {
        if ($item != NULL) {
            $totalcantidad += $item['cantidad'];
        }
    }
}

if(isset($_SESSION['carrinho'])){
    for($i=0;$i<=count($carrinho)-1;$i ++){
    if($carrinho[$i]!=NULL){ 
    $QtdT = $carrinho['carrinho'];
    $QtdT ++ ;
    $QtdT += $QtdT;
    }}}

*/
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
                                            <img src="../../assets/img/icons/MenuCyberOfertas.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="combos">
                                                <label for="combos" class="labelText">
                                                    Combos
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
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
                            <!--Combos-->
                            <div class="combos">
                                <h1>Combos</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <?php foreach($molho AS $molhos): ?>
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                <a href="#" class="fecharPopUpinfose" onclick="exibirInfoProduto('<?php echo $molhos['nome']; ?>', <?php echo $molhos['qtd']; ?>,  this.parentElement.parentElement)"><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="infoPedidoExibicao">
                                                    <!-- Aqui as informações do produto serão exibidas pelo JavaScript -->
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p><?php echo $molhos['nome']; //Está no lugar do combo para fins de teste  ?></p>
                                                        <p><?php echo $molhos['qtd']; //Está no lugar do combo para fins de teste  ?></p>
                                                        <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $molhos['nome']; ?>')"><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Hamburguer-->
                            <div class="hamburguer disable">
                                <h1>Hamburguer</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                    <?php foreach($burguer as $burguers): ?>
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../../<?php // echo $burguers['img']; //alteração do banco de dados ?>" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p><?php echo $burguers['nome']; ?></p>
                                                        <p><?php echo 'R$' .  $burguers['preco']; ?></p>
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
                                    <?php foreach($acompanhamento as $acompanhamentos): ?>
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p><?php echo $acompanhamentos['nome']; ?></p>
                                                        <p><?php echo 'R$' .  $acompanhamentos['preco']; ?></p>
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
                                    <?php foreach($sobremesa as $sobremesas): ?>
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p><?php echo $sobremesas['nome']; ?></p>
                                                        <p><?php echo 'R$' .  $sobremesas['preco']; ?></p>
                                                        <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $sobremesas['nome']; ?>')" ><button>Adicionar</button></a>
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
                                    <?php foreach($bebida as $bebidas): ?>
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p><?php echo $bebidas['nome']; ?></p>
                                                        <p><?php echo 'R$' . $bebidas['preco']; ?></p>
                                                        <a href="#" onclick="adicionarProdutoAoCarrinho('<?php echo $bebidas['nome']; ?>')"  ><button>Adicionar</button></a>
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
                <div>
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
                                    <span class="col-2"></span>
                                    <span class="col-4"><a href=""><i class="fa-solid fa-x" style="color: #ffffff;"></i></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="popUpButtonsArea">
                        <button class="btnCancel">Cancelar pedido</button>
                        <button class="btnConfirm">Concluir pedido</button>
                    </div>
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
                        <p>Digite o nº da comanda e seu nº de identificação para <span id="textoConfirm"></span> do pedido</p>
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
<?php
/*$NumeroIdn = $_POST['Ni'];
if($NumeroComanda = $idFunc){
    $NumeroComanda = $_POST['Nc'];
}else{
    echo '<script>alert("ERRO! Número de identificação : ' . $NumeroComanda .' INCORRETO!, insira outro"); </script>';
}
*/
?>
<script>
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
        const produtoTexto = document.createElement('span');
        produtoTexto.innerText = `${produto.nome} x${produto.quantidade}`;
        const botaoExcluir = document.createElement('button');
        botaoExcluir.innerText = 'X';
        botaoExcluir.classList.add('botao-excluir'); // Adicione uma classe CSS ao botão
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

/*function concluirPedido() {
    const produtosParaEnviar = carrinho.map(produto => ({
        nome: produto.nome,
        tipo: produto.tipo,
        id: produto.id,
        quantidade: produto.quantidade
    }));
    document.getElementById('produtosInput').value = JSON.stringify(produtosParaEnviar);
    document.getElementById('pedidoForm').submit();
}
*/
//Fim


//Executar script php forma dinamica 
document.addEventListener("DOMContentLoaded", function () {
    const formularioConfirm = document.querySelector('.formsConfirm');
    formularioConfirm.addEventListener('submit', function (event) {
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

    const formData = new FormData();
    formData.append('produtos', JSON.stringify(produtosParaEnviar));

    if (typeof produtosParaEnviar === 'object') {
    console.log("Dados do carrinho em JSON: " + JSON.stringify(produtosParaEnviar));
    } else {
        console.error("Os dados do carrinho não estão no formato JSON válido.");
    }
    const headers = new Headers({
        'Content-Type': 'application/json'
    });


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



//Executar script php forma dinamica 
/*document.addEventListener("DOMContentLoaded", function () {
    const formularioConfirm = document.querySelector('.formsConfirm');
    formularioConfirm.addEventListener('submit', function (event) {
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

            // Limpa o formulário
            formularioConfirm.reset();
        })
        .catch(error => {
            // Lidar com erros, se necessário
            console.error("Erro na solicitação Fetch:", error);
        });
    });
});
*/

/*document.getElementById('executarScriptPHP').addEventListener('click', function() {
  var xhr = new XMLHttpRequest(); // Crie um objeto XMLHttpRequest

  // Configure a solicitação
  xhr.open('POST', '../../PHP/confinfoComanda.php', true);

  // Defina a função que será chamada quando a resposta for recebida
  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
      // Manipule a resposta do servidor (saída do PHP) aqui
      document.getElementById('resultado').innerHTML = xhr.responseText;
    } else {
      // Lidar com erros, se houver
      console.error('Erro:', xhr.statusText);
    }
  };

  // Envie a solicitação (pode incluir dados do formulário, se necessário)
  xhr.send();

  // Evite o comportamento padrão do botão (recarregar a página)
  event.preventDefault();
});
*/

//Fim


//Daqui pra baixo contem bugs, concertar 
/*function exibirInfoProduto(nome, qtd, infoPedidoElement) {
    var infoPedidoExibicao = infoPedidoElement.querySelector(".infoPedidoExibicao");

    if (infoPedidoExibicao) {
        infoPedidoExibicao.innerHTML = `
            <p>Nome: ${nome}</p>
            <p>Quantidade: ${qtd}</p>
        `;
    }

    fecharPopUpInfoProduto();
}


const fecharPopUpButton = document.querySelector('.fecharPopUpinfose');

if (fecharPopUpButton) {
    fecharPopUpButton.addEventListener('click', function () {
        fecharPopUpInfoProduto();
    });
}

function fecharPopUpInfoProduto() {
    var popUpInfoProduto = document.getElementById("popUpInfoProduto");
    if (popUpInfoProduto) {
        popUpInfoProduto.style.display = "none"; // Oculta o pop-up definindo o estilo 'display' como 'none'
    }
}
*/


</script>

</html>