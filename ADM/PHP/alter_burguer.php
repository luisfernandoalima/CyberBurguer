<?php
include "conn.php";

$id_burguer = $_GET["id_burguer"];

// Verifique se o ID do produto foi fornecido
if (!isset($id_burguer)) {
    echo "ID do burguer não fornecido.";
    exit;
} else {
    // Crie a consulta SQL de atualização com um marcador de posição (?)
    $query = "UPDATE burguer SET status = 'INATIVO' WHERE id_burguer = ?";
    
    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt = $sql->prepare($query)) {
        // Associe o valor ao marcador de posição usando o bind_param para evitar a injeção de dados e outros problemas
        $stmt->bind_param("i", $id_burguer);
        
        // Execute a consulta
        if ($stmt->execute()) {
            echo "O produto com ID $id_burguer foi removido do estoque com sucesso!";
        } else {
            echo "Erro ao remover o produto com ID $id_burguer do estoque.";
        }

        // Feche a consulta preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a ação: " . $sql->error;
        exit;
    }
}
?>
