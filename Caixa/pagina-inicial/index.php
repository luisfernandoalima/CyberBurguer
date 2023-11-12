<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION)) == true){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: ../index.html');
}
$log = $_SESSION['email'];
$nomeFunc = $_SESSION['nome'];
$idFunc = $_SESSION['id_func'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
  />
  <title>Página inicial</title>
</head>
<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <button class="active">
                    <span>
                        <i class="material-symbols-outlined">home</i>
                        <span>Home</span>
                    </span>
                </button>

                <button>
                    <span>
                        <i class="material-symbols-outlined">table_restaurant</i>
                        <span>Mesas</span>
                    </span>
                </button>
                
                <button>
                    <span>
                        <i class="material-symbols-outlined">inventory</i>
                        <span>Estoque</span>
                    </span>
                </button>
            </nav>
            
            <header class="sidebar-header">
                <!--Foto Usuário-->
                <img class="logo-img" src="https://sujeitoprogramador.com/steve.png" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $nomeFunc; ?></span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id"><?php echo $idFunc; ?></span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                               <a href=""><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../PHP/sair_sessao_Caixa.php">Sair da conta</a></p>
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
                <i class="material-symbols-outlined">home</i><span>HOME</span>
            </div>
            <hr>
            <div class="mainArea">
                <div>
                    <a href="">Novo pedido +</a>
                </div>
                <div>
                    <a href="">Fechar pedido -</a>
                </div>
                <div>
                    <a href="">Cadastro de clientes</a>
                </div>
            </div>
        </main>
    </div>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>