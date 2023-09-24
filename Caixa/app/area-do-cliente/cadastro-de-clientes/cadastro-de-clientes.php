<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/area-do-cliente/cadastro-de-cliente/cadastro-de-cliente.css">
    <title>Cadastro de clientes</title>
</head>

<body>
    <div class="fundo">
    <header>
            <nav class="menuArea">
                <span>
                    <a href="../../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span class="active">
                    <a href="../../area-do-cliente/area-do-cliente.php">
                        <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
            </nav>
            <aside class="sidebar-header">
                <img class="logo-img" src="https://sujeitoprogramador.com/steve.png" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome">Nome</span>
                    <!--Número de identificação-->
                    <span class="id">#565555</span>
                </span>
                <div class="hamburger-menu">
                    <input type="checkbox" id="checkbox-menu">

                    <label for="checkbox-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>
            </aside>
            <aside class="menuConfig">
                <a href="../../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../index.html">Sair</a>
            </aside>
        </header>
        <main>
            <div class="clienteArea">
                <div class="container">
                    <h1>Cadastro de clientes</h1>
                    <hr class="linha">
                    <div class="clienteItems">
                        <form action="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="campoForms">
                                            <label for="nome">Nome:</label>
                                            <input type="text" name="" id="nome">
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">CPF:</label>
                                            <input type="text" name="" id="nome" class="cpfInput">
                                        </div>
                                        <div class="sexo">
                                            <!--Sexo do funcionário-->
                                            <label for="sexo_func">Sexo:</label><br>
                                            <input type="radio" name="sexo_func" id="Masc" checked><label for="Masc">Masculino</label><br>
                                            <input type="radio" name="sexo_func" id="Femi"><label for="Femi">Feminino</label>
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">Telefone:</label>
                                            <input type="tel" name="" id="nome" class="telInput">
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">Email:</label>
                                            <input type="text" name="" id="nome">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="campoForms">
                                            <label for="CEP">CEP:</label>
                                            <input type="text" name="" id="CEP" onblur="pesquisacep(this.value);">
                                        </div>
                                        <div class="campoForms">
                                            <label for="cidade">Cidade:</label>
                                            <input type="text" name="" id="cidade">
                                        </div>
                                        <div class="campoForms">
                                            <label for="Bairro">Bairro:</label>
                                            <input type="text" name="" id="Bairro">
                                        </div>
                                        <div class="campoForms">
                                            <label for="Rua">Rua:</label>
                                            <input type="text" name="" id="Rua">
                                        </div>
                                        <div class="campoForms">
                                            <label for="numero">Nº:</label>
                                            <input type="text" name="" id="numero">
                                        </div>
                                        <input type="submit" value="Enviar" class="submitButton">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/configPopUp.js"></script>
    <script src="../../../assets/js/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>