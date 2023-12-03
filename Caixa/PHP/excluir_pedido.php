<?php
include 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");
    $DadosCarrinho = json_decode($json_data, true);
    $numeroComanda = $DadosCarrinho['numeroComanda'];
    $AtualizarMesa = "UPDATE pedidos SET situacao = 'CANCELADO' WHERE comanda = $numeroComanda";
    $sql->query($AtualizarMesa);
    echo json_encode(['status' => 'success', 'message' => 'Número da comanda recebido com sucesso', 'comanda' => $numeroComanda]);
} else {
    http_response_code(405);
}
?>
