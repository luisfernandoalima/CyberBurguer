<?php
include "conn.php";

$searchTerm = $_POST["search_input"];
$category = $_POST["cat~_prod"];

// Mapeamento entre categorias e tabelas
$categoryToTable = [
    1 => "produto",
    2 => "burguer",
    3 => "bebida",
    4 => "acompanhamento",
    5 => "fornecedor",
    6 => "molho",
    7 => "sobremesa"
];

// Consulta SQL baseada na categoria
$tableName = $categoryToTable[$category];
$query = "SELECT * FROM $tableName WHERE (nome LIKE '%$searchTerm%' OR id_$tableName = '$searchTerm')";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';

    // Mapeamento entre categorias e cabeçalhos
    $categoryToHeaders = [
        1 => ['id_prod', 'lote', 'tipo', 'prod', 'preco_compra', 'preco_venda', 'qtd', 'dta_compra', 'dta_vencimento'],
        2 => ['id_burguer', 'nome', 'preco'],
        3 => ['id_bebida', 'nome', 'preco', 'qtd'],
        4 => ['id_acompanhamento', 'nome', 'preco'],
        5 => ['cnpj', 'nome', 'tel', 'tipo'],
        6 => ['id_molho', 'nome', 'qtd'],
        7 => ['id_sobremesa', 'nome', 'preco']
    ];

    $headers = $categoryToHeaders[$category];
    foreach ($headers as $header) {
        echo "<th class='id'>$header</th>";
    }

    echo '<th>Excluir</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($headers as $header) {
            echo '<td>' . $row[$header] . '</td>';
        }

        $idField = "id_" . $tableName;
        $idValue = $row[$idField];
        echo "<td class='moreOptions'><a href='../../../PHP/alter_$tableName.php?$idField=$idValue'><i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "Nenhum resultado encontrado.";
}
?>
