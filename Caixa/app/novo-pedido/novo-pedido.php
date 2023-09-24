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
    <link rel="stylesheet" href="../../assets/css/novo-pedido/novo-pedido.css">
    <title>Novo pedido</title>
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
                <span class="active">
                    <a href="novo-pedido.php">
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
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <section class="sidebar">
                            <div class="opcoesSidebar">
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/MenuCyberOfertas.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="combos">
                                                <label for="combos" class="labelText">
                                                    Combos
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/Burger 2.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Hamburguer">
                                                <label for="Hamburguer" class="labelText backgroundLabel">
                                                    Hamburguer
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/french-fries.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Porções">
                                                <label for="Porções" class="labelText">
                                                    Porções
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/sobremesa 1.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Sobremesas">
                                                <label for="Sobremesas" class="labelText">
                                                    Sobremesas
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="row">
                                        <div class="col-6 imgOption">
                                            <img src="../../assets/img/icons/soda.png" alt="">
                                        </div>
                                        <div class="col-6 textOption">
                                            <span>
                                                <input type="radio" name="optionMenu" id="Bebidas">
                                                <label for="Bebidas" class="labelText">
                                                    Bebidas
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btnArea">

                                <button class="btnCarrinho">
                                    <p>Pedido</p> <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                </button>

                            </div>
                        </section>
                    </div>
                    <div class="col-9">
                        <section class="areaPedidos">
                            <!--Combos-->
                            <div class="combos">
                                <h1>Combos</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p>Sales Burguer</p>
                                                        <p>R$90,00</p>
                                                        <a href=""><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Hamburguer-->
                            <div class="hamburguer disable">
                                <h1>Hamburguer</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p>Sales Burguer</p>
                                                        <p>R$90,00</p>
                                                        <a href=""><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Porções-->
                            <div class="porcoes disable">
                                <h1>Porções</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p>Sales Burguer</p>
                                                        <p>R$90,00</p>
                                                        <a href=""><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Sobremesa-->
                            <div class="sobremesas disable">
                                <h1>Sobremesas</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p>Sales Burguer</p>
                                                        <p>R$90,00</p>
                                                        <a href=""><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Bebidas-->
                            <div class="bebidas disable">
                                <h1>Bebidas</h1>
                                <hr class="linha">
                                <div class="pedidos barra container">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="pedido">
                                                <div class="infoPedido">
                                                    <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                                <div class="imgPedido">
                                                    <img src="../../assets/img/produtos/hamburguer/download.png" style="width: 145px; display: block; margin: auto;" alt="">
                                                </div>
                                                <div class="textAreaPedido">
                                                    <div class="textPedido">
                                                        <p>Sales Burguer</p>
                                                        <p>R$90,00</p>
                                                        <a href=""><button>Adicionar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUp popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Pedido</h2>
                        <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container">
                        <p>Itens no pedido:</p>
                        <div class="itensPedido barra">
                            <ul>
                                <li class="row">
                                    <span class="col-6">- Combo Sales Burguer</span>
                                    <span class="col-2">x1</span>
                                    <span class="col-4"><a href=""><i class="fa-solid fa-x" style="color: #ffffff;"></i></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="popUpButtonsArea">
                        <button class="btnCancel">Cancelar pedido</button>
                        <button class="btnConfirm">Concluir pedido</button>
                    </div>
                </div>
            </aside>
        </div>
        <div class="opacoConfirm popDown">
            <aside class="popUpConfirm popDown">
                <div>
                    <div class="popUpHeaderConfirm">
                        <h2>Confirmar <span id="tipoConfirmacao"></span></h2>
                        <button class="fecharPopUpConfirm"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfoConfirm container">
                        <p>Digite o nº da comanda e seu nº de identificação para <span id="textoConfirm"></span> do pedido</p>
                        <div>
                            <form method="post" class="formsConfirm">
                                <div class="inputComandaArea">
                                    <input type="text" name="" id="" class="inputComanda" placeholder="Número da comanda..." required>
                                </div>
                                <div>
                                    <input type="text" name="" id="" class="inputSenha" placeholder="Número de identificação..." required>
                                </div>
                                <div>
                                    <input type="submit" value="Confirmar" class="btnConfirmForms">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script src="../../assets/js/novo-pedido/novo-pedido.js"></script>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>