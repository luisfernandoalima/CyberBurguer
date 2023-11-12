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
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

if(!empty($_GET['search'])){
    $dados = $_GET['search'];
    $sqlc = "SELECT * FROM produto WHERE (lote LIKE '%$dados%' OR prod LIKE '%$dados%') AND status = 'ATIVO'";
    $sqlb = "SELECT * FROM produto WHERE (lote LIKE '%$dados%' OR prod LIKE '%$dados%') AND status = 'ATIVO'";
}else{
    $sqlc = "SELECT * FROM produto WHERE status = 'ATIVO'";
    $sqlb = "SELECT * FROM produto WHERE status = 'ATIVO'";
}
$estoqueInfo = $sql->query($sqlc);
$estoqueInfoTb = $sql->query($sqlb);
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
    <link rel="stylesheet" href="../../assets/css/estoque/estoque.css">
  <title>Estoque</title>
</head>
<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../pagina-inicial/home.php">
                    <button >
                        <span>
                                <i class="material-symbols-outlined">home</i>
                                <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>
                
                <a href="../estoque/estoque.php">
                    <button class="active">
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
                <div><i class="material-symbols-outlined">inventory</i><span>ESTOQUE</span></div>
            </div>
            <hr class="mainLinha">
            <div class="mainArea">
                <div class="filtro">
                    <button id="blocos">
                        <i class="material-symbols-outlined">
                        grid_view
                        </i>Blocos
                    </button>
                    <button id="tabela" class="activeBtn">
                        <i class="material-symbols-outlined">
                        table_chart
                        </i>Tabela
                    </button>
                </div>
                <!--Barra de Pesquisa-->
                <div class="searchArea">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="search" id="search" placeholder="Pesquisar..." class="searchBar" />
                            </div>
                            <div class="col-2">
                                <button type="submit" class="searchButton">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="estoque">
                    <div class="container blocos" id="estoqueBlocos">
                        <div class="row">
                        <?php foreach($estoqueInfo AS $estoqueInfos): ?>
                            <div class="col-4 Bloco">
                                <div class="estoqueItem">
                                    <div class="row">
                                        <div class="col-6 imgItem">
                                            <img src="../../../<?php echo $estoqueInfos['img']; //alteração do banco de dados ?>" alt="Imagem do produto">
                                        </div>
                                        <div class="col-6 infoBloco">
                                            <p class="itemHeader"><?php echo $estoqueInfos['prod']; ?></p>
                                            <hr class="estoqueLinha">
                                            <p>Lote: <?php echo $estoqueInfos['lote']; ?> </p>
                                            <p>Unidades: <?php echo $estoqueInfos['qtd']; ?></p>
                                            <p>Validade: <?php echo $estoqueInfos['dta_vencimento']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>                             
                        </div>                             
                    </div>        
                    <div class="tabela active">
                        <table id="tabelaReal" style="border-radius: 10px;">
                            <thead>
                                <th>Nome:</th>
                                <th>Lote:</th>
                                <th>Unidades:</th>
                                <th>Validade:</th>
                            </thead>
                            <tbody>
                            <?php foreach($estoqueInfoTb AS $estoqueInfosTb): ?>
                                <tr>
                                    <td><?php echo $estoqueInfosTb['prod']; ?></td>
                                    <Td><?php echo $estoqueInfosTb['lote']; ?></Td>
                                    <td><?php echo $estoqueInfosTb['qtd']; ?></td>
                                    <td><?php echo $estoqueInfosTb['dta_vencimento']; ?></td>
                                </tr>
                                <?php endforeach; ?>  
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div>
                    <a href="editar-estoque/editEstoque.php" class="btnEditar"><Button>Editar</Button></a>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/paginaInicial/searchBar.js"></script>
    <script src="../../assets/js/estoque/estoque.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script>
$(document).ready(function() {
    $('#search').on('input', function() {
        pesquisardados();
    });
});

function pesquisardados() {
    var searchValue = $('#search').val();

    $.ajax({
        type: "GET",
        url: 'estoque.php?search=' + encodeURIComponent(searchValue),
        success: function(response) {
            var tableBody = $('#tabelaReal tbody');
            tableBody.empty(); // Limpa o conteúdo atual da tabela

            // Adiciona as linhas da pesquisa à tabela
            $(response).find('#tabelaReal tbody tr').each(function() {
                tableBody.append($(this)); // Adiciona a linha à tabela
            });

            // Atualiza também a exibição em blocos
            $('.blocos .row').html($(response).find('.blocos .row').html());
        }
    });
}


</script>
</html>