<?php
include_once(__DIR__ . '/conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comanda'])) {
    $comanda = $_POST['comanda'];

    $updateQuery = "UPDATE pedidos SET situacao = 'PRONTO' WHERE comanda = '$comanda'";

    if ($sql->query($updateQuery) === TRUE) {
        header("Location: ../pagina-inicial/pedidos-concluidos/pedidos-concluidos.php");
        exit;
    } else {
        echo "Erro ao atualizar o status do pedido: ";
    }
} else {
    header("Location: ../pagina-inicial/home.php");
    exit;
}
