<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/configuracoes/config.css">
    <title>Informações da conta</title>
</head>

<body>
    <div class="fundo">
    <header>
            <nav class="menuArea">
                <span>
                    <a href="../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../area-do-cliente/area-do-cliente.php">
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
                <a href="../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../index.html">Sair</a>
            </aside>
        </header>
        <main class="main">

            <div class="fundoMain">
                <div class="row rows">
                    <div class="col-4 menuTopics">
                        <ul class="configMenu">
                            <li>
                                <span class="infoConta activeConfig">Informações da conta</span>
                            </li>
                            <li>
                                <span class="infoPessoais">Informações pessoais</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-8 info">
                        <h1>Informações da conta</h1>
                        <div class="menuOptionConfig">
                            <picture>
                                <img src="https://sujeitoprogramador.com/steve.png" alt="">
                            </picture>
                            <div class="row infoItens">
                                <div class="camposConfig col">
                                    <div>Nome:</div>
                                    <p>l</p>
                                </div>
                                <div class="camposConfig col">
                                    <div>Cargo:</div>
                                    <p>l</p>
                                </div>
                            </div>

                            <div class="row infoItens">
                                <div class="camposConfig col">
                                    <div>Email:</div>
                                    <p>l</p>
                                </div>
                                <div class="camposConfig col">
                                    <div>Horário de trabalho:</div>
                                    <p>l</p>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post" class="confirmForms disable">
                            <div class="forms">
                                <h2>Confirmar informações</h2>
                                <div class="input-contain">
                                    <label for="emailInput">Email</label>
                                    <input type="email" name="emailInput" id="emailInput" autocomplete="off"
                                        aria-labelledby="placeholder-email" value="" required>
                                </div>
                                <div class="input-contain">
                                    <label for="senhaInput">Senha</label>
                                    <input type="password" name="senhaInput" id="senhaInput" autocomplete="off"
                                        aria-labelledby="placeholder-senha" value="" required>
                                </div>
                                <input type="submit" value="Entrar" class="btnEntrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/configuracoes/configConta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>