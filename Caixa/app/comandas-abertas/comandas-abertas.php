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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/pedidos-abertos/pedidos-abertos.css">
    <title>Comandas Abertas</title>
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
                <span class="active">
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
        <main>
            <div class="pedidosAbertosArea">
                <div class="container">
                    <h1>Comandas Abertas</h1>
                    <hr class="linha">
                    <div class="pedidosAbertosItems">
                        <div class="pedidosAbertosItemsArea">
                            <input type="radio" name="Comanda" id="1" class="radioButton">
                            <label for="1" class="optionComanda">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="numComanda">111</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="btnVerPedido">Ver pedido</p>
                                        </div>
                                        <div class="col-3">
                                            <p>11/11/20023</p>
                                        </div>
                                        <div class="col-3">
                                            <p>11/11/20023</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                    </div>
                    <div class="optionButtonArea">
                        <button class="">Excluir</button>
                        <button class="btnConcluirPedido">Concluir</button>
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUpPediodo popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Comanda <span>111</span></h2>
                        <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container">

                    </div>
                </div>
            </aside>
        </div>
        <div class="opaco opacoConfirmEx popDown">
            <aside class="popUp popUpConfirmEx popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Comanda <span class="numComandaArea">111</span></h2>
                        <button class="fecharPopUpConfirm"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container">

                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/pedidos-abertos/pedidos-abertos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>