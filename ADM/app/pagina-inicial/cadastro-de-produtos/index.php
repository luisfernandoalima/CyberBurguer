<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/paginaInicial/forms.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Cadastro de Produtos</title>
</head>

<style>
    #prodForms, #hamForms, #bebForms, #acomForms, #fornForms {
        margin-top: 15px;
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
                                <a href=""><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
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
                <div><i class="material-symbols-outlined">home</i><span>Cadastro de produtos</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <!--Categoria do produto-->
                <form action="" method="POST" id="formsCadastro">
                    <div class="container">
                        <div class="row">
                            <div>
                                <label for="cat_prod">Categoria:</label><br>
                                <select name="cat_prod" id="cat_prod">
                                    <option value="1">Produtos</option>
                                    <option value="2">Hamburguer</option>
                                    <option value="3">Bebida</option>
                                    <option value="4">Acompanhamento</option>
                                    <option value="5">Fornecedor</option>
                                </select>
                            </div>
                            <!--Fomulário de Produtos-->
                            <div id="prodForms">
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="loteProd">Lote:</label>
                                            <br>
                                            <input type="text" name="loteProd" maxlength="5" id="loteProd">
                                        </div>
                                        <div>
                                            <label for="tipoProd">Categoria:</label>
                                            <br>
                                            <input type="text" name="tipoProd" maxlength="100" id="tipoProd">
                                        </div>
                                        <div>
                                            <label for="nomeProd">Nome do produto:</label>
                                            <br>
                                            <input type="text" name="nomeProd" maxlength="100" id="nomeProd">
                                        </div>
                                        <div>
                                            <label for="preComProd">Preço da compra:</label>
                                            <br>
                                            <input type="text" name="preComProd" id="preComProd">
                                        </div>
                                        <div>
                                            <label for="preVenProd">Preço da venda:</label>
                                            <br>
                                            <input type="text" name="preVenProd" id="preVenProd">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="qtdProd">Quantidade:</label>
                                            <br>
                                            <input type="text" name="qtdProd" id="qtdProd">
                                        </div>
                                        <div>
                                            <label for="dtComProd">Data da compra:</label>
                                            <br>
                                            <input type="date" name="dtComProd" id="dtComProd">
                                        </div>
                                        <div>
                                            <label for="dtVenProd">Data de vencimento:</label>
                                            <br>
                                            <input type="date" name="dtVenProd" id="dtVenProd">
                                        </div>
                                        <div>
                                            <label for="imgProd">Imagem do produto:</label>
                                            <br>
                                            <input type="file" name="imgProd" id="imgProd">
                                        </div>
                                        <input type="submit" value="Salvar" class="submitButton">
                                    </div>
                                </div>
                            </div>
                            <!--Fomulário de Hamburguer-->
                            <div id="hamForms" class="disable">
                                <div>
                                    <label for="nomeHam">Nome:</label>
                                    <br>
                                    <input type="text" name="nomeHan" id="nomeHam">
                                </div>
                                <div>
                                    <label for="preHam">Preço:</label>
                                    <br>
                                    <input type="text" name="preHam" id="preHam">
                                </div>
                                <div>
                                    <label for="qtdHam">Quantidade:</label>
                                    <br>
                                    <input type="text" name="qtdHam" id="qtdHam" maxlength="5">
                                </div>
                                <input type="submit" value="Salvar" class="submitButton">
                            </div>
                            <!--Fomulário de Bebidas-->
                            <div id="bebForms" class="disable">
                                <div>
                                    <label for="nomeBeb">Nome:</label>
                                    <br>
                                    <input type="text" name="nomeBeb" id="nomeBeb">
                                </div>
                                <div>
                                    <label for="preBeb">Preço:</label>
                                    <br>
                                    <input type="text" name="preBeb" id="preBeb">
                                </div>
                                <div>
                                    <label for="qtdBeb">Quantidade:</label>
                                    <br>
                                    <input type="text" name="qtdBeb" id="qtdBeb" maxlength="5">
                                </div>
                                <input type="submit" value="Salvar" class="submitButton">
                            </div>
                            <!--Fomulário de Acompanhamento-->
                            <div id="acomForms" class="disable">
                                <div>
                                    <label for="nomeAcom">Nome:</label>
                                    <br>
                                    <input type="text" name="nomeAcom" id="nomeAcom">
                                </div>
                                <div>
                                    <label for="preAcom">Preço:</label>
                                    <br>
                                    <input type="text" name="preAcom" id="preAcom">
                                </div>
                                <div>
                                    <label for="qtdAcom">Quantidade:</label>
                                    <br>
                                    <input type="text" name="qtdAcom" id="qtdAcom" maxlength="5">
                                </div>
                                <div>
                                    <label for="molhoAcom">Molho:</label>
                                    <br>
                                    <input type="text" name="molhoAcom" id="molhoAcom">
                                </div>
                                <input type="submit" value="Salvar" class="submitButton">
                            </div>
                            <!--Fomulário de Fornecedores-->
                            <div id="fornForms" class="disable">
                                <div>
                                    <label for="cnpjForn">CNPJ:</label>
                                    <br>
                                    <input type="text" name="cnpjForn" id="cnpjForn">
                                </div>
                                <div>
                                    <label for="nomeForn">Nome:</label>
                                    <br>
                                    <input type="text" name="nomeForn" id="nomeForn">
                                </div>
                                <div>
                                    <label for="telForn">Telefone:</label>
                                    <br>
                                    <input type="tel" name="telForn" id="telForn">
                                </div>
                                <div>
                                    <label for="tipoForn">Tipo:</label>
                                    <br>
                                    <input type="text" name="tipoForn" id="tipoForn">
                                </div>
                                <input type="submit" value="Salvar" class="submitButton">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/paginaInicial/cadProd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>

</body>

</html>