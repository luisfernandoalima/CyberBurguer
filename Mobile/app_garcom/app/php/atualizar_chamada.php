<?php
require_once (__DIR__ . '/conn.php');

// Código para atualizar a tabela (substitua pelo seu código real)
$sqlUpdate = "UPDATE mesas SET chamando = 'nao' WHERE chamando = 'sim'";
if ($sql->query($sqlUpdate) === TRUE) {
    echo "Tabela atualizada com sucesso!";
} else {
    echo "Erro ao atualizar a tabela: " . $sql->error;
}
?>