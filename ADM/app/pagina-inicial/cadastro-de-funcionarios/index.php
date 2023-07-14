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
    <title>Cadastro de Funcionários</title>
</head>

<body onload="formulariojs()">
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
                <div><i class="material-symbols-outlined">home</i><span>Cadastro de funcionários</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <form action="" method="post">
                    <div class="container">
                        <div class="row row-cols-4">
                            <div class="col-md-4">
                                <div>
                                    <!--Nome do funcionário-->
                                    <label for="nome_func">Nome:</label><br>
                                    <input type="text" name="nome_func" id="nome_func" maxlength="255" required>
                                </div>
                                <div>
                                    <!--Telefone do funcionário-->
                                    <label for="email_func">Email:</label><br>
                                    <input type="email" name="email_func" id="email_func" required>
                                </div>
                                <div>
                                    <!--Data de Nascimento do funcionário-->
                                    <label for="dtNasc_func">Data de nascimento:</label><br>
                                    <input type="date" name="dtNasc_func" id="dtNasc_func" required>
                                </div>
                                <div>
                                    <!--Telefone do funcionário-->
                                    <label for="tel_func">Telefone do funcionário:</label><br>
                                    <input type="tel" name="tel_func" id="tel_func" required>
                                </div>
                                <div>
                                    <!--Telefone para emergências-->
                                    <label for="telEmer_func">Telefone de emergência:</label><br>
                                    <input type="tel" name="telEmer_func" id="telEmer_func" required>
                                </div>
                                <div>
                                    <!--Sexo do funcionário-->
                                    <label for="sexo_func">Sexo:</label><br>
                                    <input type="radio" name="sexo_func" id="Masc" checked><label for="Masc">Masculino</label><br>
                                    <input type="radio" name="sexo_func" id="Femi"><label for="Femi">Feminino</label>
                                </div>
                                <div>
                                    <!--Religião do funcionário-->
                                    <label for="relig_func">Religião:</label><br>
                                    <input type="text" name="relig_func" id="relig_func" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <!--Cargo do funcionário-->
                                    <label for="carg_func">Cargo:</label><br>
                                    <select name="carg_func" id="carg_func">
                                        <option value="1">Recepcionista</option>
                                        <option value="2">Garçom</option>
                                    </select>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="cart_Func">Carteira de trabalho:</label><br>
                                    <input type="text" name="cart_Func" maxlength="14" id="cart_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="pis_Func">Pis</label><br>
                                    <input type="text" name="pis_Func" maxlength="14" id="pis_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="titu_Func">Titulo de eleitor:</label><br>
                                    <input type="text" name="titu_Func" maxlength="16" id="titu_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="vaRef_Func">Vale refeição:</label><br>
                                    <input type="text" name="vaRef_Func" maxlength="14" id="vaRef_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="vaTra_Func">Vale transporte:</label><br>
                                    <input type="text" name="vaTra_Func" maxlength="14" id="vaTra_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="comi_Func">Comissão:</label><br>
                                    <input type="text" name="comi_Func" maxlength="14" id="comi_Func" required>
                                </div>
                                <div>
                                    <!--Carteira de trabalho do funcionário-->
                                    <label for="cBanc_Func">Conta bancária:</label><br>
                                    <input type="text" name="cBanc_Func" maxlength="14" id="cBanc_Func" required>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <!--Habilitação do funcionário-->
                                    <label for="habi_func">Habilitação:</label><br>
                                    <input type="radio" name="habi_func" id="Sim"><label for="Sim">Sim</label><br>
                                    <input type="radio" name="habi_func" id="Nao" checked><label for="Nao">Não</label>
                                </div>
                                <div>
                                    <!--Reservista do funcionário-->
                                    <label for="reser_func">Reservista</label><br>
                                    <input type="radio" name="reser_func" id="Possui"><label for="Possui">Possui</label><br>
                                    <input type="radio" name="reser_func" id="NaoPossui" checked><label for="NaoPossui">Não possui</label>
                                </div>
                                <div>
                                    <!--Tipo sanguíneo do funcionário-->
                                    <label for="sang_func">Tipo sanguíneo</label><br>
                                    <select name="sang_func" id="sang_func">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="adimi_func">Data de adimissão</label><br>
                                    <input type="text" name="adimi_func" id="adimi_func" readonly>
                                </div>
                                <div>
                                    <input type="submit" value="Cadastrar" class="submitButton">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </main>
    </div>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>
    <script src="../../../assets/js/paginaInicial/cadFunc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>