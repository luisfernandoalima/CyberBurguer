<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../../assets/css/paginaInicial/edit-func.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Página do funcionários</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../../index.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../../../mesas/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../../../estoque/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../../../estatisticas/index.php">
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
                <img class="logo-img" src="https://sujeitoprogramador.com/steve.png" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome">Nome</span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id">#565555</span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                                <a href="../../meu-perfil/index.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="">Sair da conta</a></p>
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
                    <i class="material-symbols-outlined">badge</i><span>Página do funcionários</span>
                </div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row">
                        <div class="col-5">
                            <div class="card" style="width: 18rem;">
                                <img src="https://sujeitoprogramador.com/steve.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h1 class="card-title">Bill Gates</h1>
                                    <div>
                                        <span>Email:</span>
                                        <input type="text" class="res card-text importantInfo" value="billgatezinhosonylixo@sansung.com">
                                        <span>Cargo:</span>
                                        <input type="text" class="res card-text importantInfo" value="Criador do Uno com Escada">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-7 informacoes">
                            <form action="">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="perg">Sexo:</p>
                                        <input type="text" class="res" value="Masculino">
                                        <p class="perg">Data de nascimento:</p>
                                        <input type="text" class="res" value="2005-09-27">
                                        <p class="perg">Data de admissãp</p>
                                        <input type="text" class="res" value="2023-04-23">
                                        <p class="perg">Religião</p>
                                        <input type="text" class="res" value="Católico">
                                        <p class="perg">Tipo sanguíneo:</p>
                                        <input type="text" class="res" value="A+">
                                        <p class="perg">Habilitado:</p>
                                        <input type="text" class="res" value="Sim">
                                        <p class="perg">Telefone:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Tel. emergência:</p>
                                        <input type="text" class="res" value="11999999999">
                                    </div>
                                    <div class="col-6">
                                        <p class="perg">Ctps:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Pis:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Título de eleitor:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Reservista:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Vale refeição:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Vale Transporte:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <p class="perg">Conta bancária:</p>
                                        <input type="text" class="res" value="11999999999">
                                        <input type="submit" value="Salvar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../../../assets/js/paginaInicial/edit-func.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../../../assets/js/paginaInicial/sidebar.js"></script>

</body>

</html>