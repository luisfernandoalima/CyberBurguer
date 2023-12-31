<?php
include_once(__DIR__ . '/../conn.php');

function executarConsulta($sqlQuery)
{
    global $sql;
    $result = $sql->query($sqlQuery);
    return $result;
}

function obterProdutosQuantidades($tabela, $campos, $campoQuantidade)
{
    $sqlQuery = "SELECT DISTINCT p.nome, s.$campoQuantidade AS quantidade, s.comanda, c.mesa, s.horaPedido, s.id
                 FROM $tabela AS p
                 JOIN pedidos AS s ON p.id_$tabela IN ($campos)
                 JOIN mesas AS c ON s.mesa = c.mesa
                 WHERE s.situacao = 'PREPARANDO'
                 ORDER BY s.id";

    $result = executarConsulta($sqlQuery);

    $produtos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comanda = $row["comanda"];
            $num_mesa = $row["mesa"];
            $horaPedido = $row["horaPedido"];
            $idPedido = $row["id"];

            if (!isset($produtos[$idPedido])) {
                $produtos[$idPedido]['mesa'] = $num_mesa;
                $produtos[$idPedido]['horaPedido'] = $horaPedido;
                $produtos[$idPedido]['id'] = $idPedido;
                $produtos[$idPedido]['comanda'] = $comanda; // Armazena o horário do pedido no array
            }

            $produtos[$idPedido]['itens'][] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $produtos;
}

function obterPedidosBurguers()
{
    return obterProdutosQuantidades('burguer', 's.id_burguer', 'qtd');
}

function obterPedidosBebida()
{
    return obterProdutosQuantidades('bebida', 's.id_bebida', 'qtdbeb');
}

function obterPedidosAcompanhamentos()
{
    return obterProdutosQuantidades('acompanhamento', 's.id_acompanhamento', 'qtdacomp');
}

function obterPedidosMolhos()
{
    return obterProdutosQuantidades('molho', 's.id_molho', 'qtdmolho');
}

$burguers = obterPedidosBurguers();
$bebida = obterPedidosBebida();
$acompanhamentos = obterPedidosAcompanhamentos();
$molhos = obterPedidosMolhos();

?>
