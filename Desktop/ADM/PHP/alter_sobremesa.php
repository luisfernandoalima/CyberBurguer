<?php
include "conn.php";

$id_sobremesa = $_GET["id_sobremesa"];

// Verifique se o ID do produto foi fornecido
if (!isset($id_sobremesa)) {
    echo "ID da sobremesa não fornecido.";
    exit;
} else {
    // Crie a consulta SQL de atualização com um marcador de posição (?)
    $query = "UPDATE sobremesa SET status = 'INATIVO' WHERE id_sobremesa = ?";
    
    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt = $sql->prepare($query)) {
        // Associe o valor ao marcador de posição usando o bind_param para evitar a injeção de dados e outros problemas
        $stmt->bind_param("i", $id_sobremesa);
        
        // Execute a consulta
        if ($stmt->execute()) {
            echo "O molho com ID $id_sobremesa foi removido do estoque com sucesso!";
        } else {
            echo "Erro ao remover o produto com ID $id_sobremesa do estoque.";
        }

        // Feche a consulta preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a ação: " . $sql->error;
        exit;
    }
}
?>
