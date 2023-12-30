<?php
include "../../PHP/conn.php";

session_start();
$log = $_SESSION['email'];
$nomeFunc = $_SESSION['nome'];
$idFunc = $_SESSION['id_func'];
$parts = explode(" ", $nomeFunc);
$primeiroNome = $parts[0];
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];

function redirectToLogin() {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: ../../index.html');
    exit;
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');


function fetchDailySales($sql) {
    $sql_diario = "SELECT data, COUNT(*) as quantidade FROM venda WHERE data = CURDATE() GROUP BY data";
    $sql_valorTotalDiario = "SELECT IFNULL(SUM(valor_total), 0) AS total_vendas FROM venda WHERE data = CURDATE();";
    $result_diario = mysqli_query($sql, $sql_diario);
    $valorVend = mysqli_query($sql, $sql_valorTotalDiario );
    if ($result_diario && $valorVend) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result_diario)) {
            $row['total_vendas'] = mysqli_fetch_assoc($valorVend)['total_vendas'];
            $data[] = $row;
        }
        return $data;
    } else {
        die("Erro na consulta diária: " . mysqli_error($sql));
    }
}
function fetchWeeklySales($sql) {
    $sql_semanal = "SELECT data, COUNT(*) as quantidade, IFNULL(SUM(valor_total), 0) AS total_vendas FROM venda WHERE data BETWEEN CURDATE() - INTERVAL 1 WEEK AND CURDATE() GROUP BY data;";

    $result_semanal = mysqli_query($sql, $sql_semanal);

    if ($result_semanal) {
        return mysqli_fetch_all($result_semanal, MYSQLI_ASSOC);
    } else {
        die("Erro na consulta semanal: " . mysqli_error($sql));
    }
}

function fetchMonthlySales($sql) {
    $sql_mensal = "SELECT data, COUNT(*) as quantidade, IFNULL(SUM(valor_total), 0) AS total_vendas FROM venda WHERE data BETWEEN CURDATE() - INTERVAL 1 MONTH AND CURDATE() GROUP BY data;";

    $result_mensal = mysqli_query($sql, $sql_mensal);

    if ($result_mensal) {
        return mysqli_fetch_all($result_mensal, MYSQLI_ASSOC);
    } else {
        die("Erro na consulta mensal: " . mysqli_error($sql));
    }
}

function fetchQuarterlySales($sql) {
    $sql_trimestral = "SELECT data, COUNT(*) as quantidade, IFNULL(SUM(valor_total), 0) AS total_vendas FROM venda WHERE data BETWEEN CURDATE() - INTERVAL 3 MONTH AND CURDATE() GROUP BY data;";

    $result_trimestral = mysqli_query($sql, $sql_trimestral);

    if ($result_trimestral) {
        return mysqli_fetch_all($result_trimestral, MYSQLI_ASSOC);
    } else {
        die("Erro na consulta trimestral: " . mysqli_error($sql));
    }
}

function fetchHalfYearlySales($sql) {
    $sql_semestral = "SELECT data, COUNT(*) AS quantidade, IFNULL(SUM(valor_total), 0) AS total_vendas FROM venda WHERE data BETWEEN CURDATE() - INTERVAL 6 MONTH AND CURDATE() GROUP BY data;";

    $result_semestral = mysqli_query($sql, $sql_semestral);

    if ($result_semestral) {
        return mysqli_fetch_all($result_semestral, MYSQLI_ASSOC);
    } else {
        die("Erro na consulta semestral: " . mysqli_error($sql));
    }
}

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    redirectToLogin();
}


$pedidos_diarios = fetchDailySales($sql);

$echo_pedidos = count($pedidos_diarios);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectData'])) {
    $selectedValue = $_POST['selectData'];
    $echo_pedidos = array();
    switch ($selectedValue) {
        case '1':
            $pedidos = fetchDailySales($sql);
            break;

            case '2':
                $pedidos = fetchWeeklySales($sql);
                break;

            case '3':
                $pedidos = fetchMonthlySales($sql);
                break;

            case '4':
                $pedidos = fetchQuarterlySales($sql);
                break;

            case '5':
                $pedidos = fetchHalfYearlySales($sql);
                break;
                
    }

    $echo_pedidos = array();
    $jsonLabels = array();
    $jsonValues = array();
    $QuantiVend = 0;
    $totalVendas = 0;

    foreach ($pedidos as $pedido) {
        $jsonLabels[] = $pedido['data'];
        $jsonValues[] = $pedido['quantidade'];
        $totalVendas += $pedido['total_vendas'];
        $echo_pedidos[] = array(
            'data' => $pedido['data'],
            'quantidade' => $pedido['quantidade'],
            'total_vendas' => $pedido['total_vendas'],
        );
        $QuantiVend += $pedido['quantidade'];
    }

    echo json_encode(array("labels" => $jsonLabels, "values" => $jsonValues, "QuantiVend" => $QuantiVend, "totalVendas" => $totalVendas, "detalhesVendas" => $echo_pedidos));
    exit;
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/estatisticas/estatisticas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Estatísticas</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../pagina-inicial/home.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../estatisticas/estatisticas.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">paid</i>
                            <span>Estatísticas</span>
                        </span>
                    </button>
                </a>
            </nav>

            <header class="sidebar-header">
                <!--Foto Usuário-->
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc ?></span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                                <a href="../meu-perfil/login_info_pessoal.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../PHP/sair_sessao_Adm.php">Sair da conta</a></p>
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
                <div><i class="material-symbols-outlined">paid</i><span>Estatísticas</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="filtros">
                        <div class="filtroData">
                            <form action="" method="POST">
                                <span class="selectDataArea">
                                    <form action="" method="POST">
                                        <input type="radio" name="selectData" value="1" class="radio-label" id="radioDia"><label for="radioDia"> Diário</label>
                                        <input type="radio" name="selectData" value="2" class="radio-label" id="radioSema"><label for="radioSema"> Semanal</label>
                                        <input type="radio" name="selectData" value="3" class="radio-label" id="radioMen"><label for="radioMen"> Mensal</label>
                                        <input type="radio" name="selectData" value="4" class="radio-label" id="radioTri"><label for="radioTri"> Trimestral</label>
                                        <input type="radio" name="selectData" value="5" class="radio-label" id="radioSeme"><label for="radioSeme"> Semestral</label>
                                    </form>
                                </span>
                            </form>
                        </div>
                        <script>
                        const radiobuttons = document.querySelectorAll(".radio-label");

                        radiobuttons.forEach(radio => {
                            radio.addEventListener('change', (event) => {
                                const valorSelecionado = event.target.value;

                                fetch(window.location.href, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded',
                                        },
                                        body: `selectData=${valorSelecionado}`
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        atualizarGrafico(data.labels, data.values, data.QuantiVend);
                                    })
                                    .catch(error => console.error('Erro:', error));
                            });
                        });
                    </script>
                        <div class="filtroVenda">
                            <form action="">
                                <select name="" id="selectVendas">
                                    <option value="">Ultimas vendas</option>
                                </select>
                                <span><i class="fa-solid fa-caret-up" style="color: #ffffff; transform: rotate(180deg);"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="numArea">
                    <div class="col-6 infoAreaEst" id="infoAreaEst">
                        <h2>Total de vendas:<span></span></h2>
                        <p>Lucro total: <span></span></p>
                    </div>
                    <div class="graficos">
                        <canvas id="line_chart"></canvas>
                        <canvas id="bar_chart"></canvas>
                    </div>
                </div>
                    <div class="graphcsOptions">
                    <div class="btnArea" style="margin-top: 10px;">
                    <div class="graficoBtnArea" onclick="selecionarTipoGrafico('line')">
                        <button class="graficoBtn">
                            <img src="../../assets/img/icons/grafico-de-linha.png" alt="Gráfico de Linha" class="graficoImg">
                        </button>
                        <p class="graficoTexto">Gráfico de Linha</p>
                    </div>
                    <div class="graficoBtnArea" onclick="selecionarTipoGrafico('bar')">
                        <button class="graficoBtn">
                            <img src="../../assets/img/icons/grafico-de-coluna.png" alt="Gráfico de Coluna" class="graficoImg">
                        </button>
                        <p class="graficoTexto">Gráfico de Coluna</p>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/paginaInicial/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.umd.min.js"></script>
    <script>
        let meuGraficoLinha;  // Variável global para o gráfico de linha
        let meuGraficoBarra;  // Variável global para o gráfico de barra

        var numArea = document.getElementById('numArea');
        var infoAreaEst = document.getElementById('infoAreaEst');

        // Verifique a rolagem da página
        window.addEventListener('scroll', function() {
            // Obtenha a posição vertical da rolagem
            var scrollPosition = window.scrollY || window.pageYOffset;

            // Fixe a área de informações quando rolar
            infoAreaEst.style.top = scrollPosition + 'px';
        });

        
            function selecionarTipoGrafico(tipo) {
        // Oculta ambos os gráficos
        graficoLinha.style.display = 'none';
        graficoBarra.style.display = 'none';

        // Exibe o gráfico desejado
        if (tipo === 'line') {
            graficoLinha.style.display = 'block';
        } else if (tipo === 'bar') {
            graficoBarra.style.display = 'block';
        }

        // Exibe ou oculta a área de informações conforme necessário
        //infoAreaEst.style.display = (tipo === 'line' || tipo === 'bar') ? 'none' : 'block';
    }

        function criarGrafico(ctx, chartType, labels, values) {
            var cor_borda = '#E000C2';
            var backgroundColor = '#E000C2';
            var gridColor = 'black';
            var labelColor = 'black';

            var data = {
                labels: labels,
                datasets: [{
                    label: "QUANTIDADE DE VENDAS",
                    data: values,
                    borderWidth: 6,
                    borderColor: cor_borda,
                    backgroundColor: backgroundColor,
                }]
            };

            var options = {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Data',
                            color: labelColor
                        },
                        grid: {
                            color: gridColor
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Quantidade de Pedidos',
                            color: labelColor
                        },
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true,
                            color: labelColor
                        },
                        grid: {
                            color: gridColor
                        }
                    }
                }
            };

            return new Chart(ctx, {
                type: chartType,
                data: data,
                options: options
            });
        }

        let labels = [];  // Declare labels variable
        let values = [];  // Declare values variable

        function atualizarGrafico(labels, values, QuantiVend) {
        meuGraficoLinha.data.labels = labels;
        meuGraficoLinha.data.datasets[0].data = values;
        meuGraficoLinha.update();

        meuGraficoBarra.data.labels = labels;
        meuGraficoBarra.data.datasets[0].data = values;
        meuGraficoBarra.update();
        
        }

        function criarGraficos() {
            var ctxLinha = document.getElementById('line_chart').getContext('2d');
            var ctxBarra = document.getElementById('bar_chart').getContext('2d');
            meuGraficoLinha = criarGrafico(ctxLinha, 'line', labels, values);
            meuGraficoBarra = criarGrafico(ctxBarra, 'bar', labels, values);
                        }
        const graficoLinha = document.getElementById('line_chart');
        const graficoBarra = document.getElementById('bar_chart');

        function mostrarGrafico(tipoGrafico, graficoOcultar) {
        // Oculta ambos os gráficos
        graficoLinha.style.display = 'none';
        graficoBarra.style.display = 'none';
        if (tipoGrafico === 'line') {
        graficoLinha.style.display = 'block';
        } else if (tipoGrafico === 'bar') {
        graficoBarra.style.display = 'block';
    }
        

        // Exibe ou oculta a área de informações conforme necessário
    }
        document.addEventListener('DOMContentLoaded', function() {
            criarGraficos();
            mostrarGrafico('bar');
            console.log("Page loaded");
        });

        const radioButtons = document.querySelectorAll(".radio-label");

        radioButtons.forEach((radio) => {
            radio.addEventListener('change', (event) => {
                const valorSelecionado = event.target.value;
                console.log("Selected Value:", valorSelecionado);

                fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `selectData=${valorSelecionado}`
                })
                .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
                })
                .then(data => {
                    atualizarGrafico(data.labels, data.values);

                    // Atualizar a infoAreaEst com o total de vendas
                    const infoAreaEst = document.getElementById('infoAreaEst');
                    infoAreaEst.innerHTML = `<h2>Total de vendas: <span>${data.QuantiVend}</span></h2>`;

                    infoAreaEst.innerHTML += `<p>Lucro total: <span>${data.totalVendas} R$</span></p>`;


                    if (data.error) {
                        console.error('Erro:', data.error);
                    } else {
                        console.log("Data from server:", data);

                    if (valorSelecionado === 'line' || valorSelecionado === 'bar') {
                        mostrarGrafico(valorSelecionado);
                        // Adicione a lógica para atualizar os gráficos com os dados recebidos
                    } else {
                    }
                }
                })
                .catch(error => console.error('Erro:', error));
            });
        });


    </script>
</body>

</html>