<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../../index.html'); //joga para a pagina de login
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

$mesa = $sql->query("SELECT * FROM mesas");

/*$mesa = $sql->query("SELECT mesas.mesa, mesas.qtdCadeiras, mesas.estado, pedidos.id, pedidos.mesa
FROM mesas, pedidos
WHERE mesas.mesa = pedidos.mesa");
*/

// $nome = "Ocupada"; //Teste js + css para ver se estão correspondentes as variaveis php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--CSS do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/mesas/mesa.css">
    <title>Mesas</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../pagina-inicial/home.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../mesas/home_mesa.php">
                    <button  class="active">
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../estatisticas/estatisticas.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">paid</i>
                            <span>Estatísticas</span>
                        </span>
                    </button>
                </a>
            </nav>

            <header class="sidebar-header">
                <!--Foto Usuário-->
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc; ?></span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                                <a href="../meu-perfil/login_info_pessoal.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../PHP/sair_sessao_Adm.php">Sair da conta</a></p>
                        </div>
                        <span class="ball"></span>
                        <span class="ball"></span>
                        <span class="ball"></span>
                    </span>
                </span>
            </header>
        </aside>
        <!--Principal-->
        <main class="main">
            <div class="header">
                <div><i class="material-symbols-outlined">table_restaurant</i><span>Mesas</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row areaMesas">
                    <?php foreach($mesa as $mesas): ?>
                        <div class="col-2 mesas">
                            <div class="mesaArea">
                                <div class="mesa">
                                    <div class="fundoMesa">
                                        <div class="fondoMesaAzul">
                                            <div class="linhaHorizontal"></div>
                                            <div class="linhaVertical"></div>
                                            <h1 id="nMesaGrande"><?php echo $mesas['mesa']; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <p class="mesaNome">Mesa: <?php echo $mesas['mesa']; ?></p>
                                <p class="mesaEstado">Estado: <span class="ocupaçãoMesa"><?php echo $mesas['estado']; ?></span></p>
                                <p class="mesaPedido">Pedido: <?php echo $mesas['qtdCadeiras']; //Arrumar depois ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>                           
                    </div>
                </div>
                <div class="container">
                    <div class="row legendaArea">
                        <p><span class="legenda Livre"></span> Livre</p>
                        <p><span class="legenda Ocupada"></span> Ocupada</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/mesas/mesas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>