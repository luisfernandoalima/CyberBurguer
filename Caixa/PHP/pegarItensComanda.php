<?php
include_once 'conn.php';
// Lógica para buscar os itens do pedido com base no número da comanda
$comanda = $_GET['comanda']; // Supondo que você passará o número da comanda como parâmetro

// Execute a consulta SQL para buscar os itens do pedido com base na comanda
$sqlc = "SELECT * FROM pedidos WHERE comanda = $comanda";
$itemComanda = $sql->query($sqlc);
$itensComanda = mysqli_fetch_assoc($itemComanda);

// Inicialize o array para armazenar os itens do pedido
$itensDoPedido = array();

// Adicione os resultados ao array
$itensDoPedido[] = $itensComanda;

// Retorne os dados como JSON
echo json_encode($itensDoPedido);
?>
