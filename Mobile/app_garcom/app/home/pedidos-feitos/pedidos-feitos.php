<?php
include_once(__DIR__ . "/../../php/pedidos/listar-pedidos-feitos.php");
session_start();

if (!isset($_SESSION['emailSession']) || !isset($_SESSION['senhaSession'])) {
    header("location: ../login/erro.html");
    exit;
}

$email = $_SESSION['emailSession'];
$senha = $_SESSION['senhaSession'];
$nome = $_SESSION['nomeSession'];
$id_func = $_SESSION['idFuncSession'];
$avatar = '../../' . $_SESSION['avatarSession'];

$horarioAtual = date('Y-m-d H:i:s');

$burguers = obterPedidosBurguers();
$bebida = obterPedidosBebida();
$acompanhamentos = obterPedidosAcompanhamentos();
$molhos = obterPedidosMolhos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/home/pedidos-feitos.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Pedidos feitos</title>
</head>

<body>
    <header class="cabeçalho">
        <h1><span>//</span>Cyberburguer</h1>
        <i class="fa-solid fa-arrow-left backButton" style="color: #FF006B;"></i>
    </header>
    <main>
        <h2>Pedidos feitos:</h2>
        <br>
        <div class="pedidosArea container">
            <div class="row">
                <?php foreach ($burguers as $idPedido => $burguerProdutos) : ?>
                    <?php if (isset($bebida[$idPedido]) && isset($acompanhamentos[$idPedido]) && isset($molhos[$idPedido])) : ?>
                        <?php $bebidaProdutos = $bebida[$idPedido]; ?>
                        <?php $acompanhamentoProdutos = $acompanhamentos[$idPedido]; ?>
                        <?php $molhosProdutos = $molhos[$idPedido]; ?>
                        <?php $num_mesa = $burguerProdutos['mesa']; ?>
                        <?php $horaPedido = $burguerProdutos['horaPedido']; ?>
                        <?php $idPedido = $burguerProdutos['id']; ?>
                        <?php $comanda = $burguerProdutos['comanda']; ?>
                        <?php if (empty($burguerProdutos['situacao'])) : ?>
                            <div class="pedidoDiv" data-pedido-id="<?= $idPedido; ?>">
                                <h3>Pedido: <span><?= $idPedido; ?></span></h3>
                                <h4>Comanda: <span><?= $comanda; ?></span></h4>
                                <h4>Mesa: <span><?= $num_mesa; ?></span></h4>
                                <h4>Horário: <span class="Hora"><?= date('H:i:s', strtotime($horaPedido)); ?></span></h4>
                                <h5>(<span class="difTempo"></span>) minutos atrás</h5>
                                <h4>Situação: <span style="color: purple;">EM ANDAMENTO</span></h4>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <!--JS-->
    <script>
        const pedidoDivs = document.querySelectorAll('.pedidoDiv');

        pedidoDivs.forEach(pedidoDiv => {
            pedidoDiv.addEventListener('click', function() {
                const pedidoId = pedidoDiv.getAttribute('data-pedido-id');
                window.location.href = `editar-pedidos/editar-pedidos.php?pedido_id=${pedidoId}`;
            });
        });
    </script>
    <script src="../../../assets/js/home.js/pedidos-feitos.js"></script>
    <script>
        function verificarMesaChamando() {
            // Cria uma instância do objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Define a função a ser chamada quando a resposta for recebida
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var mensagem = xhr.responseText;

                    // Verifica se a mensagem não está vazia antes de exibir o alerta
                    if (mensagem.trim() !== "") {
                        // Exibe a mensagem (alerta) do PHP
                        alert(mensagem);

                        // Após exibir o alerta, faça a solicitação para atualizar a tabela
                        var xhrAtualizar = new XMLHttpRequest();

                        // Define a função a ser chamada quando a resposta da atualização for recebida
                        xhrAtualizar.onreadystatechange = function() {
                            if (xhrAtualizar.readyState === 4 && xhrAtualizar.status === 200) {
                                // A tabela foi atualizada com sucesso
                                console.log(xhrAtualizar.responseText);
                            }
                        };

                        // Faz uma solicitação GET para o script de atualização
                        xhrAtualizar.open("GET", "../../php/atualizar_chamada.php", true);
                        xhrAtualizar.send();
                    }
                }
            };

            // Faz uma solicitação GET para o script PHP que verifica a mesa chamando
            xhr.open("GET", "../../php/notificar.php", true);
            xhr.send();
        }

        // Chama a função verificarMesaChamando a cada 3 segundos
        setInterval(verificarMesaChamando, 3000);
    </script>
    <script src="../../../assets/js/backButton.js"></script>
    <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>