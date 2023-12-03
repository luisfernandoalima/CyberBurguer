<?php
session_start();
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão
$idPedido = $_SESSION['idPedido']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//echo $idPedido;
$precototal = $_SESSION['precoTotal']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//echo $precototal;
$idfuncionario = $_SESSION['idFuncionario']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//echo $idfuncionario;
$DadosPedSql = $sql->query("SELECT * FROM pedidos WHERE id = '$idPedido'");
if($DadosPedSql -> num_rows > 0 ){
    while($DadosPedido = mysqli_fetch_assoc($DadosPedSql)){
        $comanda = $DadosPedido['comanda'];
    }
}
$sqlb ="SELECT * FROM cliente";
$DadosCliSql = $sql->query($sqlb);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/pedidos-abertos/pagamento/pagamento.css">
    <title>Área de pagamento</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span>
                    <a href="../../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span class="active">
                    <a href="../../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../area-do-cliente/area-do-cliente.php">
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
                <a href="../../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../index.html">Sair</a>
            </aside>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="pedidoArea">
                            <h1>Comanda <span><?php echo $comanda; ?></span></h1>
                            <hr class="linha">
                            <div class="mainPedidoArea barra">
                            <details class="BtnVerMais" data-comanda="<?php echo $comanda; ?>">
                                    <summary>pedido <?php echo $idPedido;?></summary>
                                    <p>Valor: </p>
                                    <ul>
                                        <li>Sales Burguer <span>x1</span></li>
                                        <li>Sales Burguer <span>x1</span></li>
                                    </ul>
                                </details>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="confirmArea">
                            <div class="valor">
                                <label for="formaPagamento">Forma de pagamento:</label>
                                <select name="formaPagamento" id="formaPagamento">
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Crédito">Crédito</option>
                                    <option value="Débito">Débito</option>
                                    <option value="Pix">Pix</option>
                                </select>
                                <p>Valor da compra: <span class="numValor"></span></p>
                                <form action="">
                                    <input type="text" name="" id="cupom" placeholder="Cupom..." class="inputCupom">
                                </form>
                                <label for="nomeCliente" class="NomeCli" required>Nome do Cliente:</label>
                                <form action="">
                                    <input type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome do Cliente..." class="inputCliente">
                                </form>
                                <p>Valor do desconto: <span class="numValorDes"></span></p>
                                <p>Valor final: <span class="numValorTot"></span></p>
                            </div>
                            <div class="confirmCompra">
                                <form action="" id="Finalizar">
                                    <input type="text" id="" name="" style="position: absolute; left: -9999999px;">
                                </form>
                                <button id="BtnFinalizar">Finalizar compra</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../../assets/js/configPopUp.js"></script>
    <script src="../../../assets/js/pedidos-abertos/pagamento/pagamento.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    var valorDesconto = 0; //Zera o valor de desconto
    var formaPagamentoSelecionada = "Dinheiro"; //Gambiarra, já que o codigo não pegava o valor logo quando a pagina iniciava, iniciei a
    //variavel com o primeiro valor do option
    //Codigo relacionado ao numero da comanda e pegar itens no php
    var btnsVerPedido = document.querySelectorAll('.BtnVerMais');
    btnsVerPedido.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var comandaNumero = btn.getAttribute('data-comanda');
            var pedidoNumero = <?php echo $idPedido; ?>;

            fetch('../../../PHP/PegarItensPagamento.php?comanda=' + comandaNumero, {
                method: 'GET'
            })
            .then(response => {
                if (!response.ok){
                    throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Dados recebidos:', data);

                if (data.length === 0){
                    console.log('Nenhum dado encontrado para a comanda ' + comandaNumero);
                    return;
                }

                var totalPreco = 0;
                var listaItens = document.createElement('ul');

                data.forEach(function(item){
                    if (item.id){
                        var itemMesa = document.createElement('li');
                        itemMesa.textContent = 'Mesa: ' + item.id;
                        listaItens.appendChild(itemMesa);
                    }

                    if (item.nome_burguer){
                        var itemNomeB = document.createElement('li');
                        itemNomeB.textContent = 'Nome do Hamburguer: ' + item.nome_burguer + ' - Preço: R$ ' + item.preco_burguer + ' - Quantidade: ' + item.qtd + ' X';
                        listaItens.appendChild(itemNomeB);
                        totalPreco += parseFloat(item.preco_burguer) * parseInt(item.qtd);
                    }
                    if (item.nome_bebida){
                        var itemNomeBeb = document.createElement('li');
                        itemNomeBeb.textContent = 'Nome da Bebida: ' + item.nome_bebida + ' - Preço: R$ ' + item.preco_bebida + ' - Quantidade: ' + item.qtdbeb + ' X';
                        listaItens.appendChild(itemNomeBeb);
                        totalPreco += parseFloat(item.preco_bebida) * parseInt(item.qtdbeb);
                    }
                    if (item.nome_acompanhamento) {
                        var itemNomeAcom = document.createElement('li');
                        itemNomeAcom.textContent = 'Nome do Acompanhamento:' + item.nome_acompanhamento + '- Preço: R$ ' + item.preco_acompanhamento + '- Quantidade: ' + item.qtdacomp + ' X';
                        listaItens.appendChild(itemNomeAcom);
                        totalPreco += parseFloat(item.preco_acompanhamento) * parseInt(item.qtdacomp);
                    }
                    if (item.nome_sobremesa) {
                        var itemNomeAcom = document.createElement('li');
                        itemNomeAcom.textContent = 'Nome da Sobremesa: ' + item.nome_sobremesa + '- Preço: R$ ' + item.preco_sobremesa + '- Quantidade: ' + item.qtdsobremesa + ' X';
                        listaItens.appendChild(itemNomeAcom);
                        totalPreco += parseFloat(item.preco_sobremesa) * parseInt(item.qtdsobremesa);
                    }
                });

                btn.innerHTML = '<summary>pedido ' + pedidoNumero + '</summary>';
                btn.innerHTML += '<p>Valor: </p>';
                btn.appendChild(listaItens);

                btn.innerHTML += '<p>Preço Total: R$ ' + totalPreco.toFixed(2) + '</p>';

                document.querySelector('.numValor').textContent = totalPreco.toFixed(2);
                //FIM Codigo relacionado ao numero da comanda e pegar itens no php
                // Relacionado ao cupom
                const inputCupom = document.getElementById('cupom');
                const numValorSpanDesconto = document.querySelector('.numValorDes');
                const numValorSpanFinal = document.querySelector('.numValorTot');

                function aplicarDesconto() {
                    var cupom = inputCupom.value;
                    
                    // Verifica se o campo cupom está vazio
                    if (!cupom) {
                        valorDesconto = 0;
                        numValorSpanDesconto.textContent = valorDesconto.toFixed(2);

                        // Atualiza o valor final considerando o desconto
                        const diferenca = totalPreco - valorDesconto;
                        numValorSpanFinal.textContent = diferenca.toFixed(2);

                        // Define o valor padrão quando o campo está vazio
                        inputCupom.value = "NENHUM CUPOM SELECIONADO";
                        return;
                    }

                    fetch('../../../PHP/CodigoDesconto.php?cupom=' + encodeURIComponent(cupom), {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            valorDesconto = parseFloat(data.valorDesconto || 0);
                            const diferenca = totalPreco - valorDesconto;
                            numValorSpanFinal.textContent = diferenca.toFixed(2);
                            numValorSpanDesconto.textContent = valorDesconto.toFixed(2);

                            if (data.valido) {
                                alert('Cupom válido! Valor do desconto: ' + data.valorDesconto);
                            } else {
                                    // Se o cupom for inválido, realiza as ações desejadas
                                    valorDesconto = 0;
                                    numValorSpanDesconto.textContent = valorDesconto.toFixed(2);

                                    // Atualiza o valor final considerando o desconto
                                    const diferenca = totalPreco - valorDesconto;
                                    numValorSpanFinal.textContent = diferenca.toFixed(2);

                                    // Define o valor padrão quando o campo está vazio
                                    inputCupom.value = "NENHUM CUPOM SELECIONADO";

                                    alert('Cupom inválido!');
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                        });
                }

                // Adiciona um ouvinte de evento para o evento blur
                inputCupom.addEventListener('blur', aplicarDesconto);

                // Adiciona um ouvinte de evento para o evento focus
                inputCupom.addEventListener('focus', function () {
                    // Limpa o valor do desconto quando o campo recebe foco
                    valorDesconto = 0;
                    numValorSpanDesconto.textContent = valorDesconto.toFixed(2);
                });

                // Verifica se o campo cupom está vazio no início
                if (!inputCupom.value) {
                    aplicarDesconto();
                }
                const formaPagamentoSelect = document.getElementById('formaPagamento');

                formaPagamentoSelect.addEventListener('change', function () {
                    formaPagamentoSelecionada = formaPagamentoSelect.value;
                    console.log('Forma de pagamento selecionada:', formaPagamentoSelecionada);
                });
                // FIM Relacionado ao cupom
                // Relacionado à pegar o nome do cliente  
                const inputCliente = document.getElementById('nomeCliente');
                let timeoutId;

                function fazerPesquisa() {
                    clearTimeout(timeoutId);

                    timeoutId = setTimeout(function () {
                        var nomeCliente = inputCliente.value;
                        console.log(nomeCliente);

                        if (inputCliente.value === nomeCliente) {
                            fetch('../../../PHP/PegarDadosCli.php?nome=' + encodeURIComponent(nomeCliente), {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                            })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data);
                                    //nomeClienteResposta = data.Nome;
                                    idCli = data.Id;
                                    console.log(idCli);
                                    if (data.valido) {
                                        inputCliente.value = data.Nome;
                                        alert('Nome existente no sistema: ' + data.Nome);
                                    } else {
                                        inputCliente.value = "cliente nao cadastrado";
                                        alert('Nome não encontrado no banco de dados');
                                        fazerPesquisa();
                                    }
                                    
                                })
                                .catch(error => {
                                    console.error('Erro:', error);
                                });
                        }
                    }, 5);
                }
                //Usado para fazer a pesquisa somente quando o input perder o foco
                inputCliente.addEventListener('blur', fazerPesquisa);

                inputCliente.addEventListener('focus', function () {
                    clearTimeout(timeoutId);
                });
                // FIM do codigo usado para fazer a pesquisa somente quando o input perder o foco
                // !!! FIM Codigo Relacionado a procurar o nome do funcionario !!!
                //Codigo relacionado ao envio do formulario com as informações
                var formulario = document.querySelector('#Finalizar');
                var btnFinalizarCompra = document.querySelector('#BtnFinalizar');

                if (!formulario || !btnFinalizarCompra) {
                    console.error("Elementos não encontrados. Verifique os seletores.");
                    return;
                }

                btnFinalizarCompra.addEventListener('click', function (event) {
                    event.preventDefault();

                    var dadosParaEnviar = {
                    idPedido: <?php echo $idPedido; ?>,
                    idFuncionario: <?php echo $idfuncionario; ?>,
                    //nomeCliente: nomeClienteResposta,
                    idCli: idCli,
                    cupom: inputCupom.value,
                    valorDesconto: valorDesconto,
                    valorFinal: numValorSpanFinal.textContent,
                    formaPagamento: formaPagamentoSelecionada
                };

                console.log("Dados para enviar:", dadosParaEnviar);

                if (Object.keys(dadosParaEnviar).length === 0) {
                    console.error("Dados para enviar estão vazios ou não são um objeto.");
                }
                var formData = new FormData();

                // Adicione os dados do objeto ao FormData
                for (var key in dadosParaEnviar) {
                    formData.append(key, dadosParaEnviar[key]);
                }
                const headers = new Headers({
                'Content-Type': 'application/json'
            });

                    fetch('../../../PHP/CadastrarPedido.php', {
                        method: 'POST',
                        headers: headers,
                        body: JSON.stringify(dadosParaEnviar)
                    })
                    .then(response => response.text())
                    .then(result => {
                        console.log(result);
                        alert('Compra finalizada com sucesso!');
                    })
                    /*.then(response => {
                        if (!response.ok) {
                            throw new Error('Erro na solicitação Fetch: ' + response.statusText);
                        }
                        return response.json();
                    })*/
                    /*.then(data => {
                        console.log('Resposta do PHP:', data);
                        if (data.status === 'success') {
                            /*setTimeout(function() {
                            alert('Pedido finalizado com sucesso!');   
                            window.location.href = "pagamento/pagamento.php";
                            }, 100);
                            */
                        /*alert('Pedido finalizado com sucesso!');
                        // Adicione aqui lógica adicional se necessário
                    } else {
                        alert('Erro ao finalizar o pedido: ' + data.message);
                        // Adicione aqui lógica adicional para lidar com falhas
                    }
                    })*/
                    .catch(error => {
                        alert('Compra Falhou');
                        console.error('Erro:', error);
                    });
                });

                document.querySelector('.numValor').textContent = totalPreco.toFixed(2);
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        });
    });
});

</script>
</body>

</html>