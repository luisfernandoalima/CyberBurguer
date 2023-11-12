<?php
include "conn.php";

$id_bebida = $_GET["id_bebida"];

// Verifique se o ID do produto foi fornecido
if (!isset($id_bebida)) {
    echo "ID da bebida não fornecido.";
    exit;
} else {
    // Crie a consulta SQL de atualização com um marcador de posição (?)
    $query = "UPDATE bebida SET status = 'INATIVO' WHERE id_bebida = ?";
    
    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt = $sql->prepare($query)) {
        // Associe o valor ao marcador de posição usando o bind_param para evitar a injeção de dados e outros problemas
        $stmt->bind_param("i", $id_bebida);
        
        // Execute a consulta
        if ($stmt->execute()) {
            echo "O molho com ID $id_bebida foi removido do estoque com sucesso!";
        } else {
            echo "Erro ao remover o produto com ID $id_bebida do estoque.";
        }

        // Feche a consulta preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a ação: " . $sql->error;
        exit;
    }
}
?>
