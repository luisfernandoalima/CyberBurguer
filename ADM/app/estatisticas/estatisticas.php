<?php
include "../../PHP/conn.php";
// Consulta SQL
$sqlGraphics = "SELECT data, COUNT(id_venda) AS quantidade FROM venda WHERE data BETWEEN curdate() - interval 10 day and curdate() GROUP BY data";

// Executa a consulta SQL
$result = $sql->query($sqlGraphics);

// Array para armazenar os dados
$labels = [];
$values = [];

// Verifica se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["data"];
        $values[] = $row["quantidade"];
    }
}

// Converta os arrays em formato JSON
$jsonLabels = json_encode($labels);
$jsonValues = json_encode($values);

session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true) { //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../../index.html'); //joga para a pagina de login
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
$sql_diario = "SELECT * FROM venda WHERE data = curdate()";
$result_diario = mysqli_query($sql, $sql_diario);
$pedidos_diarios = mysqli_fetch_all($result_diario, MYSQLI_ASSOC);

// Conta a quantidade de pedidos diários
$echo_pedidos = count($pedidos_diarios);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o campo "selectData" foi definido no formulário
    if (isset($_POST['selectData'])) {
        $selectedValue = $_POST['selectData'];

        if ($selectedValue == '1') {
            $sql_diario = "SELECT * FROM venda WHERE data = curdate()";
            $result_diario = mysqli_query($sql, $sql_diario);

            // Verifica se há algum erro na consulta diária
            if ($result_diario) {
                // Armazena todos os pedidos diários em uma variável
                $pedidos_diarios = mysqli_fetch_all($result_diario, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos diários
                $qtdPedidos = count($pedidos_diarios);
            } else {
                die("Erro na consulta diária: " . mysqli_error($sql));
            }
        } elseif ($selectedValue == '2') {
            //$semanal = date('Y-m-d', strtotime('-7 days')); 
            //$sql_semanal = "SELECT * FROM venda WHERE data  '$diario' and '$semanal'";
            $sql_semanal = "SELECT data FROM venda WHERE data BETWEEN curdate() - interval 7 day and curdate()";
            $result_semanal = mysqli_query($sql, $sql_semanal);

            // Verifica se há algum erro na consulta semanal
            if ($result_semanal) {
                // Armazena todos os pedidos semanais em uma variável
                $pedidos_semanais = mysqli_fetch_all($result_semanal, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos semanais
                $qtdPedidos = count($pedidos_semanais);
            } else {
                die("Erro na consulta semanal: " . mysqli_error($sql));
            }
        } elseif ($selectedValue ==  '3') {
            $sql_mensal = "SELECT data FROM venda WHERE data BETWEEN curdate() - interval 1 month and curdate()";
            $result_mensal = mysqli_query($sql, $sql_mensal);

            // Verifica se há algum erro na consulta semanal
            if ($result_mensal) {
                // Armazena todos os pedidos semanais em uma variável
                $pedidos_mensal = mysqli_fetch_all($result_mensal, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos semanais
                $qtdPedidos = count($pedidos_mensal);
            } else {
                die("Erro na consulta semanal: " . mysqli_error($sql));
            }
        } elseif ($selectedValue ==  '4') {

            $sql_trimestral = "SELECT data FROM venda WHERE data BETWEEN curdate() - interval 3 month and curdate()";
            $result_trimestral = mysqli_query($sql, $sql_trimestral);

            // Verifica se há algum erro na consulta trimestral
            if ($result_trimestral) {
                // Armazena todos os pedidos semanais em uma variável
                $pedidos_trimestral = mysqli_fetch_all($result_trimestral, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos semanais
                $qtdPedidos = count($pedidos_trimestral);
            } else {
                die("Erro na consulta trimestral: " . mysqli_error($sql));
            }
        } elseif ($selectedValue ==  '5') {
            $sql_semestral = "SELECT data FROM venda WHERE data BETWEEN curdate() - interval 6 month  and curdate()";
            $result_semestral = mysqli_query($sql, $sql_semestral);

            // Verifica se há algum erro na consulta semanal
            if ($result_semestral) {
                // Armazena todos os pedidos semanais em uma variável
                $pedidos_semestral = mysqli_fetch_all($result_semestral, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos semanais
                $qtdPedidos = count($pedidos_semestral);
            } else {
                die("Erro na consulta semestral: " . mysqli_error($sql));
            }
        }
    }
}


?>

<head>
    <!DOCTYPE html>
    <html lang="pt-br">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/estatisticas/estatisticas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Inclua a biblioteca Chart.js -->
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
                                <label for="selectData">Filtrar por:</label>
                                <span class="selectDataArea">
                                    <form action="" method="POST">
                                        <input type="radio" name="selectData" value="1" class="radio-label"> Diário
                                        <input type="radio" name="selectData" value="2" class="radio-label"> Semanal
                                        <input type="radio" name="selectData" value="3" class="radio-label"> Mensal
                                        <input type="radio" name="selectData" value="4" class="radio-label"> Trimestral
                                        <input type="radio" name="selectData" value="5" class="radio-label"> Semestral
                                        <input type="submit" value="Filtrar">
                                    </form>
                                    <span><i class="fa-solidfa-caret-up seta-dia" style="color: #000; transform: rotate(180deg);"></i></span>

                                </span>
                            </form>
                        </div>
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
                        <canvas id="line_chart"></canvas>
                        <canvas id="bar_chart"></canvas>
                        <div class="col-6 infoAreaEst" id="switch">
                            <h2>Total de vendas:<span> <?php echo $echo_pedidos; ?>
                                </span></h2>
                            <ul>
                                <li>Vendas no estabelecimento: </li>
                                <li>Vendas por delivery: </li>
                            </ul>
                            <p>Lucro total: <span></span></p>
                        </div>
                    </div>
                    <div class="graphcsOptions">
                        <div class="btnArea" style="margin-top: 10px;">
                            <div class="graficoBtnArea" onclick="mostrarGrafico('line_chart')">
                                <button class="graficoBtn">
                                    <img src="../../assets/img/icons/grafico-de-linha.png" alt="Gráfico de linhas" class="graficoImg">
                                </button>
                                <p class="graficoTexto">Gráfico de linhas</p>
                            </div>
                            <div class="graficoBtnArea" onclick="mostrarGrafico('info_chart')">
                                <button class="graficoBtn">
                                    <img src="../../assets/img/icons/grafico-de-coluna.png" alt="Gráfico de Coluna" class="graficoImg">
                                </button>
                                <p class="graficoTexto">Texto</p>
                            </div>
                            <div class="graficoBtnArea" onclick="mostrarGrafico('bar_chart')">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        var ctx = document.getElementById("line_chart").getContext("2d"); // Use getElementById para capturar o contexto

        var cor_borda = '#E000C2'; // Cor da borda das barras
        var backgroundColor = '#E000C2'; // Cor de fundo das barras
        var gridColor = 'black'; // Cor das linhas de grade do eixo x e y
        var labelColor = 'black'; // Cor do texto dos rótulos

        var data = {
            labels: <?php echo $jsonLabels; ?>,
            datasets: [{
                label: "QUANTIDADE DE VENDAS DOS ÚLTIMOS 10 DIAS",
                data: <?php echo $jsonValues; ?>,
                borderWidth: 6,
                borderColor: cor_borda, // Cor da borda das barras
                backgroundColor: backgroundColor, // Cor de fundo das barras
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

        var BarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });



        var ctx = document.getElementById("bar_chart").getContext("2d"); // Use getElementById para capturar o contexto

        var cor_borda = '#E000C2'; // Cor da borda das barras
        var backgroundColor = '#E000C2'; // Cor de fundo das barras
        var gridColor = 'black'; // Cor das linhas de grade do eixo x e y
        var labelColor = 'black'; // Cor do texto dos rótulos

        var data = {
            labels: <?php echo $jsonLabels; ?>,
            datasets: [{
                label: "QUANTIDADE DE VENDAS DOS ÚLTIMOS 10 DIAS",
                data: <?php echo $jsonValues; ?>,
                borderWidth: 6,
                borderColor: cor_borda, // Cor da borda das barras
                backgroundColor: backgroundColor, // Cor de fundo das barras
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

        var BarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });


        const infoAreaEst = document.querySelector('.infoAreaEst')
        const graficos = document.querySelectorAll('canvas')

        const mostrarGrafico = (tipoGrafico) => {
            infoAreaEst.classList.add('disable')
            if (tipoGrafico == 'line_chart') {
                graficos[0].style.display = 'block'
                graficos[1].style.display = 'none'
            } else if (tipoGrafico == 'bar_chart') {
                graficos[0].style.display = 'none'
                graficos[1].style.display = 'block'
            } else{
                graficos[0].style.display = 'none'
                graficos[1].style.display = 'none'
                infoAreaEst.classList.remove('disable')
            }
        }
        graficos[0].style.display = 'none'
        graficos[1].style.display = 'none'
    </script>
</body>

</html>