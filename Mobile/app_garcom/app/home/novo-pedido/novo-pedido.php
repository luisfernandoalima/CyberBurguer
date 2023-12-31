<?php
include_once(__DIR__ . '/../../php/conn.php');
$burguer = $sql->query("SELECT * FROM burguer");
$bebida = $sql->query("SELECT * FROM bebida");
$molhos = $sql->query("SELECT * FROM molho");
$acomp = $sql->query("SELECT * FROM acompanhamento");
$sobremesa = $sql->query("SELECT * FROM sobremesa");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/home/novo-pedido.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Meu perfil</title>
</head>

<body>
    <header class="cabeçalho" style="right: 0;">
        <h1><span>//</span>Cyberburguer</h1>
        <i class="fa-solid fa-arrow-left backButton" style="color: #FF006B;"></i>
    </header>
    <main>
        <form id="pedido-form" action="../../php/pedidos/Add_Info_Comanda.php" class="container" onsubmit="event.preventDefault(); enviarCarrinhoParaPHP();">
            <div class="inputArea row">
                <label for="" class="col-5">Mesa</label> <input type="text" name="mesa" id="mesa" class="col-7">
            </div>
            <div class="inputArea row">
                <label for="" class="col-5">Comanda</label> <input type="text" name="comanda" id="comanda" class="col-7">
            </div>
            <div class="inputArea">
                <div class="row">
                    <label for="" class="col-5">Pedido</label>
                    <div class="row col-12" style="width: 100%; margin: auto;">
                        <input type="text" name="" id="codPedido" class="col-7" oninput="buscarProduto()">
                        <select name="select" id="" class="col-5">
                            <option value="Hamburguer">Hamburguer</option>
                            <option value="Bebida">Bebida</option>
                            <option value="Acompanhamento">Acompanhamento</option>
                            <option value="Sobremesa">Sobremesa</option>
                            <option value="Molhos">Molhos</option>
                        </select>
                    </div>
                </div>
                <div class="itensPedido container">
                    <table class="Hamburguer">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Código</th>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($burguer as $infoBurguer) : ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $infoBurguer['id_burguer']; ?></td>
                                    <td><?php echo $infoBurguer['nome']; ?></td>
                                    <td><a href="#"><i class="fa-solid fa-check" style="color: #ffffff;" onclick="adicionarProdutoAoCarrinho('<?php echo $infoBurguer['nome']; ?>', 'Hamburguer', <?php echo $infoBurguer['id_burguer']; ?>)"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="Bebidas">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Código</th>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bebida as $infoBebida) : ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $infoBebida['id_bebida'] ?></td>
                                    <td><?php echo $infoBebida['nome'] ?></td>
                                    <td><a href="#"><i class="fa-solid fa-check" style="color: #ffffff;" onclick="adicionarProdutoAoCarrinho('<?php echo $infoBebida['nome']; ?>', 'Bebida', <?php echo $infoBebida['id_bebida']; ?>)"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="Acompanhamento">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Código</th>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($acomp as $infoAcomp) : ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $infoAcomp['id_acompanhamento'] ?></td>
                                    <td><?php echo $infoAcomp['nome'] ?></td>
                                    <td><a href="#"><i class="fa-solid fa-check" style="color: #ffffff;" onclick="adicionarProdutoAoCarrinho('<?php echo $infoAcomp['nome']; ?>', 'Acompanhamento', <?php echo $infoAcomp['id_acompanhamento']; ?>)"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="Sobremesa">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Código</th>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sobremesa as $infosobremesa) : ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $infosobremesa['id_sobremesa']; ?></td>
                                    <td><?php echo $infosobremesa['nome']; ?></td>
                                    <td><a href="#"><i class="fa-solid fa-check" style="color: #ffffff;" onclick="adicionarProdutoAoCarrinho('<?php echo $infosobremesa['nome']; ?>', 'Sobremesa', <?php echo $infosobremesa['id_sobremesa']; ?>)"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="Molhos">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Código</th>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($molhos as $infomolhos) : ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $infomolhos['id_molho']; ?></td>
                                    <td><?php echo $infomolhos['nome']; ?></td>
                                    <td><a href="#"><i class="fa-solid fa-check" style="color: #ffffff;" onclick="adicionarProdutoAoCarrinho('<?php echo $infomolhos['nome']; ?>', 'Molhos', <?php echo $infomolhos['id_molho']; ?>)"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="inputArea">
                <div class="row">
                    <label for="" class="col-6">Obs.</label>
                    <textarea name="obs" id="obs"></textarea>
                </div>
            </div>
            <div class="popUpCart hidden">
                <div class="popUpArea ">
                    <div class="popUpMain">
                        <div class="row">
                            <h2 class="col-10">Confirmar</h2>
                            <i class="fa-regular fa-circle-xmark col-2 btnFechar" style="color: #ffffff;"></i>
                        </div>
                        <div class="pedidos">
                            <div class="container">
                                <div class="pedido" id="itensCarrinho">
                                    <div class="row">
                                        <input type="text" readonly class="col-7 inputNomeProduto">
                                        <input type="text" name="" id="" class="col-3 inputQtdProduto">
                                        <button class="col-2" style="display: flex; justify-content: center;">
                                            <i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btnEnviar" name=>
                        <button name="produtos">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="container" style="width: 95%;">
            <button class="btnCarrinho"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></button>
        </div>
    </main>

    <div class="fundo disable"></div>
    <div class="popUpDiv disable">
        <div class="popUpArea ">
            <div class="popUpMain">
                <h2>Detalhes:</h2>
                <ul>
                    <li></li>
                </ul>
            </div>
            <div class="popUpButton">
                <button>Fechar</button>
            </div>
        </div>
    </div>
    <!--Bibliotecas-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <!--JS-->
    <script src="../../../assets/js/home.js/novo-pedido.js"></script>
    <script>
        function buscarProduto() {
            const termoBusca = $('#codPedido').val().toLowerCase();

            // Para cada tabela (Hamburguer, Bebidas, Acompanhamento, Sobremesa, Molhos)
            ['Hamburguer', 'Bebidas', 'Acompanhamento', 'Sobremesa', 'Molhos'].forEach(tipo => {
                $(`.${tipo} tbody tr`).each(function() {
                    const nomeProduto = $(this).find('td:nth-child(2)').text().toLowerCase();

                    // Mostra ou esconde a linha com base no termo de busca
                    if (nomeProduto.includes(termoBusca)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        }
    </script>

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
<script>
    // Codigo refrente a adicção e cancelamento de produtos no carrinho de compras 
    let carrinho = []; //Vetor carrinho

    function adicionarProdutoAoCarrinho(nomeProduto, tipoProduto, idProduto) { //Elementos que quero adicionar o produto no carrinho 
        const produtoExistente = carrinho.find(item => item.nome === nomeProduto && item.tipo === tipoProduto);
        if (produtoExistente) {
            produtoExistente.quantidade++; //Se já existir o produto adiciona uma unidade ao produto 
        } else {
            carrinho.push({ //Caso não, adiciona o produto ao carrinho
                nome: nomeProduto,
                tipo: tipoProduto,
                id: idProduto,
                quantidade: 1,
                idPedido: 1,
            });
        }
        atualizarCarrinhoNaInterface();
    }

    function atualizarCarrinhoNaInterface() {
        const itensCarrinho = document.getElementById('itensCarrinho'); //A div onde se encontra o carrinho de compras 
        itensCarrinho.innerHTML = '';
        carrinho.forEach(produto => {
            const item = document.createElement('div'); //Crio uma div 
            item.innerHTML = ` 
            <div class="row">
                <input type="text" readonly class="col-7 inputNomeProduto" value="${produto.nome}">
                <input type="text" name="" class="col-3 inputQtdProduto" value="${produto.quantidade}">
                <button class="col-2" style="display: flex; justify-content: center;">
                    <i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i>
                </button>
            </div>
        `; //Elemento que irei repetir cada vez que adicionar um produto ao carrinho, ou adicionar uma quantidade 
            const removerBotao = item.querySelector('button'); // Seleciona o botão "Remover"
            removerBotao.addEventListener('click', () => removerProdutoDoCarrinho(produto.id, produto.tipo));
            itensCarrinho.appendChild(item);
        });
    }

    function removerProdutoDoCarrinho(id, tipo) {
        const produtoIndex = carrinho.findIndex(item => item.id === id && item.tipo === tipo);
        if (produtoIndex !== -1) {
            carrinho.splice(produtoIndex, 1);
            atualizarCarrinhoNaInterface();
        }
    }
    //FIM
    //Enviar pedido e pegar via PHP 
    // ! Importante, ele é envidado via JSON, ou seja no PHP tem que decodificar 
    function enviarCarrinhoParaPHP() {
        const mesa = document.getElementById('mesa').value;
        const comanda = document.getElementById('comanda').value;
        const idPedido = 1;
        const obs = document.getElementById('obs').value;

        const produtosParaEnviar = carrinho.map(produto => ({
            nome: produto.nome,
            //tipo: produto.tipo,
            //id: produto.id,
            quantidade: produto.quantidade,
            //idPedido: produto.idPedido
        }));
        const pedido = {
            mesa: mesa,
            comanda: comanda,
            idPedido: idPedido,
            produtos: produtosParaEnviar,
            obs: obs,
        };

        const formData = new FormData();
        formData.append('pedido', JSON.stringify(pedido)); // codificação em JSON 
        formData.append('produtos', JSON.stringify(produtosParaEnviar)); //codificação em JSON 

        if (typeof produtosParaEnviar === 'object') {
            //console.log("Dados do carrinho em JSON: " + JSON.stringify(produtosParaEnviar)); 
            console.log("Dados do pedido em JSON: " + JSON.stringify(pedido));
        } else {
            console.error("Os dados do carrinho não estão no formato JSON válido.");
        }
        const headers = new Headers({
            'Content-Type': 'application/json'
        });


        fetch('../../php/pedidos/Add_Info_Comanda.php', {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(pedido)
            })
            .then(response => response.text())
            .then(result => {
                alert("Pedido realizado com sucesso");
                setTimeout(() => {
                    window.location.href = '../home.php'; // Substitua 'URL_DA_NOVA_PAGINA' pela URL desejada
                }, 100); // Tempo em milissegundos (neste exemplo, 2 segundos)
            })
            .catch(error => {
                console.error("Erro na solicitação Fetch:", error);
            });
    }




    /*
        function enviarCarrinhoParaPHP() {
        const produtosParaEnviar = carrinho.map(produto => ({
            nome: produto.nome,
            tipo: produto.tipo,
            id: produto.id,
            quantidade: produto.quantidade
        }));

        const formData = new FormData();
        formData.append('produtos', JSON.stringify(produtosParaEnviar)); //codificação em JSON 

        if (typeof produtosParaEnviar === 'object') {
        console.log("Dados do carrinho em JSON: " + JSON.stringify(produtosParaEnviar)); 
        } else {
            console.error("Os dados do carrinho não estão no formato JSON válido.");
        }
        const headers = new Headers({
            'Content-Type': 'application/json'
        });


        fetch('../../../PHP/Add_Info_Comanda.php', {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(produtosParaEnviar)
        })
        .then(response => response.text())
        .then(result => {
            console.log(result);
        })
        .catch(error => {
            console.error("Erro na solicitação Fetch:", error);
        });
    }
    */
</script>

</html>