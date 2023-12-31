<?php
include_once(__DIR__ . '/../../php/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    $idPedido = $_POST['idPedido'];
    $qtdburguernovo = $_POST['qtdburguer'];
    $qtdbebidanovo = $_POST['qtdbebida'];
    $qtdmolhonovo = $_POST['qtdmolhos'];
    $qtdacompnovo = $_POST['qtdacomp'];
    $qtdsobremesanovo = $_POST['qtdsobre'];

    // Use consultas preparadas para evitar injeção de SQL
    $updateQuery = "UPDATE pedidos SET qtd = ?, qtdbeb = ?, qtdacomp = ?, qtdmolho = ?, qtdsobremesa = ? WHERE id = ?";

    $stmt = mysqli_prepare($sql, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $qtdburguernovo, $qtdbebidanovo, $qtdacompnovo, $qtdmolhonovo, $qtdsobremesanovo, $idPedido);
        
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Informações modificadas com sucesso.")</script>';
            header('refresh:0.1, url=../../home/pedidos-feitos/pedidos-feitos.php');
        } else {
            echo "Erro ao atualizar as informações: " . mysqli_error($sql);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($sql);
    }
}
?>
