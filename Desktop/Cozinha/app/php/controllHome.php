<?php
include_once(__DIR__ . '/../php/conn/conn.php');

function obterProdutosQuantidades($tabela, $campos, $campoQuantidade)
{
    global $sql;

    $sqlQuery = "SELECT DISTINCT p.nome, s.$campoQuantidade AS quantidade, s.comanda, c.mesa, s.horaPedido
                 FROM $tabela AS p
                 JOIN pedidos AS s ON p.id_$tabela IN ($campos)
             JOIN mesas AS c ON s.mesa = c.mesa
                 WHERE s.situacao = 'PREPARANDO'";

    $result = $sql->query($sqlQuery);

    $produtos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comanda = $row["comanda"];
            $num_mesa = $row["mesa"];
            $horaPedido = $row["horaPedido"]; // Obtém o horário do pedido

            // Verifica se já existe uma entrada para a comanda atual no array
            if (!isset($produtos[$comanda])) {
                $produtos[$comanda]['mesa'] = $num_mesa;
                $produtos[$comanda]['horaPedido'] = $horaPedido; // Armazena o horário do pedido no array
            }

            $produtos[$comanda]['itens'][] = array(
                'nome' => $row["nome"],
                'quantidade' => $row["quantidade"]
            );
        }
    }

    return $produtos;
}



function obterBurguersQuantidades()
{
    return obterProdutosQuantidades('burguer', 's.id_burguer', 'qtd');
}

function obterBebidasQuantidades()
{
    return obterProdutosQuantidades('bebida', 's.id_bebida', 'qtdbeb');
}

function obterAcompanhamentosQuantidades()
{
    return obterProdutosQuantidades('acompanhamento', 's.id_acompanhamento', 'qtdacomp');
}

function obterMolhosQuantidades()
{
    return obterProdutosQuantidades('molho', 's.id_molho', 'qtdmolho');
}



$burguers = obterBurguersQuantidades();
$bebidas = obterBebidasQuantidades();
$acompanhamentos = obterAcompanhamentosQuantidades();
$molhos = obterMolhosQuantidades();

?>
