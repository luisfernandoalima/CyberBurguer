<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/meu-perfil/perfil.css">
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
  />
  <title>Meu Perfil</title>
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
                <div><i class="material-symbols-outlined">settings</i><span>Meu Perfil</span></div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row">
                        <div class="col-6 fotoArea">
                            <picture class="foto-perfil">
                                <img src="https://sujeitoprogramador.com/steve.png" alt="" class="fotoUsuário">
                            </picture>
                            <div class="popUpInfo">
                                <p>Clique para trocar de foto</p>
                            </div>
                        </div>
                        <div class="col-6">
                        <form action="" id="infoPessoais" class="areaPerfil">
                                    <div>
                                        <label for="nomePessoal">Nome de Usuário</label>
                                        <!--As informações vindas do PHP serão colocadas no value-->
                                        <input type="text" id="nomePessoal" value="Luis">
                                    </div>
                                    <div>
                                        <label for="telPessoal">Celular</label>
                                        <input type="text" id="telPessoal"
                                        value="99999999999">
                                    </div>
                                    <div>
                                        <label for="habPessoal">Habilitação</label>
                                        <input type="text" id="habPessoal" value="55555555">
                                    </div>
                                    <div>
                                        <label for="relPessoal">Religião</label>
                                        <input type="text" id="relPessoal" value="Budista">
                                    </div>
                                    <div>
                                        <label for="conPessoal">Nº Conta Bancária</label>
                                        <input type="text" id="conPessoal" value="5555555">
                                    </div>
                                    <div>
                                        <label for="senhaPessoal">Senha</label>
                                        <input type="password" id="senhaPessoal" value="55555">
                                    </div>
                                    <div class="passwordClass">
                                        <label for="senhaConPessoal">Confirmar senha</label>
                                        <input type="password" id="senhaConPessoal">
                                    </div>
                                    <div>
                                        <input type="file" name="" id="" class="arquivos">
                                    </div>
                                    <div class="nomeImagemArea">
                                        <p class="textoImagem">Imagem</p>
                                        <p class="nomeImagem"></p>
                                    </div>
                                </form>
                                <button class="btnSubmitJS" disabled>Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>
    <script src="../../../assets/js/perfil/meu-perfil.js"></script>
    <script src="../../../assets/js/perfil/perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>