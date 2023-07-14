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
    <title>Cadastro de Mesas</title>
</head>

<style>
    .fundoMesa {
        background-color: #fff;
        width: 200px;
        height: 200px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fondoMesaAzul {
        background-color: var(--azulEscuro);
        width: 180px;
        height: 180px;
        border-radius: 20px;
    }

    .fondoMesaAzul>h1 {
        text-align: center;
        font-size: 4em;
        font-weight: bold;
        position: relative;
        top: -105px;
        left: 0px;
    }

    .linhaHorizontal,
    .linhaVertical {
        background-color: var(--azulEscuro);
        width: 200px;
        height: 80px;
        position: relative;
    }

    .linhaHorizontal {
        top: 50px;
        left: -10px;
    }

    .linhaVertical {
        transform: rotate(90deg);
        top: -30px;
        left: -10px;
    }

    .mesa {
        height: 300px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .forms{
        margin-top: 10%;
        margin-left: 20px;
    }

    #Capacidade{
        margin-top: 30px;
        margin-left: 30px;
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
                <div><i class="material-symbols-outlined">home</i><span>Cadastro de Mesas</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row">
                        <div class="col-6 forms">
                            <form action="" method="POST" id="formsCadastro">
                                <div>
                                    <label for="nMesa">Número da mesa:</label>
                                    <br>
                                    <input type="text" name="nMesa" id="nMesa">
                                </div>
                                <div>
                                    <label for="capMesa">Capacidade de pessoas:</label>
                                    <br>
                                    <input type="text" name="capMesa" id="capMesa">
                                </div>
                                <input type="submit" value="Salvar" class="submitButton">
                            </form>
                        </div>
                        <div class="col-5 mesaArea">
                            <div class="mesa">
                                <div class="fundoMesa">
                                    <div class="fondoMesaAzul">
                                        <div class="linhaHorizontal"></div>
                                        <div class="linhaVertical"></div>
                                        <h1 id="nMesaGrande"></h1>
                                    </div>
                                </div>
                            </div>
                            <h2 id="Capacidade">Capacidade da mesa: <span id="nPessoas"></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/paginaInicial/cadMesa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>

</body>

</html>