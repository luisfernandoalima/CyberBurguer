<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/estatisticas/estatisticas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Estatísticas</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../pagina-inicial/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../mesas/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../estoque/index.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../estatisticas/index.php">
                    <button class="active">
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
                                <a href="../meu-perfil/index.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
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
                <div><i class="material-symbols-outlined">paid</i><span>Estatísticas</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="filtros">
                        <div class="filtroData">
                            <form action="">
                                <label for="selectData">Filtrar por:</label>
                                <span class="selectDataArea">
                                    <select name="selectData" id="selectData">
                                        <option value="">Dia</option>
                                        <option value="">Mês</option>
                                        <option value="">Ano</option>
                                    </select>
                                    <span><i class="fa-solid fa-caret-up seta-dia" style="color: #000; transform: rotate(180deg);"></i></span>
                                    
                                </span>
                            </form>
                        </div>
                        <div class="filtroVenda">
                            <form action="">
                                <select name="" id="selectVendas">
                                    <option value="">Ultimas vendas</option>
                                </select>
                                <span><i class="fa-solid fa-caret-up" style="color: #ffffff; transform: rotate(180deg);"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="numArea">
                        <div class="row">
                            <div class="col-6 infoAreaEst">
                                <h2>Total de vendas: <span>142</span></h2>
                                <ul>
                                    <li>Vendas no estabelecimento: </li>
                                    <li>Vendas por delivery: </li>
                                </ul>
                                <p>Lucro total: <span></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="graphcsOptions">
                        <div>
                            <p style="text-align: center; margin-top: 15px;">Modos de visualização</p>
                        </div>
                        <div class="row">
                            <div class="col-4 gaficoBtnArea">
                                <a href="">
                                    <button class="graficoBtn">
                                        <img src="../../assets/img/icons/grafico-de-pizza.png" alt="Gráfico de pizza" class="graficoImg">
                                    </button>
                                    <p class="graficoTexto">Gráfico de pizza</p>
                                </a>
                            </div>
                            <div class="col-4 gaficoBtnArea">
                                <a href="">
                                    <button class="graficoBtn">
                                        <img src="../../assets/img/icons/grafico-de-linha.png" alt="Gráfico de linhas" class="graficoImg">
                                    </button>
                                    <p class="graficoTexto">Gráfico de linhas</p>
                                </a>
                            </div>
                            <div class="col-4 gaficoBtnArea">
                                <a href="">
                                    <button class="graficoBtn">
                                        <img src="../../assets/img/icons/grafico-de-coluna.png" alt="Gráfico de Coluna" class="graficoImg">
                                    </button>
                                    <p class="graficoTexto">Gráfico de Coluna</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/paginaInicial/sidebar.js"></script>
    <script src="../../assets/js/estatisticas/est.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>