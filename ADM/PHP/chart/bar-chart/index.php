<?php
include '../conn.php';
    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT data, COUNT(id_venda) AS quantidade FROM venda WHERE data BETWEEN curdate() - interval 10 day and curdate() GROUP BY data";

    // Executa a consulta SQL
    $result = $conn->query($sql);

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

    // Feche a conexão com o banco de dados
    $conn->close();

    // Converta os arrays em formato JSON
    $jsonLabels = json_encode($labels);
    $jsonValues = json_encode($values);
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Barras com Dados da Consulta SQL</title>
    <!-- Inclua a biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="bar_chart" width="400" height="400"></canvas>

    <script>
    var ctx = document.getElementById("bar_chart").getContext("2d"); // Use getElementById para capturar o contexto

    var cor_borda = '#E000C2'; // Cor da borda das barras
    var backgroundColor = '#E000C2'; // Cor de fundo das barras
    var gridColor = 'white'; // Cor das linhas de grade do eixo x e y
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

    </script>
</body>
</html>
