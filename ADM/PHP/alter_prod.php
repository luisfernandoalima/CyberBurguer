<?php
include "conn.php";

$id_prod = $_GET["id_prod"];

// Aqui eu verifico se o ID do burguer foi fornecido
if (!isset($id_prod)) {
    echo "ID do produto não fornecido.";
    exit;
} else {
    // Crie a consulta SQL de atualização com um marcador de posição (?)
    $query = "UPDATE produto SET status = 'INATIVO' WHERE id_prod = ?";

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt = $sql->prepare($query)) {
        // Associe o valor ao marcador de posição usando o bind_param para evitar a injeção de dados e outros problemas
        $stmt->bind_param("i", $id_prod);

        // Adicione um alerta que pede pro usuário confirmar a remoção em JavaScript
        echo '<script>';
        echo 'if (confirm("Tem certeza de que deseja remover o burguer com ID ' . $id_prod . ' do estoque?")) {';
        echo '    ' . $stmt->execute() . ';';
        echo '    alert("O burguer com o ID ' . $id_prod . ' foi removido do estoque com sucesso!");';
        echo '} else {';
        echo '    alert("Ação cancelada.");';
        echo '}';
        echo 'window.location.href = "../app/pagina-inicial/controle-de-produtos/controle_prod.php";';
        echo '</script>';
        // Feche a consulta preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a ação: " . $sql->error;
        exit;
    }
}
?>
