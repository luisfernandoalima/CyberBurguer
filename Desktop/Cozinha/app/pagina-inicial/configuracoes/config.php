<?php
include_once(__DIR__ . '/../../php/conn/conn.php');
session_start();

if (!isset($_SESSION['emailSession']) and !isset($_SESSION['senhaSession'])) {
    header("location: ../../index.php?erro=true");
    exit;
} else
    $email = $_SESSION["emailSession"];
$senha = $_SESSION['senhaSession'];
$nome = $_SESSION['nomeSession'];
$id_func = $_SESSION['idFuncSession'];
$avatar = '../../../' . $_SESSION['avatarSession'];
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
    <link rel="shortcut icon" href="../../../img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/pedidos.css">
    <link rel="stylesheet" href="css/config.css">
    <title>Configurações</title>
</head>
<style>

</style>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span><a href="../home.php"><i class="material-symbols-outlined">table_restaurant</i></a></span>
                <span><a href="../pedidos-concluidos/pedidos-concluidos.php"><i class="material-symbols-outlined">done</i></a></span>
                <span><a href="../pedidos-cancelados/pedidos-cancelados.php"><i class="material-symbols-outlined">close</i></a></span>
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
                <a href="config.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../php/sair.php">Sair</a>
            </aside>
        </header>
        <main class="main">
            <div class="container-fluid">
                <div class="fundoMain">
                    <div class="row">
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
                                    <img src="<?php echo $avatar; ?>" alt="">
                                </picture>
                                <div class="row infoItens">
                                    <div class="camposConfig col">
                                        <div>Nome:</div>
                                        <p><?php echo $nome ?></p>
                                    </div>
                                    <div class="camposConfig col">
                                        <div>Cargo:</div>
                                        <p><?php echo $cargo ?></p>
                                    </div>
                                </div>

                                <div class="row infoItens">
                                    <div class="camposConfig col">
                                        <div>Email:</div>
                                        <p><?php echo $email ?></p>
                                    </div>
                                    <div class="camposConfig col">
                                        <div>Horário de trabalho (horas):</div>
                                        <input type="text" value="<?php echo $cargaHoraria ?>" class="campoHora" readonly>
                                    </div>
                                </div>
                            </div>
                            <form action="../../php/liberar_func.php" method="post" class="confirmForms disable">
                                <div class="forms">
                                    <h2>Confirmar informações</h2>
                                    <div class="input-contain">
                                        <label for="emailInput">Email</label>
                                        <input type="email" name="emailInput" id="emailInput" autocomplete="off" aria-labelledby="placeholder-email" value="" required>
                                    </div>
                                    <div class="input-contain">
                                        <label for="senhaInput">Senha</label>
                                        <input type="password" name="senhaInput" id="senhaInput" autocomplete="off" aria-labelledby="placeholder-senha" value="" required>
                                    </div>
                                    <input type="submit" value="Entrar" class="btnEntrar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../js/config.js"></script>
    <script src="../../js/configConta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>