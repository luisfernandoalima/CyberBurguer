<?php
session_start();
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

if(!empty($_GET['search'])){
    $dados = $_GET['search'];
    $sqlc = "SELECT * FROM produto WHERE (lote LIKE '%$dados%' OR prod LIKE '%$dados%') AND status = 'ATIVO'";
}else{
    $sqlc = "SELECT * FROM produto WHERE status = 'ATIVO'";
}
$prod = $sql->query($sqlc);
//$prod = $sql->query("SELECT * FROM produto WHERE status = 'ATIVO'");
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
    <link rel="stylesheet" href="../../../assets/css/estoque/editEstoque.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Editar Estoque</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../../pagina-inicial/home.php">
                    <button>
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
                <a href="../estoque.php">
                    <button class="active">
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
                <div>
                    <i class="material-symbols-outlined">inventory</i><span>ESTOQUE</span>
                </div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <!--Barra de Pesquisa-->
                <div class="searchArea">
                    <form action="" method="get" id="searchForm">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="search" placeholder="Pesquisar..." id="searchInput" class="searchBar" />
                            </div>
                            <div class="col-2">
                                <button type="submit" class="searchButton">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="resultsContainer" class="container itemCardArea">
                <div class="itemCard">
                    <div class="row">
                    <?php foreach($prod as $prods): ?>
                        <div class="col-1">
                            <picture>
                                <img src="../../../assets/img/produtos/mesa-redonda 3.png" alt="">
                            </picture>
                        </div>
                        <form action="" class="col-11 formEstoque">
                        <input type="hidden" name="id_prod" placeholder="Nome" class="nomeProd" value="<?php echo $prods['id_prod']; ?>">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="nomeProd" placeholder="Nome" class="nomeProd" value="<?php echo $prods['prod']; ?>">
                                </div>
                                <div class="col-2">
                                    <input type="text" name="loteProd" placeholder="Lote" class="loteProd" value="<?php echo $prods['lote']; ?>">
                                </div>
                                <div class="col-2">
                                    <input type="text" name="qtdProd" placeholder="Quantidade" class="qtdProd" value="<?php echo $prods['qtd']; ?>">
                                </div>
                                <div class="col-2">
                                    <abbr title="Validade"><input type="date" name="valProd" class="valProd" value="<?php echo $prods['dta_vencimento']; ?>"></abbr>
                                </div>
                                <div class="col-1">
                                    <button formaction="../../../PHP/att_prodInfo.php?id_prod=<?php echo $prods['id_prod']; ?>" class="checkBtn"><i class="fa-solid fa-check" style="color: #ffffff;"></i></button>
                                </div>
                                <div class="col-1">
                                    <button class="cancelBtn"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                                </div>
                                <div class="col-1">
                                    <button formaction="../../../PHP/del_prodInfo.php?id_prod=<?php echo $prods['id_prod']; ?>" class="trashBtn"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                </div>
                            </div>
                        </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/estoque/editarEstoque.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<!-- ... Resto do código HTML -->

<!-- ... (seu HTML existente) ... -->

<script>
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const resultsContainer = document.getElementById('resultsContainer');

    searchForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const searchTerm = searchInput.value;
        fetchResults(searchTerm);
    });

    function fetchResults(searchTerm) {
        const url = `editEstoque.php?search=${searchTerm}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                displayResults(data);
            })
            .catch(error => {
                console.error('Erro ao buscar resultados:', error);
            });
    }

    function displayResults(results) {
        resultsContainer.innerHTML = ''; // Limpa os resultados anteriores

        results.forEach(result => {
            const itemCard = document.createElement('div');
            itemCard.className = 'itemCard';
            // Construa o conteúdo do itemCard com os resultados do servidor
            // Exemplo: itemCard.innerHTML = `<div class="row"><div class="col-1">...</div>...</div>`;

            resultsContainer.appendChild(itemCard);
        });
    }
</script>
</html>