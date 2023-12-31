<?php
include_once(__DIR__ . '/../conn.php');

// Função para executar consultas SQL
function executarConsulta($sqlQuery)
{
    global $sql;
    $result = $sql->query($sqlQuery);
    return $result;
}

// Função para obter pedidos de hambúrguer por pedido
function obterBurguersPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT b.nome, p.qtd AS quantidade
                 FROM burguer AS b
                 JOIN pedidos AS p ON p.id_burguer = b.id_burguer
                 WHERE p.situacao = 'PREPARANDO' AND p.id = $idPedido";

    $result = $sql->query($sqlQuery);

    $burguers = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $burguers[] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $burguers;
}

// Função para obter pedidos de bebidas por pedido
function obterBebidasPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT bebida.nome, p.qtdbeb AS quantidade
                 FROM bebida AS bebida
                 JOIN pedidos AS p ON p.id_bebida = bebida.id_bebida
                 WHERE p.situacao = 'PREPARANDO' AND p.id = $idPedido";

    $result = $sql->query($sqlQuery);

    $bebidas = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bebidas[] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $bebidas;
}

// Função para obter pedidos de acompanhamentos por pedido
function obterAcompPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT a.nome, p.qtd AS quantidade
                 FROM acompanhamento AS a
                 JOIN pedidos AS p ON p.id_acompanhamento = a.id_acompanhamento
                 WHERE p.situacao = 'PREPARANDO' AND p.id = $idPedido";

    $result = $sql->query($sqlQuery);

    $acomp = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $acomp[] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $acomp;
}

function obterMolhoPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT m.nome, p.qtd AS quantidade
                 FROM molho AS m
                 JOIN pedidos AS p ON p.id_molho = m.id_molho
                 WHERE p.situacao = 'PREPARANDO' AND p.id = $idPedido";

    $result = $sql->query($sqlQuery);

    $molho = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $molho[] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $molho;
}

function obterSobrePorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT s.nome, p.qtd AS quantidade
                 FROM sobremesa AS s
                 JOIN pedidos AS p ON p.id_sobremesa = s.id_sobremesa
                 WHERE p.situacao = 'PREPARANDO' AND p.id = $idPedido";

    $result = $sql->query($sqlQuery);

    $sobre = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sobre[] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $sobre;
}

function obterMesaPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT mesa FROM pedidos WHERE id = $idPedido";
    $result = $sql->query($sqlQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["mesa"];
    }

    return null; // Retorna null se o ID do pedido não existir
}

function obterComandaPorPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT comanda FROM pedidos WHERE id = $idPedido";
    $result = $sql->query($sqlQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["comanda"];
    }

    return null; // Retorna null se o ID do pedido não existir
}

function obterHoraPedido($idPedido)
{
    global $sql;
    $sqlQuery = "SELECT horaPedido FROM pedidos WHERE id = $idPedido";
    $result = $sql->query($sqlQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["horaPedido"];
    }

    return null; // Retorna null se o ID do pedido não existir
}


// Agora você pode chamar essas funções com o ID do pedido para obter pedidos feitos de cada categoria
if (isset($_GET['pedido_id'])) {
    $idPedido = $_GET['pedido_id'];
    $burguersFeitos = obterBurguersPorPedido($idPedido);
    $bebidaFeitos = obterBebidasPorPedido($idPedido);
    $acompanhamentosFeitos = obterAcompPorPedido($idPedido);
    $molhosFeitos = obterMolhoPorPedido($idPedido);
    $sobreFeitos = obterSobrePorPedido($idPedido);
    $mesa = obterMesaPorPedido($idPedido);
    $comanda = obterComandaPorPedido($idPedido);
    $horaPedido = obterHoraPedido($idPedido);
}

