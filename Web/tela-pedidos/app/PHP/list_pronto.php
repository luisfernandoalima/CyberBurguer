<?php 
include 'conn.php';
$pedidos_prontos = array();
date_default_timezone_set('America/Sao_Paulo');
$horaAtual = new DateTime(); // Obtém a hora atual
$sql_pronto = "SELECT comanda, horaPedido FROM pedidos WHERE situacao = 'PRONTO' AND TIMESTAMPDIFF(MINUTE, horaPedido, NOW()) <= 10";
$result_prontos = $sql->query($sql_pronto);

// Verificar se há resultados
if ($result_prontos->num_rows > 0) {
    while ($row = $result_prontos->fetch_assoc()) {
        $pedidos_prontos[] = $row;
    }
}
$data = array('tipo' => 'pronto', 'pedidos' => $pedidos_prontos);
echo json_encode($data);
?>
