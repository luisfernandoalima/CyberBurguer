<?php
include 'conn.php';

$NomeCli = $_GET['nome'];
$CpfCli = $_GET['nome'];
//Pesquisando no banco de dados se o nome existente existe no banco de dados, usar o like para 
//não ter a necessidade de colocar o nome extamente igual como se encontra no banco de dados
$sqlc = "SELECT * FROM cliente WHERE nome LIKE '%$NomeCli%' OR cpf_cli LIKE '%$CpfCli%'";
$resultado = $sql->query($sqlc);
    //Se obitiver apenas um unico resultado, enviar os dados ao JSON
if ($resultado->num_rows == 1) {
    $clientedetalhes = $resultado->fetch_assoc();
    //Codificando os dados em JSON para o JS ler
    echo json_encode([
        'valido' => true,
        'Nome' => $clientedetalhes['nome'],
        'Id' => $clientedetalhes['id_cli'],
    ], JSON_NUMERIC_CHECK);
} else {
    // Nenhum ou mais de um resultado encontrado
    echo json_encode(['valido' => false]);
}
?>
