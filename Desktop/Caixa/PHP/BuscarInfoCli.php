<?php
include_once('conn.php');

if (isset($_GET['id_cli'])) {
    $cliente_id = $_GET['id_cli'];
    // Valide e escape o valor (importante para segurança)
    
    $sqlc = "SELECT * FROM cliente WHERE id_cli = $cliente_id";
    $result = $sql->query($sqlc);

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        echo json_encode($cliente);
    } else {
        echo json_encode(array("error" => "Cliente não encontrado"));
    }
} else {
    echo json_encode(array("error" => "ID do cliente não especificado"));
}
?>