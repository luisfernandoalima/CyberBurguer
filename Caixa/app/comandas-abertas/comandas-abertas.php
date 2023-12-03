<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão

$comandas = $sql->query("SELECT * FROM pedidos WHERE situacao = 'PREPARANDO'");
$comandaNumbers = array();

while ($comanda = mysqli_fetch_assoc($comandas)) {
    $comandaNumbers[] = $comanda['comanda'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/pedidos-abertos/pedidos-abertos.css">
    <title>Comandas Abertas</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span>
                    <a href="../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span class="active">
                    <a href="../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../area-do-cliente/area-do-cliente.php">
                        <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
            </nav>
            <aside class="sidebar-header">
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc; ?></span>
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
                <a href="../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../PHP/sair_sessao_Caixa.php">Sair</a>
            </aside>
        </header>
        <main>
            <div class="pedidosAbertosArea">
                <div class="container">
                
                    <h1>Comandas Abertas</h1>
                    <hr class="linha">
                    <div class="pedidosAbertosItems barra">
                    <?php foreach ($comandas as $index => $comanda): ?>
                        <div class="pedidosAbertosItemsArea">
                        <input type="radio" name="Comanda" id="comanda_<?php echo $index; ?>" class="radioButton" data-comanda="<?php echo $comanda['comanda']; ?>">
                            <label for="1" class="optionComanda">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="numComanda"><?php echo $comanda['comanda'];?></p>
                                        </div>
                                        <div class="col-3">
                                            <p class="btnVerPedido" data-comanda="<?php echo $comanda['comanda']; ?>">Ver pedido</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="horaPedido"><?php echo $comanda['horaPedido']; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p><?php echo "mim"?></p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="optionButtonArea">
                        <button class="btnExcluirPedido" id="btnExcluirPedido" data-comanda="">Excluir</button>
                        <button class="btnConcluirPedido" id="btnConcluirPedido" data-comanda="' "'>Concluir</button>    
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUpPediodo popDown">
                <div>
                    <div class="popUpHeader">
                        <h2> <span></span></h2>
                        <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container barra">
                    </div>
                </div>
            </aside>
        </div>
        <div class="opaco opacoConfirmEx popDown">
            <aside class="popUp popUpConfirmEx popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Comanda <span class="numComandaArea">111</span></h2>
                        <button class="fecharPopUpConfirm"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfoo container barra">
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/pedidos-abertos/pedidos-abertos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


<script>
//Codigo Referente ao botão VER MAIS 
document.addEventListener('DOMContentLoaded', function () {
    var btnsVerPedido = document.querySelectorAll('.btnVerPedido');
    btnsVerPedido.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var comandaNumero = btn.getAttribute('data-comanda');

            // Faz a solicitação Fetch para obter as informações do pedido
            fetch('../../PHP/pegarItensComanda.php?comanda=' + comandaNumero, {
                method: 'GET'
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.length === 0) {
                    console.log('Nenhum dado encontrado para a comanda ' + comandaNumero);
                    return;
                }

                document.querySelector('.popUpHeader span').textContent = 'Comanda ' + comandaNumero;

                var popUpInfo = document.querySelector('.popUpInfo');
                popUpInfo.innerHTML = '';
                var totalPreco = 0;

                data.forEach(function (item) {
                    var itemContainer = document.createElement('div');
                    itemContainer.classList.add('itemPedido');      
                    //Toda vez que quiser exibir algo pegue esass duas linhas e mude o nome da variavel
                    //e para exibir o item tem que ser item. se for da tabela além da tabela pedidos 
                    //tem que ser o nome do campo _ nome da tabela onde se encontra esse campo 
                    if (item.id){
                        var itemMesa = document.createElement('p');
                        itemMesa.textContent = 'Mesa: ' + item.id;
                        itemContainer.appendChild(itemMesa);
                    }
                    if (item.nome_burguer){
                        var itemNomeB = document.createElement('p');
                        //Como nesse caso onde é item.nome(o que eu quero)_burguer(tabela no banco onde encontra esse dado)
                        itemNomeB.textContent = 'Nome do Hamburguer: ' + item.nome_burguer + ' - Preço: ' + item.preco_burguer + ' - Quantidade: ' + item.qtd + 'X';
                        itemContainer.appendChild(itemNomeB);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_burguer) * parseInt(item.qtd);
                    }
                    if (item.nome_bebida){
                        var itemNomeBeb = document.createElement('p');
                        itemNomeBeb.textContent = 'Nome da Bebida: ' + item.nome_bebida + ' - Preço: ' + item.preco_bebida + ' - Quantidade: ' + item.qtdbeb + 'X';
                        itemContainer.appendChild(itemNomeBeb);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_bebida) * parseInt(item.qtdbeb);
                    }
                    if(item.nome_acompanhamento){
                        var itemNomeAcom = document.createElement('p');
                        itemNomeAcom.textContent = 'Nome do Acompanhamento: ' + item.nome_acompanhamento + ' - Preço: ' + item.preco_acompanhamento + ' - Quantidade: ' + item.qtdacomp + 'X';
                        itemContainer.appendChild(itemNomeAcom);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_acompanhamento) * parseInt(item.qtdacomp);

                    }
                    if(item.nome_sobremesa){
                        var itemNomeSobre = document.createElement('p');
                        itemNomeSobre.textContent = 'Nome da Sobremesa: ' + item.nome_sobremesa + ' - Preço: ' + item.preco_sobremesa + ' - Quantidade: ' + item.qtdsobremesa + 'X';
                        itemContainer.appendChild(itemNomeSobre);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_sobremesa) * parseInt(item.qtdsobremesa);
                    }
                    if(item.obs){
                        var itemObs = document.createElement('p');
                        itemObs.textContent = 'Observação do Pedido: ' + item.obs;
                        itemContainer.appendChild(itemObs);

                    }
                    popUpInfo.appendChild(itemContainer);
                });
                //Para exibir o preço total 
                var precoTotalContainer = document.createElement('p');
                precoTotalContainer.textContent = 'Preço Total: R$ ' + totalPreco.toFixed(2); //Soma total do preço e nnumero de casas decimais do valor 
                popUpInfo.appendChild(precoTotalContainer);

                document.querySelector('.popUpPediodo').classList.remove('popDown');
            })
            .catch(error => console.error('Erro ao obter dados do pedido:', error));
        });
    });

        document.querySelector('.fecharPopUp').addEventListener('click', function () {
        document.querySelector('.popUpPediodo').classList.add('popDown');
    });
});

//FIM 
function getHoraAtual() {
    return fetch('../../PHP/pegarHoraAtual.php')
        .then(response => response.json())
        .then(data => data.horaAtual)
        .catch(error => console.error('Erro ao obter a hora atual:', error));
}

function atualizarTempos() {
    var horaPedidos = document.querySelectorAll('.horaPedido');

    horaPedidos.forEach(function (horaPedido) {
        var horaPedidoTexto = horaPedido.textContent;
        var comandaNumero = horaPedido.closest('.pedidosAbertosItemsArea').querySelector('.radioButton').dataset.comanda;

        getHoraAtual().then(function (horaAtual) {
            var timestampPedido = new Date(horaPedidoTexto).getTime() / 1000;
            var diferencaMinutos = Math.floor((horaAtual - timestampPedido) / 60);

            var ultimaColuna = horaPedido.closest('.pedidosAbertosItemsArea').querySelector('.col-3:last-child p');

            if (diferencaMinutos < 1) {
                // Se menos de 1 minuto, exiba "Agora pouco"
                ultimaColuna.textContent = 'Agora pouco';
            } else if (diferencaMinutos <= 40) {
                // Se 1 a 40 minutos, exiba os minutos decorridos
                ultimaColuna.textContent = diferencaMinutos + ' Minutos atrás';
            } else {
                // Mais de 40 minutos
                if (diferencaMinutos >= 1440) {
                    // Mais de 24 horas, converta para dias e horas
                    var diferencaDias = Math.floor(diferencaMinutos / 1440);
                    var diferencaHoras = Math.floor((diferencaMinutos % 1440) / 60);

                    // Exiba dias e horas
                    ultimaColuna.textContent = diferencaDias + ' Dias ' + 'e ' + + diferencaHoras + ' Horas atrás';
                } else {
                    // Menos de 24 horas, exiba como horas atrás
                    var diferencaHoras = Math.floor(diferencaMinutos / 60);
                    ultimaColuna.textContent = diferencaHoras + ' Horas atrás';
                }
            }
        }).catch(error => console.error('Erro ao atualizar tempos:', error));
    });
}

// Atualizar os tempos imediatamente após o carregamento e, em seguida, a cada 1 minuto
atualizarTempos();
setInterval(atualizarTempos, 60000); // 60000 milissegundos = 1 minuto

//Concluir pedido
//Baseado na Gambiarra 
document.addEventListener("DOMContentLoaded", function () {
    var comandaNumero;
    document.querySelectorAll(".pedidosAbertosItemsArea").forEach(function (div) {
        div.addEventListener("click", function () {
            var radioButton = div.querySelector(".radioButton");

            if (radioButton && radioButton.dataset && radioButton.dataset.comanda) {
                var comanda = radioButton.dataset.comanda;
                document.querySelector('.numComandaArea').textContent = comanda;
                document.getElementById("btnConcluirPedido").dataset.comanda = comanda;
                comandaNumero = comanda;
            } else {
                console.error("Erro: Não foi possível obter o valor do atributo data-comanda.");
            }
        });
    });

    document.getElementById("btnConcluirPedido").addEventListener("click", function () {
        var comanda = this.dataset.comanda;

        if (comanda) {
            fetch('../../PHP/pegarItensComanda.php?comanda=' + comanda, {
                method: 'GET'
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                //console.log("Data recebida:", data);
                if (data.length === 0) {
                    console.log('Nenhum dado encontrado para a comanda ' + comandaNumero);
                    return;
                }
                var popUpInfo = document.querySelector('.popUpInfoo');
                popUpInfo.innerHTML = '';
                var totalPreco = 0;

                data.forEach(function (item) {
                console.log("Item:", item);
                var itemContainer = document.createElement('div');
                itemContainer.classList.add('itemPedido');
                if (item.mesa){
                        var itemMesa = document.createElement('p');
                        itemMesa.textContent = 'Mesa: ' + item.mesa;
                        itemContainer.appendChild(itemMesa);
                    }
                    if (item.id) {
                        var itemid = document.createElement('p');
                        itemid.textContent = 'Id do pedido: ' + item.id;
                        itemContainer.appendChild(itemid);
                    }
                    if (item.nome_burguer){
                        var itemNomeB = document.createElement('p');
                        //Como nesse caso onde é item.nome(o que eu quero)_burguer(tabela no banco onde encontra esse dado)
                        itemNomeB.textContent = 'Nome do Hamburguer: ' + item.nome_burguer + ' - Preço: ' + item.preco_burguer + ' - Quantidade: ' + item.qtd + 'X';
                        itemContainer.appendChild(itemNomeB);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_burguer) * parseInt(item.qtd);
                    }
                    if (item.nome_bebida){
                        var itemNomeBeb = document.createElement('p');
                        itemNomeBeb.textContent = 'Nome da Bebida: ' + item.nome_bebida + ' - Preço: ' + item.preco_bebida + ' - Quantidade: ' + item.qtdbeb + 'X';
                        itemContainer.appendChild(itemNomeBeb);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_bebida) * parseInt(item.qtdbeb);
                    }
                    if(item.nome_acompanhamento){
                        var itemNomeAcom = document.createElement('p');
                        itemNomeAcom.textContent = 'Nome do Acompanhamento: ' + item.nome_acompanhamento + ' - Preço: ' + item.preco_acompanhamento + ' - Quantidade: ' + item.qtdacomp + 'X';
                        itemContainer.appendChild(itemNomeAcom);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_acompanhamento) * parseInt(item.qtdacomp);

                    }
                    if(item.nome_sobremesa){
                        var itemNomeSobre = document.createElement('p');
                        itemNomeSobre.textContent = 'Nome da Sobremesa: ' + item.nome_sobremesa + ' - Preço: ' + item.preco_sobremesa + ' - Quantidade: ' + item.qtdsobremesa + 'X';
                        itemContainer.appendChild(itemNomeSobre);
                        //Pega o item e multiplica pela quantidade com numeros Float (aceita virgula)
                        totalPreco += parseFloat(item.preco_sobremesa) * parseInt(item.qtdsobremesa);
                    }
                    if(item.obs){
                        var itemObs = document.createElement('p');
                        itemObs.textContent = 'Observação do Pedido: ' + item.obs;
                        itemContainer.appendChild(itemObs);

                    }
                    popUpInfo.appendChild(itemContainer);
                    var precoTotalContainer = document.createElement('p');
                    precoTotalContainer.textContent = 'Preço Total: R$ ' + totalPreco.toFixed(2); //Soma total do preço e nnumero de casas decimais do valor 
                    popUpInfo.appendChild(precoTotalContainer);
                    document.querySelector('.popUpConfirmEx').classList.remove('popDown');
                });

                var btnConcluirPedidoFinal = document.createElement('button');
                btnConcluirPedidoFinal.textContent = 'Concluir pedido';
                btnConcluirPedidoFinal.id = 'btnConcluirPedidoFinal';
                btnConcluirPedidoFinal.addEventListener('click', function() {
                    
                var idPedidoElement = Array.from(document.querySelectorAll('.itemPedido p')).find(p => p.textContent.includes('Id do pedido'));
                var idPedido = idPedidoElement ? idPedidoElement.textContent.split(': ')[1].trim() : null;

                var precoTotalElement = Array.from(document.querySelectorAll('.popUpInfoo p')).find(p => p.textContent.includes('Preço Total'));
                var precoTotal = precoTotalElement ? parseFloat(precoTotalElement.textContent.split(': ')[1].replace('R$ ', '').trim()) : null;

                var idFuncionario = <?php echo $idFunc; ?>;
                //variavel que amarzena todos os dados que eu quero 
                var dadosParaEnviar = {
                    idPedido: idPedido,
                    precoTotal: precoTotal,
                    idFuncionario: idFuncionario,
                    // Adicione outros dados conforme necessário
                };
                console.log("Dados para enviar:", dadosParaEnviar);
                if (Object.keys(dadosParaEnviar).length === 0) {
                console.error("Dados para enviar estão vazios ou não são um objeto.");
            }

                var formData = new FormData();
                for (var key in dadosParaEnviar) {
                    formData.append( key, JSON.stringify (dadosParaEnviar[key]));
                }
                //console.log("Dados enviadosT:", dadosParaEnviar); // Adicione esta linha para verificar os dados antes de enviar

                fetch('../../PHP/EnviaInfoPag.php', {
                    method: 'POST',
                    body: JSON.stringify(dadosParaEnviar),
                    
                    // Não defina explicitamente o Content-Type, o navegador lidará com isso automaticamente
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Você será redirecionado para a pagina de pagamento!');
                    setTimeout(function() {
                    window.location.href = "pagamento/pagamento.php";
                }, 100);
                })
                .catch(error => {
                    alert.error('Erro ao enviar dados para o servidor:', error);
                });
            });

                popUpInfo.appendChild(btnConcluirPedidoFinal);

            })
            .catch(error => console.error('Erro ao obter dados do pedido:', error));
        } else {
            console.error("Erro: Valor do atributo data-comanda não está definido.");
        }
    });
});
//FIM Concluir pedido

//Parte Referente ao botão Excluir
document.addEventListener("DOMContentLoaded", function () {
    var comandaNumero;

    document.querySelectorAll(".pedidosAbertosItemsArea").forEach(function (div) {
        div.addEventListener("click", function () {
            var radioButton = div.querySelector(".radioButton");

            if (radioButton && radioButton.dataset && radioButton.dataset.comanda) {
                var comanda = radioButton.dataset.comanda;
                document.querySelector('.numComandaArea').textContent = comanda;
                document.getElementById("btnExcluirPedido").dataset.comanda = comanda;
                comandaNumero = comanda;
            } else {
                console.error("Erro: Não foi possível obter o valor do atributo data-comanda.");
            }
        });
    });
        document.getElementById('btnExcluirPedido').addEventListener('click', function () {
            var comanda = this.dataset.comanda;
            fetch('../../PHP/excluir_pedido.php?comanda=' + comandaNumero, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ numeroComanda: comandaNumero }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.status === 'success') {
                alert('Comanda de numero: ' + data.comanda + ' Excluida com sucesso!');
                }
            })
            .catch(error => console.error('Erro na solicitação Fetch:', error));
        });
});
</script>
</body>
</html>