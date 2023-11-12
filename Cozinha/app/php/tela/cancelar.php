<?php
include_once(__DIR__ . '/../conn/conn.php');
session_start();

//Verificar se o usuário está logado
if (!isset($_SESSION['emailSession']) || !isset($_SESSION['senhaSession'])) {
    header("location: ../../index.php?erro=true");
    exit;
}

$confirmar = $_POST['confirm'];
$comandas = $_POST['comanda']; 
$comanda = str_replace('Comanda: ', '', $comandas); // Remove 'Comanda: ' do valor


// Verificar se as informações da sessão correspondem ao formulário
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['idFuncSession'] === $confirmar && isset($_POST['comanda'])) {

    $updateQuery = "UPDATE pedidos SET situacao = 'CANCELADO' WHERE comanda = $comanda";

    if ($sql->query($updateQuery) === TRUE) {
        header("Location: ../../pagina-inicial/pedidos-cancelados/pedidos-cancelados.php");
        exit;
    } else {
        echo "Erro ao atualizar o status do pedido: ";
    }
} else {
    header("Location: ../pagina-inicial/home.php");
    exit;
}
?>
