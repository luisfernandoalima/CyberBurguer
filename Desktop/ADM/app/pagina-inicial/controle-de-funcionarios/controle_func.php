<?php
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
//Codigo de sessão começo 
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../../../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
//FIM codigo relacionado a sessão

$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];

if(!empty($_GET['search'])){
    $dados = $_GET['search'];
    $sqlc = "SELECT * FROM funcionarios WHERE dta_demissao IS NULL AND (id_func LIKE '%$dados%' OR email_adm LIKE '%$dados%' OR nome LIKE '%$dados%')";
}else{
    $sqlc = "SELECT * FROM funcionarios WHERE dta_demissao IS NULL";
}
$funcInfo = $sql->query($sqlc);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/paginaInicial/cont-func.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Controle de funcionários</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../home.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../../estatisticas/estatisticas.php">
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
                                <a href="../../meu-perfil/login_info_pessoal.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../../PHP/sair_sessao_Adm.php">Sair da conta</a></p>
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
                <div><i class="material-symbols-outlined">badge</i><span>Controle de funcionários</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <!--Barra de Pesquisa-->
                <div class="searchArea">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="search" placeholder="Pesquisar..." class="searchBar" id="search" />
                            </div>
                            <div class="col-2">
                                <button type="button" class="searchButton" onclick="pesquisardados()">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Página do usuário-->
                <div class="tabela">
                    <table id="tabelaReal" style="border-radius: 10px;">
                        <thead>
                            <th class="id">Id:</th>
                            <th>Nome:</th>
                            <th class="email">Email:</th>
                            <th>Cargo:</th>
                            <th>Mais Informações:</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach($funcInfo as $funcInfos): ?>
                            <tr>
                                <td class="id"><?php echo $funcInfos['id_func']; ?></td>
                                <td><?php echo $funcInfos['nome']; ?></td>
                                <td class="email"><?php echo $funcInfos['email_adm']; ?></td>
                                <td><?php echo $funcInfos['id_tipo']; ?></td>
                                <td class="moreOptions"><a href="pagina-do-funcionario/pag_func.php?id_func=<?php echo $funcInfos['id_func']; ?>">Página do funcionário</a></td>
                            </tr>
                            <?php endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../../assets/js/paginaInicial/searchBar.js"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>
<script>
// Aguarda até que o documento HTML esteja totalmente carregado e pronto para interação
$(document).ready(function() {
    // Atribui um ouvinte de evento ao elemento com o ID 'search' quando houver entrada de texto nele
    $('#search').on('input', function() {
        // Chama a função pesquisardados() sempre que houver uma entrada de texto no campo de busca
        pesquisardados();
    });
});

// Definição da função pesquisardados()
function pesquisardados() {
    // Pega o valor do campo de busca com o ID 'search'
    var searchValue = $('#search').val();
    
    // Realiza uma requisição AJAX ao arquivo 'index.php' com o valor de pesquisa como parâmetro
    $.ajax({
        type: "GET", // Método de requisição HTTP GET
        url: 'controle_func.php?search=' + encodeURIComponent(searchValue), // URL para a solicitação AJAX
        success: function(response) {
            // Função de sucesso a ser executada quando a resposta AJAX é bem-sucedida
            
            // Preenche o corpo da tabela com o conteúdo retornado na resposta
            // $(response) cria um objeto jQuery a partir da resposta, find('tbody').html() pega o conteúdo HTML do corpo da tabela na resposta
            $('#tabelaReal tbody').html($(response).find('tbody').html()); // Atualiza apenas o conteúdo do corpo da tabela
        }
    });
}

</script>
</body>
</html>