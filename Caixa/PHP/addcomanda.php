<?php
session_start();
$_SESSION['NumeroComanda'] ;
$NumeroComanda = $_SESSION['NumeroComanda'];
include 'conn.php';

$timezone = new DateTimeZone('America/Sao_Paulo'); //Data com Fuso Horario de São Paulo 
$agora = date('H:i'); //Pega a Hora com base na rede e fuso Horario

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Verifica se o metodo recebido é o post 
    $json_data = file_get_contents("php://input"); 
    //echo "Dados brutos recebidos no PHP: " . $json_data; //Verificar como esta vindo os dados no console, somente para fins de teste 
    $DadosCarrinho = json_decode($json_data, true); //Decodificar os dados vindo via JSON, para manipular eles, é extremamente inportante ter eles 

    //Parte refrente ao selecionamento das mesas 
    $MesaEscolhida = 0;
    $SelectMesas = "SELECT mesa FROM mesas WHERE estado = 'Livre' ORDER BY RAND() LIMIT 1";
    $Resultado = $sql->query($SelectMesas);
    if($Resultado && $Resultado->num_rows>0){
        $linha = $Resultado->fetch_assoc();
        $MesaEscolhida = $linha['mesa'];
        $AtualizarMesa = "UPDATE mesas SET estado = 'Ocupada' WHERE mesa = $MesaEscolhida";
        $sql->query($AtualizarMesa);
        echo "Mesa escolhida foi: $MesaEscolhida";
        $Comanda = "INSERT INTO comandas VALUES ('$NumeroComanda','$MesaEscolhida')";
        $sql->query($Comanda);
        $FinalProd = "INSERT INTO pedidos (mesa, comanda) VALUES ('$MesaEscolhida','$NumeroComanda')";
        $sql->query($FinalProd);
    }else{
        echo "Nenhuma mesa disponivel";
    }
    //$FinalPed = $sql->query("INSERT INTO pedidos (mesa, comanda) VALUES ('$MesaEscolhida','$NumeroComanda')");
    ///echo $FinalPed;
    if ($DadosCarrinho !== null) { //Se os dados do carrinho for diferente de nulo 
        foreach ($DadosCarrinho as $infoProd) {
            $nome = $infoProd['nome'];
            //$ResultadoMesa = $sql->query("SELECT mesa FROM mesas WHERE estado = 'Livre' ORDER BY RAND() LIMIT 1");
            //$tipo = $produto['tipo'];
            //$id = $produto['id'];
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
                //echo "Tem Hamburguer";
                $linha = $Res_Burguer->fetch_assoc();
                $Dados_Burguer[] = array(
                    'id' => $linha['id_burguer'],
                    'qtd' => $quantidade
                );
                foreach ($Dados_Burguer as $Burguer):
                    /*echo $Burguer['id'] . PHP_EOL;
                    echo $Burguer['qtd'] . PHP_EOL;*/
                    $id = $Burguer['id'];
                    $quantidade = $Burguer['qtd'];
                    //$AtualizarBurguer = "UPDATE pedidos SET id_burguer = $id , qtd = '$quantidade' WHERE comanda = '$NumeroComanda'";
                    $sql->query($AtualizarBurguer);
                endforeach;
            }else{
                if($Res_Beb ->num_rows >0){
                    //echo "Tem bebida";
                    echo "Número da comanda: " . $NumeroComanda;
                    $linha = $Res_Beb->fetch_assoc();
                    $Dados_Beb[] = array(
                        'id' => $linha['id_bebida'],
                        'qtd' => $quantidade
                    );
                    foreach ($Dados_Beb as $Bebida):
                        /*echo $Burguer['id'] . PHP_EOL;
                        echo $Burguer['qtd'] . PHP_EOL;*/
                        $id = $Bebida['id'];
                        $quantidade = $Bebida['qtd'];
                        //$AtualizarBeb = "UPDATE pedidos SET id_bebida = $id , qtdbeb = '$quantidade' WHERE comanda = '$NumeroComanda'";
                        $sql->query($AtualizarBeb);
                    endforeach;
                }else{
                    if($Res_Acom ->num_rows >0){
                        //echo "Tem Acompanhamento";
                        $linha = $Res_Acom->fetch_assoc();
                        $Dados_Acom[] = array(
                            'id' => $linha['id_acompanhamento'],
                            'qtd' => $quantidade
                        );
                        foreach ($Dados_Acom as $Acom):
                            /*echo $Burguer['id'] . PHP_EOL;
                            echo $Burguer['qtd'] . PHP_EOL;*/
                            $id = $Acom['id'];
                            $quantidade = $Acom['qtd'];
                            //$AtualizarAcom = "UPDATE pedidos SET id_acompanhamento = $id , qtdacomp = '$quantidade' WHERE comanda = '$NumeroComanda'";
                            $sql->query($AtualizarAcom);
                        endforeach;
                    }else{
                        if($Res_Sobremesa ->num_rows >0){
                             //echo "Tem sobremesa";
                             $linha = $Res_Sobremesa->fetch_assoc();
                             $Dados_Sobremesa[] = array(
                                'id' => $linha ['id_sobremesa'],
                                'qtd' => $quantidade
                             );
                             foreach ($Dados_Sobremesa as $Sobremesa):
                                /*echo $Burguer['id'] . PHP_EOL;
                                echo $Burguer['qtd'] . PHP_EOL;*/
                                $id = $Sobremesa['id'];
                                $quantidade = $Sobremesa['qtd'];
                                //$AtualizarSobremesa = "UPDATE pedidos SET id_sobremesa = $id , qtdsobremesa = '$quantidade' WHERE comanda = '$NumeroComanda'";
                                $sql->query($AtualizarSobremesa);
                            endforeach;
                        }else{
                            if($Res_Molho ->num_rows >0){
                                //echo "Tem acompanhamento";
                                $linha = $Res_Molho->fetch_assoc();
                                $Dados_Molho[] = array(
                                    'id' => $linha ['id_molho'],
                                    'qtd' => $quantidade
                                );
                                foreach ($Dados_Molho as $Molho):
                                    /*echo $Burguer['id'] . PHP_EOL;
                                    echo $Burguer['qtd'] . PHP_EOL;*/
                                    $id = $Molho['id'];
                                    $quantidade = $Molho['qtd'];
                                    //$AtualizarMolho = "UPDATE pedidos SET id_molho = $id , qtdmolho = '$quantidade' WHERE comanda = '$NumeroComanda'";
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
