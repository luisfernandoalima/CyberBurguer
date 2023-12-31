<?php
// Receber o parâmetro da comanda
$comanda = $_GET['comanda'];

// Consulta SQL para verificar se a comanda existe no banco de dados
$consulta = "SELECT * FROM comandas WHERE NumeroComanda = '$comanda'";
$result = $sql->query($consulta);

$response = array();

if ($result->num_rows > 0) {
    // Comanda encontrada
    $row = $result->fetch_assoc();
    $response['valido'] = true;
    $response['Nome'] = $row['Nome'];
} else {
    // Comanda não encontrada
    $response['valido'] = false;
}

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);

// Fecha a conexão com o banco de dados
?>
