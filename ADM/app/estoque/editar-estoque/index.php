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
                <a href="../../pagina-inicial/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>
                <a href="../../mesas/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>
                <a href="../index.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>
                <a href="../../estatisticas/index.php">
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
                    <i class="material-symbols-outlined">inventory</i><span>ESTOQUE</span>
                </div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <!--Barra de Pesquisa-->
                <div class="searchArea">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="search" placeholder="Pesquisar..." class="searchBar" />
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
            <div class="container itemCardArea">
                <div class="itemCard">
                    <div class="row">
                        <div class="col-1">
                            <picture>
                                <img src="../../../assets/img/produtos/mesa-redonda 3.png" alt="">
                            </picture>
                        </div>
                        <form action="" class="col-10 formEstoque">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="nomeProd" placeholder="Nome" class="nomeProd">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="loteProd" placeholder="Lote" class="loteProd">
                                </div>
                                <div class="col-2">
                                    <input type="text" name="qtdProd" placeholder="Quantidade" class="qtdProd">
                                </div>
                                <div class="col-3">
                                    <abbr title="Validade"><input type="date" name="valProd" class="valProd"></abbr>
                                </div>
                                <div class="col-1">
                                    <button href="" class="checkBtn"><i class="fa-solid fa-check" style="color: #ffffff;"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="col-1">
                            <a href=""><i class="fa-solid fa-x" style="color: #ffffff;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/estoque/editarEstoque.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>