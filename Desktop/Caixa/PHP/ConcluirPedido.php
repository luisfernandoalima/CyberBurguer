<?php
include_once 'conn.php';

// Verifica se os dados foram recebidos corretamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Faça o processamento dos dados aqui, por exemplo, atualizar o status do pedido no banco de dados
    $comanda = intval($data['comanda']);
    var_dump($comanda);

    // Adicione a lógica para concluir o pedido no banco de dados aqui
    // Exemplo: UPDATE pedidos SET status = 'CONCLUIDO' WHERE comanda = $comanda;

    // Envie uma resposta de sucesso
    echo json_encode(array('success' => true));
} else {
    // Se os dados não foram recebidos corretamente, envie uma resposta de erro
    http_response_code(400);
    echo json_encode(array('error' => 'Dados inválidos'));
}
?>
