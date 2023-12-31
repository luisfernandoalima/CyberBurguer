<?php
include "conn.php";

$id_molhos = $_GET["id_molhos"];

// Verifique se o ID do produto foi fornecido
if (!isset($id_molhos)) {
    echo "ID do molho não fornecido.";
    exit;
} else {
    // Crie a consulta SQL de atualização com um marcador de posição (?)
    $query = "UPDATE molho SET status = 'INATIVO' WHERE id_molho = ?";
    
    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt = $sql->prepare($query)) {
        // Associe o valor ao marcador de posição usando o bind_param para evitar a injeção de dados e outros problemas
        $stmt->bind_param("i", $id_molhos);
        
        // Execute a consulta
        if ($stmt->execute()) {
            echo "O molho com ID $id_molhos foi removido do estoque com sucesso!";
        } else {
            echo "Erro ao remover o produto com ID $id_molhos do estoque.";
        }

        // Feche a consulta preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a ação: " . $sql->error;
        exit;
    }
}
?>
