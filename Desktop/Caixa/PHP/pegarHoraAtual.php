<?php
header('Content-Type: application/json');

$horaAtual = time();

echo json_encode(['horaAtual' => $horaAtual]);
?>
