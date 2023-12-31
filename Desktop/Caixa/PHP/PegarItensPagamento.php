<?php

include_once 'conn.php';
//Tratamento de erro verificando se o get da comanda foi passado corretamente 
if (!isset($_GET['comanda'])) {
    var_dump('comanda');
    http_response_code(400);
    echo json_encode(array('error' => 'Número da comanda não fornecido.'));
}

// Obtém o número da comanda a partir dos parâmetros GET
$comanda = intval($_GET['comanda']);

//Select com inner join 
$sqlc = "SELECT pedidos.*, 
                burguer.nome AS nome_burguer, 
                burguer.preco AS preco_burguer,
                bebida.nome AS nome_bebida, 
                bebida.preco AS preco_bebida,
                acompanhamento.nome AS nome_acompanhamento,
                acompanhamento.preco AS preco_acompanhamento, 
                molho.nome AS nome_molho, 
                sobremesa.nome AS nome_sobremesa,
                sobremesa.preco AS preco_sobremesa
                FROM pedidos
                LEFT JOIN burguer ON pedidos.id_burguer = burguer.id_burguer AND burguer.id_burguer != 404
                LEFT JOIN bebida ON pedidos.id_bebida = bebida.id_bebida
                LEFT JOIN acompanhamento ON pedidos.id_acompanhamento = acompanhamento.id_acompanhamento AND acompanhamento.id_acompanhamento != 404
                LEFT JOIN molho ON pedidos.id_molho = molho.id_molho AND molho.id_molho != 404
                LEFT JOIN sobremesa ON pedidos.id_sobremesa = sobremesa.id_sobremesa AND sobremesa.id_sobremesa != 404
                WHERE pedidos.comanda = " . $comanda . " AND pedidos.situacao != 'CANCELADO'";


// Executa a consulta SQL
$result = $sql->query($sqlc);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    // Retorna uma resposta de erro, por exemplo, um código HTTP 500 Internal Server Error
    http_response_code(500);
    echo json_encode(array('error' => 'Erro ao buscar itens do pedido.'));
    exit;
}
//var_dump($result);

// Obtém os resultados da consulta
$itensComanda = $result->fetch_all(MYSQLI_ASSOC);


// Verifica se foram encontrados itens para a comanda especificada
if (!$itensComanda) {
    // Se não houver itens, retorna um JSON vazio
    echo json_encode(array());
    exit;
}

//echo $itensComanda;
// Retorna os dados como JSON
echo json_encode($itensComanda);
/*include_once 'conn.php';
// Lógica para buscar os itens do pedido com base no número da comanda
$comanda = $_GET['comanda']; // Supondo que você passará o número da comanda como parâmetro

// Execute a consulta SQL para buscar os itens do pedido com base na comanda
$sqlc = "SELECT * FROM pedidos WHERE comanda = $comanda";
$itemComanda = $sql->query($sqlc);
$itensComanda = mysqli_fetch_assoc($itemComanda);

// Inicialize o array para armazenar os itens do pedido
$itensDoPedido = array();

// Adicione os resultados ao array
$itensDoPedido[] = $itensComanda;

// Retorne os dados como JSON
echo json_encode($itensDoPedido);


//Select com inner join 
$sqlc = "SELECT pedidos.*, 
                burguer.nome AS nome_burguer, 
                burguer.preco AS preco_burguer,
                bebida.nome AS nome_bebida, 
                bebida.preco AS preco_bebida,
                acompanhamento.nome AS nome_acompanhamento, 
                molho.nome AS nome_molho, 
                sobremesa.nome AS nome_sobremesa
                FROM pedidos
                LEFT JOIN burguer ON pedidos.id_burguer = burguer.id_burguer
                LEFT JOIN bebida ON pedidos.id_bebida = bebida.id_bebida
                LEFT JOIN acompanhamento ON pedidos.id_acompanhamento = acompanhamento.id_acompanhamento
                LEFT JOIN molho ON pedidos.id_molho = molho.id_molho
                LEFT JOIN sobremesa ON pedidos.id_sobremesa = sobremesa.id_sobremesa
                WHERE pedidos.comanda = " . $comanda;
                
*/

/*include_once 'conn.php';
//Tratamento de erro verificando se o get da comanda foi passado corretamente 
if (!isset($_GET['comanda'])) {
    var_dump('comanda');
    http_response_code(400);
    echo json_encode(array('error' => 'Número da comanda não fornecido.'));
}

// Obtém o número da comanda a partir dos parâmetros GET
$comanda = intval($_GET['comanda']);

// Obtém a comanda do parâmetro da URL
$comanda = $_GET['comanda'];

// Consulta o banco de dados para obter os detalhes do pedido com base na comanda
$detalhesPedidoSql = $sql->query("SELECT pedidos.*, 
                burguer.nome AS nome_burguer, 
                burguer.preco AS preco_burguer,
                bebida.nome AS nome_bebida, 
                bebida.preco AS preco_bebida,
                acompanhamento.nome AS nome_acompanhamento,
                acompanhamento.preco AS preco_acompanhamento, 
                molho.nome AS nome_molho, 
                sobremesa.nome AS nome_sobremesa,
                sobremesa.preco AS preco_sobremesa
                FROM pedidos
                LEFT JOIN burguer ON pedidos.id_burguer = burguer.id_burguer
                LEFT JOIN bebida ON pedidos.id_bebida = bebida.id_bebida
                LEFT JOIN acompanhamento ON pedidos.id_acompanhamento = acompanhamento.id_acompanhamento
                LEFT JOIN molho ON pedidos.id_molho = molho.id_molho
                LEFT JOIN sobremesa ON pedidos.id_sobremesa = sobremesa.id_sobremesa
                WHERE pedidos.comanda = " . $comanda);

$detalhesPedido = array();

if ($detalhesPedidoSql->num_rows > 0) {
    while ($item = mysqli_fetch_assoc($detalhesPedidoSql)) {
        // Adiciona os detalhes do pedido ao array
        $detalhesPedido[] = array(
            'nome' => $item['nome_burguer'] ?? $item['nome_bebida'] ?? $item['nome_acompanhamento'] ?? $item['nome_molho'] ?? $item['nome_sobremesa'],
            'quantidade' => $item['qtd'],
            'preco' => $item['preco_burguer'] ?? $item['preco_bebida'] ?? $item['preco_acompanhamento'] ?? $item['preco_molho'] ?? $item['preco_sobremesa']
        );
    }
}

// Retorna os detalhes do pedido como JSON
echo json_encode($detalhesPedido);
*/

?>