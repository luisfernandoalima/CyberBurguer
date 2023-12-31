<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");
    $dadosRecebidos = json_decode($json_data, true);

    if ($dadosRecebidos === null) {
        http_response_code(400);
        echo json_encode(array('error' => 'Erro ao decodificar dados JSON'));
        exit;
    }

    // Faça o que precisar com os dados recebidos
    $idPedido = $dadosRecebidos['idPedido'] ?? null;
    $precoTotal = $dadosRecebidos['precoTotal'] ?? null;
    $idFuncionario = $dadosRecebidos['idFuncionario'] ?? null;
    session_start();
    $_SESSION['idPedido'] = $idPedido;
    $_SESSION['precoTotal'] = $precoTotal;
    $_SESSION['idFuncionario'] = $idFuncionario;

    // Salvar os dados em um arquivo (se necessário)
    //$dadosParaEnviar = json_encode($dadosRecebidos);
    //file_put_contents('../app/comandas-abertas/pagamento/pagamento.php', $dadosParaEnviar);

    echo json_encode(array('success' => true));
} else {
    http_response_code(400);
    echo json_encode(array('error' => 'Método de requisição inválido'));
}
?>
