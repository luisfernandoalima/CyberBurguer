<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/paginaInicial/cont-func.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Controle de produtos</title>
</head>

<style>
    .searchArea {
        margin-top: 5px;
    }

    #tabelaProdutos {
        width: 90%;
        margin: auto;
    }

    .tabela {
        height: 300px;
    }

    .labelFiltro {
        display: block;
        padding-left: 5%;
        margin-left: 10%;
        width: 80%;
        border-radius: 15px;
        cursor: pointer;
        transition: .3s;
    }

    .radioButton{
        display: none;
    }

    .labelFiltro:hover{
        background-color: #dbdbdb;
    }
</style>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../index.php">
                    <button class="active">
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

                <a href="../../estoque/index.php">
                    <button>
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
                                <a href="../../meu-perfil/index.php"><i
                                        class="material-symbols-outlined">settings</i><span>Configurações</span></a>
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
                <div><i class="material-symbols-outlined">badge</i><span>Controle de funcionários</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Filtro
                        </button>
                        <ul class="dropdown-menu">
                            <form action="">
                                <li>
                                    <label for="radioProdutos" class="labelFiltro">Produtos</label><input type="radio" name="filtroRadio" id="radioProdutos" class="radioButton">
                                </li>
                                <li>
                                    <label for="radioHamburguer" class="labelFiltro">Hamburguer</label><input type="radio" name="filtroRadio" id="radioHamburguer" class="radioButton">
                                </li>
                                <li>
                                    <label for="radioBebida" class="labelFiltro">Bebida</label><input type="radio" name="filtroRadio" id="radioBebida" class="radioButton">
                                </li>
                                <li>
                                    <label for="radioAcomp" class="labelFiltro">Acompanhamento</label><input type="radio" name="filtroRadio" id="radioAcomp" class="radioButton">
                                </li>
                                <li>
                                    <label for="radioForn" class="labelFiltro">Fornecedor</label><input type="radio" name="filtroRadio" id="radioForn" class="radioButton">
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
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
                <div id="tabelaProdutos" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Lote</th>
                            <th>Tipo</th>
                            <th>Produto</th>
                            <th>Preço da compra</th>
                            <th>Preço da venda</th>
                            <th>Quantidade</th>
                            <th>Data da compra</th>
                            <th>Data de vencimento</th>
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="id">1</td>
                                <td>11111</td>
                                <td>Castanha</td>
                                <td>Castana</td>
                                <td>213</td>
                                <td>123</td>
                                <td>132</td>
                                <td>132</td>
                                <td>1313</td>
                                <td class="moreOptions"><a href=""><i class="fa-solid fa-x"
                                            style="color: #ffffff;"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tabelaHamburguer" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="id">1</td>
                                <td>X-ratão</td>
                                <td>R$45,56</td>
                                <td>666</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tabelaBebidas" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="id">1</td>
                                <td>X-ratão</td>
                                <td>R$45,56</td>
                                <td>666</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tabelaAcompanhamento" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Molho</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="id">1</td>
                                <td>X-ratão</td>
                                <td>R$45,56</td>
                                <td>666</td>
                                <td>Maionese</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tabelaFornecedor" class="tabela">
                    <table>
                        <thead>
                            <th>CNPJ</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>X-ratão</td>
                                <td>R$45,56</td>
                                <td>666</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="../../../assets/js/paginaInicial/contProd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../../assets/js/paginaInicial/searchBar.js"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>
</body>

</html>