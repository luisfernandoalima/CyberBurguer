<?php
session_start();
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../index.html'); //joga para a pagina de login
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
    $sqlc = "SELECT * FROM mesas WHERE mesa LIKE '%$dados%'"; //Pesquisa somente pelo id da mesa 
}else{
    $sqlc = "SELECT * FROM mesas";
}
//$mesa = $sql->query("SELECT * FROM mesas");
$mesa = $sql->query($sqlc);

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
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Controle de mesas</title>
</head>
<style>
    .mesasArea {
        overflow: auto;
        height: 400px;
    }

    .fundoMesa {
        margin-top: 20px;
        background-color: #fff;
        width: 150px;
        height: 150px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fondoMesaAzul {
        background-color: var(--azulEscuro);
        width: 130px;
        height: 130px;
        border-radius: 20px;
    }

    .fondoMesaAzul>h1 {
        text-align: center;
        font-size: 4em;
        font-weight: bold;
        position: relative;
        top: -93px;
        left: 0px;
    }

    .linhaHorizontal,
    .linhaVertical {
        background-color: var(--azulEscuro);
        width: 150px;
        height: 60px;
        position: relative;
    }

    .linhaHorizontal {
        top: 37px;
        left: -10px;
    }

    .linhaVertical {
        transform: rotate(90deg);
        top: -25px;
        left: -10px;
    }

    .mesa {
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .excluirMesa{
        position: relative;
        color: #fff;
        top: -200px;
        right: -105px;
        transition: .4s;
    }

    .excluirMesa:hover{
        color: #FF0000;
    }

    .Capacidade {
        font-size: 1.2em;
        text-align: center;
        margin-top: 5px;
    }

    /*Barra de rolagem*/
    .mesasArea::-webkit-scrollbar {
        width: 10px;
        /* Largura da barra de rolagem */
    }

    .mesasArea::-webkit-scrollbar-track {
        background-color: var(--azulEscuro);
        /* Cor de fundo da área da barra de rolagem */
        border: 2px solid var(--rosa);
        border-radius: 20px;
    }

    .mesasArea::-webkit-scrollbar-thumb {
        background-color: #b4b4b4;
        /* Cor do polegar da barra de rolagem */
        border-radius: 20px;
        width: 6px;
    }

    .mesasArea::-webkit-scrollbar-thumb:hover {
        background-color: #808080;
        /* Cor do polegar da barra de rolagem ao passar o mouse */
    }
</style>


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
                <div><i class="material-symbols-outlined">badge</i><span>Controle de mesas</span></div>
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
                                <button type="submit" class="searchButton">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container row mesasArea" id="mesasContainer">
                <?php foreach($mesa as $mesas): ?>
                    <div class="col-3 mesaArea">
                        <div class="mesa">
                            <div class="fundoMesa">
                                <div class="fondoMesaAzul">
                                    <div class="linhaHorizontal"></div>
                                    <div class="linhaVertical"></div>
                                    <h1 id="nMesaGrande"><?php echo $mesas['mesa']; ?></h1>
                                    <a href="../../../PHP/delete_mesa.php?mesa=<?php echo $mesas['mesa'];?>" class="excluirMesa"><i class="fa-solid fa-x" ></i></a>
                                </div>
                            </div>
                        </div>
                        <h2 class="Capacidade">Capacidade da mesa: <span id="nPessoas"><?php echo $mesas['qtdCadeiras']; ?></span></h2>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../assets/js/paginaInicial/searchBar.js"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>

</body>

<script>
/*$(document).ready(function() {
    $('#search').on('input', function() {
        pesquisardados();
    });
});

function pesquisardados() {
    var searchValue = $('#search').val();
    
    $.ajax({
        type: "GET",
        url: 'controle_mesas.php?search=' + encodeURIComponent(searchValue),
        success: function(response) {
            var mesasContainer = $('#mesasContainer');
            mesasContainer.empty(); // Limpa o conteúdo atual do contêiner

            // Adiciona o conteúdo da resposta ao contêiner de mesas
            mesasContainer.append($(response).find('#mesasContainer').html());
        }
    });
}
*/
//Codigo em FETCH API 
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("search");

  searchInput.addEventListener("input", function () {
    pesquisarDados();
  });
});

function pesquisarDados() {
  const searchValue = document.getElementById("search").value;
  const mesasContainer = document.getElementById("mesasContainer");
  mesasContainer.innerHTML = ""; // Limpa o conteúdo atual do contêiner

  // Verifique se o campo de pesquisa está vazio
  if (searchValue.trim() === "") {
    fetch("controle_mesas.php") // Solicita todos os resultados
      .then((response) => response.text())
      .then((data) => {
        // Analise a resposta HTML para extrair o conteúdo relevante
        const responseElement = document.createElement("div");
        responseElement.innerHTML = data;
        const mesasContent = responseElement.querySelector("#mesasContainer").innerHTML;

        // Adicione o conteúdo da resposta ao contêiner de mesas
        mesasContainer.innerHTML = mesasContent;
      })
      .catch((error) => {
        console.error("Erro na busca:", error);
      });
  } else {
    // Se houver um valor de pesquisa, execute a pesquisa normalmente
    fetch(`controle_mesas.php?search=${encodeURIComponent(searchValue)}`)
      .then((response) => response.text())
      .then((data) => {
        // Analise a resposta HTML para extrair o conteúdo relevante
        const responseElement = document.createElement("div");
        responseElement.innerHTML = data;
        const mesasContent = responseElement.querySelector("#mesasContainer").innerHTML;

        // Adicione o conteúdo da resposta ao contêiner de mesas
        mesasContainer.innerHTML = mesasContent;
      })
      .catch((error) => {
        console.error("Erro na busca:", error);
      });
  }
}

</script>

</html>