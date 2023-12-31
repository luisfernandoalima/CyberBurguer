<?php
// Conecte-se ao banco de dados e obtenha a conexão $sql
include 'conn.php';
// Obtenha o cupom do parâmetro GET
$cupom = $_GET['cupom'];

// Consulte o banco de dados para verificar o cupom
$sqlc = "SELECT * FROM codigos WHERE codigo_desconto = '$cupom' AND estado = 'Ativo'";
$resultado = $sql->query($sqlc);

if ($resultado->num_rows > 0) {
    // Cupom válido, retorne os detalhes do cupom
    $cupomDetalhes = $resultado->fetch_assoc();
    echo json_encode([
        'valido' => true,
        'valorDesconto' => $cupomDetalhes['valor_descontado']
    ]);
} else {
    // Cupom inválido
    echo json_encode(['valido' => false]);
}
?>
