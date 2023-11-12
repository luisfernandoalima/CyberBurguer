<?php
include 'conn.php';

$labels = [];
$values = [];

//aqui eu calculo o período de menos7 dias a partir de hoje
$dataInicial = date('Y-m-d');
$dataFinal = date('Y-m-d', strtotime('-7 days'));

$sql = "SELECT data, COUNT(id_venda) AS quantidade FROM venda WHERE data BETWEEN '$dataFinal' AND '$dataInicial' GROUP BY data";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["data"];
        $values[] = $row["quantidade"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de barras</title>
</head>
<body>
    
<canvas class="bar_chart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
// Defina as cores desejadas
var cor_borda = "#E000C2";
var backgroundColor = "white";
var gridColor = "white";

// Limpe o gráfico anterior, se houver
if (window.chartGraph) {
    window.chartGraph.destroy();
}

// Selecione o contexto (canvas) onde o gráfico será desenhado
var ctx = document.querySelector("#line-chart").getContext("2d");

// Construa o novo gráfico
window.chartGraph = new Chart(ctx, {
    type: "line",
    data: {
        labels: labels, // Rótulos no eixo x
        datasets: [{
            label: "QUANTIDADE DE VENDAS",
            data: values, // Valores no eixo y
            borderWidth: 6,
            borderColor: cor_borda,
            backgroundColor: backgroundColor,
        }]
    },
    options: {
        plugins: {
            legend: {
                display: true, // Exibir legenda
            },
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: "Data", // Rótulo do eixo x
                    color: gridColor,
                },
                grid: {
                    color: gridColor,
                },
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: "Quantidade de Pedidos", // Rótulo do eixo y
                    color: gridColor,
                },
                ticks: {
                    stepSize: 1,
                    beginAtZero: true,
                    color: gridColor,
                },
                grid: {
                    color: gridColor,
                },
            },
        },
    },
});


    </script>