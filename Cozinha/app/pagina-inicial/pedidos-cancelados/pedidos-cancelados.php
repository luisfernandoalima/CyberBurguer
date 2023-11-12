<?php
include_once(__DIR__ . '/../../php/conn/conn.php');
include_once(__DIR__ . '/../../php/tela/listar_cancelado.php');

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
    <title>Pedidos Cancelados</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span><a href="../home.php"><i class="material-symbols-outlined">table_restaurant</i></a></span>
                <span><a href="../pedidos-concluidos/pedidos-concluidos.php"><i class="material-symbols-outlined">done</i></a></span>
                <span class="active"><a href="../pedidos-cancelados/pedidos-cancelados.php"><i class="material-symbols-outlined">close</i></a></span>
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
                <a href="../configuracoes/config.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <!-- vai ter que criar um php de sair pra sair da session e ligar nesse botão-->
                <a href="../../php/sair.php">Sair</a>
            </aside>
        </header>
        <main>
            <div class="pedidos barra">
                <div class="container">
                    <div class="row">
                        <?php foreach ($burguers as $comanda => $burguerProdutos) : ?>
                            <?php if (isset($bebidas[$comanda]) && isset($acompanhamentos[$comanda]) && isset($molhos[$comanda])) : ?>
                                <?php $bebidasProdutos = $bebidas[$comanda]; ?>
                                <?php $acompanhamentoProdutos = $acompanhamentos[$comanda]; ?>
                                <?php $molhosProdutos = $molhos[$comanda]; ?>
                                <?php $num_mesa = $burguerProdutos['mesa']; ?>
                                <?php $horaPedido = $burguerProdutos['horaPedido']; ?>

                                <?php // Verifica se a situação está vazia antes de exibir o pedido
                                if (empty($burguerProdutos['situacao'])) : ?>
                                    <div class="col-4">
                                        <div class="pedidoArea">
                                            <div class="pedidoHeader">
                                                <div class="pedidoID">
                                                    <span>Comanda: <?php echo $comanda; ?></span>
                                                    <span>Mesa <?php echo $num_mesa; ?></span>
                                                </div>
                                                <div class="pedidoHora">
                                                    <span>
                                                        <?php if (isset($burguerProdutos['horaPedido']) && !empty($burguerProdutos['horaPedido'])) : ?>
                                                            <span>
                                                                <?php echo date('H:i:s', strtotime($burguerProdutos['horaPedido'])); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span>
                                                        <?php echo date('d/m/Y', strtotime($burguerProdutos['horaPedido'])); ?>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="pedidoInfo">
                                                <h1>Pedido:</h1>
                                                <hr>
                                                <div class="pedidoItem">
                                                    <ul id="itens">
                                                        <?php foreach ($burguerProdutos['itens'] as $burguer) : ?>
                                                            <p><?php echo $burguer['nome']; ?> (x<?php echo $burguer['quantidade']; ?>)</p>
                                                        <?php endforeach; ?>

                                                        <?php // Verifica se há bebidas associadas a essa comanda
                                                        if (isset($bebidas[$comanda])) : ?>

                                                            <?php foreach ($bebidasProdutos['itens'] as $bebida) : ?>
                                                                <p><?php echo $bebida['nome']; ?> (x<?php echo $bebida['quantidade']; ?>)</p>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        <?php // Verifica se há acompanhamentos associados a essa comanda
                                                        if (isset($acompanhamentos[$comanda])) : ?>

                                                            <?php foreach ($acompanhamentoProdutos['itens'] as $acompanhamento) : ?>
                                                                <p><?php echo $acompanhamento['nome']; ?> (x<?php echo $acompanhamento['quantidade']; ?>)</p>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        <?php // Verifica se há molhos associados a essa comanda
                                                        if (isset($molhos[$comanda])) : ?>

                                                            <?php foreach ($molhosProdutos['itens'] as $molho) : ?>
                                                                <p><?php echo $molho['nome']; ?> (x<?php echo $molho['quantidade']; ?>)</p>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="pedidoCancelado">
                                                <p>Cancelado</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>