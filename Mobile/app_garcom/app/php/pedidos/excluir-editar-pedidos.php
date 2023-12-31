<?php
include_once(__DIR__ . '/../../php/conn.php');

$idPedido1 = isset($_GET['idPedido1']) ? $_GET['idPedido1'] : null;
$idPedido2 = isset($_GET['idPedido2']) ? $_GET['idPedido2'] : null;
$idPedido3 = isset($_GET['idPedido3']) ? $_GET['idPedido3'] : null;
$idPedido4 = isset($_GET['idPedido4']) ? $_GET['idPedido4'] : null;
$idPedido5 = isset($_GET['idPedido5']) ? $_GET['idPedido5'] : null;

if ($idPedido1 !== null) {
     // Realize a atualização na tabela pedidos
     $sqlQuery = "UPDATE pedidos SET id_burguer = '404', qtd = '404' WHERE id = $idPedido1";
    
     if ($sql->query($sqlQuery) === TRUE) {
         echo "Alteração realizada com sucesso! Clique em salvar para atualizar o pedido.";
     } else {
         echo "Erro na operação: " . $sql->error;
     }
 } 
 
 if ($idPedido2 !== null) {
    $sqlQuery = "UPDATE pedidos SET id_bebida = '404', qtdbeb = '404' WHERE id = $idPedido2";

    if ($sql->query($sqlQuery) === TRUE) {
        echo "Alteração realizada com sucesso! Clique em salvar para atualizar o pedido.";
        
    } else {
        echo "Erro na operação: " . $sql->error;
    }
 }
 
 if ($idPedido3 !== null) {
    $sqlQuery = "UPDATE pedidos SET id_acompanhamento = '404', qtdacomp = '404' WHERE id = $idPedido3";
    
    if ($sql->query($sqlQuery) === TRUE) {
        echo "Alteração realizada com sucesso! Clique em salvar para atualizar o pedido.";
        
    } else {
        echo "Erro na operação: " . $sql->error;
    }
 } 
 
 if ($idPedido4 !== null) {
    $sqlQuery = "UPDATE pedidos SET id_molho = '404', qtdmolho = '404' WHERE id = $idPedido4";
    
    if ($sql->query($sqlQuery) === TRUE) {
        echo "Alteração realizada com sucesso! Clique em salvar para atualizar o pedido.";
        
    } else {
        echo "Erro na operação: " . $sql->error;
    }
 } 
 
 if ($idPedido5 !== null) {
    $sqlQuery = "UPDATE pedidos SET id_sobremesa = '404', qtdsobremesa = '404' WHERE id = $idPedido5";
    
    if ($sql->query($sqlQuery) === TRUE) {
        echo "Alteração realizada com sucesso! Clique em salvar para atualizar o pedido.";
        
    } else {
        echo "Erro na operação: " . $sql->error;
    }
 }
?>