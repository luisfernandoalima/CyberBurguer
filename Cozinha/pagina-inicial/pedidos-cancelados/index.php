<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/pedidos.css">
    <title>Pedidos Cancelados</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span><a href="../index.php"><i class="material-symbols-outlined">table_restaurant</i></a></span>
                <span><a href="../pedidos-cocluidos/index.php"><i class="material-symbols-outlined">done</i></a></span>
                <span class="active"><a href="index.php"><i class="material-symbols-outlined">close</i></a></span>
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
                <a href="../configuracoes/index.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../index.html">Sair</a>
            </aside>
        </header>
        <main>
            <div class="container">
                <div class="pedidos">
                    <div class="row">
                        <div class="col-4">
                            <div class="pedidoArea">
                                <div class="pedidoHeader">
                                    <div class="pedidoID">
                                        <span>#0000</span>
                                        <span>Mesa 03</span>
                                    </div>
                                    <div class="pedidoHora">
                                        <span>14:43:09</span>
                                        <span>00/00/2000</span>
                                    </div>
                                </div>
                                <div class="pedidoInfo">
                                    <h1>Pedido:</h1>
                                    <hr>
                                    <div class="pedidoItem">
                                        <ul id="itens">
                                            <li>Hamburgão</li>
                                            <li>Danonão</li>
                                            <li>Sucão</li>
                                        </ul>
                                        <ul id="Qtd">
                                            <li>1x</li>
                                            <li>2x</li>
                                            <li>3x</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pedidoCancelado">
                                    <p>Cancelado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>