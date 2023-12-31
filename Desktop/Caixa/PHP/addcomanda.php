<?php
include 'conn.php';
session_start();
$NumeroComanda = $_SESSION['NumeroComanda'];

$timezone = new DateTimeZone('America/Sao_Paulo'); //Data com Fuso Horario de São Paulo 
$agora = date('Y-m-d H:i'); //Pega a Hora com base na rede e fuso Horario

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Verifica se o metodo recebido é o post 
    $json_data = file_get_contents("php://input"); 
    $DadosCarrinho = json_decode($json_data, true); //Decodificar os dados vindo via JSON, para manipular eles, é extremamente inportante ter eles 

    //Parte refrente ao selecionamento das mesas 
    $MesaEscolhida = 0;
    $SelectMesas = "SELECT mesa FROM comandas WHERE comanda = '$NumeroComanda'";
    $Resultado = $sql->query($SelectMesas);
    if($Resultado && $Resultado->num_rows>0){
        $linha = $Resultado->fetch_assoc();
        $MesaEscolhida = $linha['mesa'];
        //$AtualizarMesa = "UPDATE mesas SET estado = 'Ocupada' WHERE mesa = $MesaEscolhida";
        //$sql->query($AtualizarMesa);
        echo "Mesa escolhida foi: $MesaEscolhida";
        $FinalProd = ("INSERT INTO pedidos (mesa, comanda, id_burguer, qtd, id_bebida, qtdbeb, id_acompanhamento, qtdacomp, id_molho, qtdmolho, id_sobremesa, qtdsobremesa, horaPedido) VALUES ($MesaEscolhida, $NumeroComanda, '404', '404', '404', '404', '404', '404', '404', '404', '404', '404', '$agora')");
        $sql->query($FinalProd);
        echo $FinalProd;
    }else{
        echo "Nenhuma mesa disponivel";
    }
    if ($DadosCarrinho !== null) { //Se os dados do carrinho for diferente de nulo 
        foreach ($DadosCarrinho as $infoProd) {
            $nome = $infoProd['nome'];
            $quantidade = $infoProd['quantidade'];
            $DadosProd = array();
            $BurguerDados = "SELECT id_burguer FROM burguer WHERE nome = '$nome'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
            $BebDados = "SELECT id_bebida FROM bebida WHERE nome = '$nome'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $AcomDados = "SELECT id_acompanhamento FROM acompanhamento WHERE nome = '$nome'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $MolhoDados = "SELECT id_molho FROM molho WHERE nome = '$nome'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $SobremesaDados = "SELECT id_sobremesa FROM sobremesa WHERE nome = '$nome'";
            $Res_Burguer = $sql->query($BurguerDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Beb = $sql->query($BebDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Acom = $sql->query($AcomDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Molho = $sql->query($MolhoDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Sobremesa = $sql->query($SobremesaDados);

            if($Res_Burguer ->num_rows > 0){
                $linha = $Res_Burguer->fetch_assoc();
                $Dados_Burguer[] = array(
                    'id' => $linha['id_burguer'],
                    'qtd' => $quantidade
                );
                foreach ($Dados_Burguer as $Burguer):
                    $id = $Burguer['id'];
                    $quantidade = $Burguer['qtd'];
                    $AtualizarBurguer = "UPDATE pedidos SET id_burguer = $id , qtd = '$quantidade' WHERE comanda = '$NumeroComanda'";
                    $sql->query($AtualizarBurguer);
                endforeach;
            }else{
                if($Res_Beb ->num_rows >0){
                    echo "Número da comanda: " . $NumeroComanda;
                    $linha = $Res_Beb->fetch_assoc();
                    $Dados_Beb[] = array(
                        'id' => $linha['id_bebida'],
                        'qtd' => $quantidade
                    );
                    foreach ($Dados_Beb as $Bebida):
                        $id = $Bebida['id'];
                        $quantidade = $Bebida['qtd'];
                        $AtualizarBeb = "UPDATE pedidos SET id_bebida = $id , qtdbeb = '$quantidade' WHERE comanda = '$NumeroComanda'";
                        $sql->query($AtualizarBeb);
                    endforeach;
                }else{
                    if($Res_Acom ->num_rows >0){
                        $linha = $Res_Acom->fetch_assoc();
                        $Dados_Acom[] = array(
                            'id' => $linha['id_acompanhamento'],
                            'qtd' => $quantidade
                        );
                        foreach ($Dados_Acom as $Acom):
                            $id = $Acom['id'];
                            $quantidade = $Acom['qtd'];
                            $AtualizarAcom = "UPDATE pedidos SET id_acompanhamento = $id , qtdacomp = '$quantidade' WHERE comanda = '$NumeroComanda'";
                            $sql->query($AtualizarAcom);
                        endforeach;
                    }else{
                        if($Res_Sobremesa ->num_rows >0){
                             $linha = $Res_Sobremesa->fetch_assoc();
                             $Dados_Sobremesa[] = array(
                                'id' => $linha ['id_sobremesa'],
                                'qtd' => $quantidade
                             );
                             foreach ($Dados_Sobremesa as $Sobremesa):
                                $id = $Sobremesa['id'];
                                $quantidade = $Sobremesa['qtd'];
                                $AtualizarSobremesa = "UPDATE pedidos SET id_sobremesa = $id , qtdsobremesa = '$quantidade' WHERE comanda = '$NumeroComanda'";
                                $sql->query($AtualizarSobremesa);
                            endforeach;
                        }else{
                            if($Res_Molho ->num_rows >0){
                                $linha = $Res_Molho->fetch_assoc();
                                $Dados_Molho[] = array(
                                    'id' => $linha ['id_molho'],
                                    'qtd' => $quantidade
                                );
                                foreach ($Dados_Molho as $Molho):
                                    $id = $Molho['id'];
                                    $quantidade = $Molho['qtd'];
                                    $AtualizarMolho = "UPDATE pedidos SET id_molho = $id , qtdmolho = '$quantidade' WHERE comanda = '$NumeroComanda'";
                                    $sql->query($AtualizarMolho);
                                endforeach;
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Erro na decodificação do JSON";
    }
} else {
    http_response_code(405); // Método não permitido
}
?>
