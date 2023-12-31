<?php
include_once(__DIR__ . '/../../../php/pedidos/listar-editar-pedidos.php');
include_once(__DIR__ . '/../../../php/pedidos/alterar-editar-pedidos.php');
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['emailSession']) || !isset($_SESSION['senhaSession'])) {
    header("location: ../../login/erro.html");
    exit;
}

$burguersFeitos = obterBurguersPorPedido($idPedido);
$bebidaFeitos = obterBebidasPorPedido($idPedido);
$acompanhamentosFeitos = obterAcompPorPedido($idPedido);
$molhosFeitos = obterMolhoPorPedido($idPedido);
$sobreFeitos = obterSobrePorPedido($idPedido);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../../assets/css/home/editar-pedidos.css">
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
        <h2>Pedido <span><?php echo $idPedido ?></span></h2>
        <br>
        <div class="pedidosArea container">
            <div class="pedidoDiv">
                <h4>Horário: <span class="Hora"><?= date('H:i:s', strtotime($horaPedido)); ?></span></h4>
                <h5>(<span class="difTempo"></span>) minutos atrás</h5>
                <h4>Situação: <span></span></h4>
                <form action="../../../php/pedidos/alterar-editar-pedidos.php" method="post">
                    <div class="inputEdit row" style="visibility: hidden;">
                        <label for="" class="col-4">Pedido</label><input type="text" id="idPedido" name="idPedido" readonly class="col-8" value="<?php echo '    ' . $idPedido ?>">
                    </div>

                    <div class="inputEdit row">
                        <label for="" class="col-4">Comanda</label><input type="text" readonly class="col-8" value="<?php echo '    ' . $comanda ?>">
                    </div>
                    <div class="inputEdit row">
                        <label for="" class="col-4">Mesa</label><input type="text" readonly class="col-8" value="<?php echo '    ' . $mesa ?>">
                    </div>
                    <h4 id="itensPedidos">Itens pedidos:</h4>
                    <div class="inputEdit itensPedidos">
                        <div class="row">

                            <input type="text" readonly class="col-7 inputNomeProduto" value="<?php foreach ($burguersFeitos as $burguer) {
                                                                                                    echo $burguer['nome'];
                                                                                                } ?>">

                            <input type="text" name="qtdburguer" id="qtdburguer" class="col-3 inputQtdProduto" value=" <?php foreach ($burguersFeitos as $burguer) {
                                                                                                                            echo $burguer['quantidade'];
                                                                                                                        } ?>">

                            <button id="burguer" class="col-2" style="display: flex; justify-content: center;" data-id-pedido1="<?php echo $idPedido; ?>">
                                <i class="fa-regular fa-circle-xmark" style="color: var(--rosa3);"></i>
                            </button>
                        </div>
                    </div>
                    <div class="inputEdit itensPedidos">
                        <div class="row">
                            <input type="text" readonly class="col-7 inputNomeProduto" value="<?php foreach ($bebidaFeitos as $bebida) {
                                                                                                    echo $bebida['nome'];
                                                                                                } ?>">
                            <input type="text" name="qtdbebida" id="qtdbebida" class="col-3 inputQtdProduto" value="<?php foreach ($bebidaFeitos as $bebida) {
                                                                                                                        echo $bebida['quantidade'];
                                                                                                                    } ?>">
                            <button id="bebida" class="col-2" style="display: flex; justify-content: center;" data-id-pedido2="<?php echo $idPedido; ?>">
                                <i class="fa-regular fa-circle-xmark" style="color: var(--rosa3);"></i>
                            </button>
                        </div>
                    </div>

                    <div class="inputEdit itensPedidos">
                        <div class="row">
                            <input type="text" readonly class="col-7 inputNomeProduto" value="<?php foreach ($acompanhamentosFeitos as $acompanhamento) {
                                                                                                    echo $acompanhamento['nome'];
                                                                                                } ?>">
                            <input type="text" name="qtdacomp" id="qtdacomp" class="col-3 inputQtdProduto" value="<?php foreach ($acompanhamentosFeitos as $acompanhamento) {
                                                                                                                        echo $acompanhamento['quantidade'];
                                                                                                                    } ?>">
                            <button id="acompanhamento" class="col-2" style="display: flex; justify-content: center;" data-id-pedido3="<?php echo $idPedido; ?>">
                                <i class="fa-regular fa-circle-xmark" style="color: var(--rosa3);"></i>
                            </button>
                        </div>
                    </div>

                    <div class="inputEdit itensPedidos">
                        <div class="row">
                            <input type="text" readonly class="col-7 inputNomeProduto" value="<?php foreach ($molhosFeitos as $molhos) {
                                                                                                    echo $molhos['nome'];
                                                                                                } ?>">
                            <input type="text" name="qtdmolhos" id="qtdmolhos" class="col-3 inputQtdProduto" value="<?php foreach ($molhosFeitos as $molhos) {
                                                                                                                        echo $molhos['quantidade'];
                                                                                                                    } ?>">
                            <button id="molho" class="col-2" style="display: flex; justify-content: center;" data-id-pedido4="<?php echo $idPedido; ?>">
                                <i class="fa-regular fa-circle-xmark" style="color: var(--rosa3);"></i>
                            </button>
                        </div>
                    </div>

                    <div class="inputEdit itensPedidos">
                        <div class="row">
                            <input type="text" readonly class="col-7 inputNomeProduto" value="<?php foreach ($sobreFeitos as $sobre) {
                                                                                                    echo $sobre['nome'];
                                                                                                } ?>">
                            <input type="text" name="qtdsobre" id="qtdsobre" class="col-3 inputQtdProduto" value="<?php foreach ($sobreFeitos as $sobre) {
                                                                                                                        echo $sobre['quantidade'];
                                                                                                                    } ?>">
                            <button id="sobremesa" class="col-2" style="display: flex; justify-content: center;" data-id-pedido5="<?php echo $idPedido; ?>">
                                <i class="fa-regular fa-circle-xmark" style="color: var(--rosa3);"></i>
                            </button>
                        </div>
                    </div>

                    <div class="btnArea">
                        <input type="submit" name="salvar" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!--JS-->
    <script src="../../../../assets/js/home.js/pedidos-feitos.js"></script>
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
                xhrAtualizar.open("GET", "../../../php/atualizar_chamada.php", true);
                xhrAtualizar.send();
            }
        }
    };

    // Faz uma solicitação GET para o script PHP que verifica a mesa chamando
    xhr.open("GET", "../../../php/notificar.php", true);
    xhr.send();
}

// Chama a função verificarMesaChamando a cada 3 segundos
setInterval(verificarMesaChamando, 3000);
    </script>
    <script src="../../../../assets/js/backButton.js"></script>
    <!--JS Botão cancelar-->
    <script>
        document.getElementById("burguer").addEventListener("click", function(event) {
            // Evite o envio do formulário
            event.preventDefault();

            // Obtenha o idPedido do atributo de dados
            var idPedido1 = this.getAttribute("data-id-pedido1");

            // Execute a sua função separada aqui
            cancelaBurguer(idPedido1);
        });

        function cancelaBurguer(idPedido1) {
            // Realizar uma solicitação AJAX para o script PHP com o idPedido
            var xhr = new XMLHttpRequest();
            var url = "../../../php/pedidos/excluir-editar-pedidos.php?idPedido1=" + idPedido1;
            xhr.open("GET", url, true);
            xhr.send();

            // Manipular a resposta, se necessário
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
        }
    </script>

    <script>
        document.getElementById("bebida").addEventListener("click", function(event) {
            // Evite o envio do formulário
            event.preventDefault();

            // Obtenha o idPedido do atributo de dados
            var idPedido2 = this.getAttribute("data-id-pedido2");

            // Execute a sua função separada aqui
            cancelaBebida(idPedido2);
        });

        function cancelaBebida(idPedido2) {
            // Realizar uma solicitação AJAX para o script PHP com o idPedido
            var xhr = new XMLHttpRequest();
            var url = "../../../php/pedidos/excluir-editar-pedidos.php?idPedido2=" + idPedido2;
            xhr.open("GET", url, true);
            xhr.send();

            // Manipular a resposta, se necessário
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
        }
    </script>

    <script>
        document.getElementById("acompanhamento").addEventListener("click", function(event) {
            // Evite o envio do formulário
            event.preventDefault();

            // Obtenha o idPedido do atributo de dados
            var idPedido3 = this.getAttribute("data-id-pedido3");

            // Execute a sua função separada aqui
            cancelaAcompanhamento(idPedido3);
        });

        function cancelaAcompanhamento(idPedido3) {
            // Realizar uma solicitação AJAX para o script PHP com o idPedido
            var xhr = new XMLHttpRequest();
            var url = "../../../php/pedidos/excluir-editar-pedidos.php?idPedido3=" + idPedido3;
            xhr.open("GET", url, true);
            xhr.send();

            // Manipular a resposta, se necessário
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
        }
    </script>
 
<script>
        document.getElementById("molho").addEventListener("click", function(event) {
            // Evite o envio do formulário
            event.preventDefault();

            // Obtenha o idPedido do atributo de dados
            var idPedido4 = this.getAttribute("data-id-pedido4");

            // Execute a sua função separada aqui
            cancelaMolho(idPedido4);
        });

        function cancelaMolho(idPedido4) {
            // Realizar uma solicitação AJAX para o script PHP com o idPedido
            var xhr = new XMLHttpRequest();
            var url = "../../../php/pedidos/excluir-editar-pedidos.php?idPedido4=" + idPedido4;
            xhr.open("GET", url, true);
            xhr.send();

            // Manipular a resposta, se necessário
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
        }
    </script>
    
<script>
        document.getElementById("sobremesa").addEventListener("click", function(event) {
            // Evite o envio do formulário
            event.preventDefault();

            // Obtenha o idPedido do atributo de dados
            var idPedido5 = this.getAttribute("data-id-pedido5");

            // Execute a sua função separada aqui
            cancelaSobremesa(idPedido5);
        });

        function cancelaSobremesa(idPedido5) {
            // Realizar uma solicitação AJAX para o script PHP com o idPedido
            var xhr = new XMLHttpRequest();
            var url = "../../../php/pedidos/excluir-editar-pedidos.php?idPedido5=" + idPedido5;
            xhr.open("GET", url, true);
            xhr.send();

            // Manipular a resposta, se necessário
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
        }
    </script>

    <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>