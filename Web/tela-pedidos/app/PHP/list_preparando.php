<?php 
include 'conn.php';

// Inicializar um array para armazenar os pedidos em preparo
$pedidos_preparando = array();
$sql_preparando = "SELECT comanda, horaPedido FROM pedidos WHERE situacao = 'PREPARANDO'";
$result_preparando = $sql->query($sql_preparando);

// Verificar se há resultados
if ($result_preparando->num_rows > 0) {
    while ($row = $result_preparando->fetch_assoc()) {
        $pedidos_preparando[] = $row;
    }
}

$data = array('tipo' => 'preparando', 'pedidos' => $pedidos_preparando);
echo json_encode($data);
?>
