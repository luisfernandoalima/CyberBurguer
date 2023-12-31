<?php
session_start();

$email = $_SESSION["emailSession"];
$senha = $_SESSION['senhaSession'];
$nome = $_SESSION['nomeSession'];
$id_func = $_SESSION['idFuncSession'];
$religiao = $_SESSION['religiaoSession'];
$telefone = $_SESSION['telefoneSession'];
$conta = $_SESSION['contaSession'];
$habilitado = $_SESSION['habilitadoSession'];
$avatar = '../../../../' . $_SESSION['avatarSession'];
$cargo = $_SESSION['cargoSession'];
$cargaHoraria = $_SESSION['cargaHorariaSession'];

$horarioAtual = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../css/config.css">
    <title>Informações Pessoais</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span><a href="../../home.php"><i class="material-symbols-outlined">table_restaurant</i></a></span>
                <span><a href="../../pedidos-concluidos/pedidos-concluidos.php"><i class="material-symbols-outlined">done</i></a></span>
                <span><a href="../../pedidos-cancelados/pedidos-cancelados.php"><i class="material-symbols-outlined">close</i></a></span>
            </nav>
            <aside class="sidebar-header">
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $nome; ?></span>
                    <!--Número de identificação-->
                    <span class="id"><?php echo '#' . $id_func; ?></span>
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
                <a href="../config.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../../php/sair.php">Sair</a>
            </aside>
        </header>
        <main class="main">
            <div class="container-fluid">
                <div class="fundoMain">
                    <div class="row">
                        <div class="col-4 menuTopics">
                            <ul class="configMenu">
                                <li>
                                    <a href="../config.php">Informações da conta</a>
                                </li>
                                <li>
                                    <a href="infos.php" class="activeConfig">Informações pessoais</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-8 info">
                            <h1>Informações da pessoais</h1>
                            <div class="menuOptionConfig">
                                <picture>
                                    <img src="<?php echo $avatar; ?>" alt="">
                                </picture>

                                <form action="../../../php/alter_func.php" id="infoPessoais" name="infoPessoais" method="post">

                                    <div>
                                        <label for="nomePessoal">Nome de Usuário</label>
                                        <!--As informações vindas do PHP serão colocadas no value-->
                                        <input type="text" id="nomePessoal" name="nomePessoal" value="<?php echo $nome; ?>">
                                    </div>
                                    <div>
                                        <label for="telPessoal">Celular</label>
                                        <input type="text" id="telPessoal" name="telPessoal" value="<?php echo $telefone; ?>">
                                    </div>
                                    <div>
                                        <label for="habPessoal">Habilitação</label>
                                        <input type="text" id="habPessoal" name="habPessoal" value="<?php echo $habilitado; ?>">
                                    </div>
                                    <div>
                                        <label for="relPessoal">Religião</label>
                                        <input type="text" id="relPessoal" name="relPessoal" value="<?php echo $religiao; ?>">
                                    </div>
                                    <div>
                                        <label for="conPessoal">Nº Conta Bancária</label>
                                        <input type="text" id="conPessoal" name="conPessoal" value="<?php echo $conta; ?>">
                                    </div>
                                    <div>
                                        <label for="senhaPessoal">Senha</label>
                                        <input type="password" id="senhaPessoal" name="senhaPessoal" value="<?php echo $senha; ?>">
                                    </div>
                                    <div class="passwordClass">
                                        <label for="senhaConPessoal">Confirmar senha</label>
                                        <input type="password" id="senhaConPessoal" name="senhaConPessoal">
                                    </div>
                                    <button class="btnSubmitJS" type="submit" name="submitAlter">Salvar alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>


    <script src="../../../js/config.js"></script>
    <script src="../../../js/configIP.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>