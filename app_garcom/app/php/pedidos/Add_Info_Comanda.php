<?php
$timezone = new DateTimeZone('America/Sao_Paulo'); //Data com Fuso Horario de São Paulo 
$Dataagora = date('Y-m-d H:i:s'); //Pega a Hora com base na rede e fuso Horario
include '../conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Verifica se o metodo é post (Tratamenti de erros )
    $DadosCarrinho = json_decode(file_get_contents('php://input'), true); //Decodificação de erros da expressão JSON
    if ($DadosCarrinho !== null) { //Se os dados do carrinho for diferente de nulo 
        //$nome = ['nome'];
        //$quantidade = ['quantidade'];
        $mesa = $DadosCarrinho['mesa'];
        $NumeroComanda = $DadosCarrinho['comanda'];
        $idPedido = $DadosCarrinho['idPedido'];
        $obs = $DadosCarrinho['obs'];
        $horaPedido = $Dataagora;
        
        //foreach ($DadosCarrinho as $infoProd): //um foreach para exibir os dados do carrinho e separar, já que os dados vem tudo junto 
         $MesaBanco = ("SELECT * FROM comandas WHERE comanda = $NumeroComanda  AND mesa = $mesa");
         $MesaEscolhida = $sql->query($MesaBanco);
        if (mysqli_num_rows($MesaEscolhida) > 0) {  
            $MesaInfo = mysqli_fetch_assoc($MesaEscolhida);
            //var_dump($MesaInfo);
            //echo $MesaInfo;
            $com = $MesaInfo['comanda'];
            $mes = $MesaInfo['mesa'];
            //var_dump($com);
            //var_dump($mes);
            //echo $MesaBanco;

            if ($com == $NumeroComanda AND $mes == $mesa) {
                //$AtualizarMesa = $sql->query("UPDATE mesas SET estado = 'Ocupada' WHERE mesa = '$mesa'");
                $ComandaEscolhida = $sql->query("SELECT * FROM comandas WHERE comanda = $NumeroComanda");
                    $ComandaInfo = mysqli_fetch_assoc($ComandaEscolhida);
                        usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                        $FinalProd = $sql->query("INSERT INTO pedidos (mesa, comanda, id_burguer, qtd, id_bebida, qtdbeb, id_acompanhamento, qtdacomp, id_molho, qtdmolho, id_sobremesa, qtdsobremesa, obs, horaPedido) VALUES ($mesa, $NumeroComanda, '404', '404', '404', '404', '404', '404', '404', '404', '404', '404', '$obs', '$horaPedido')");
                            foreach ($DadosCarrinho ['produtos'] as $infoProd){
                            $nome = $infoProd['nome'];
                            var_dump($nome);
                            $quantidade = $infoProd['quantidade'];
                            var_dump($quantidade);
                            $DadosProd = array();
                            $BurguerDados = "SELECT id_burguer FROM burguer WHERE nome = '$nome'";
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                            $BebDados = "SELECT id_bebida FROM bebida WHERE nome = '$nome'";
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
                            $SobremesaDados = "SELECT id_sobremesa FROM sobremesa WHERE nome = '$nome'";
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                            $AcompDados = "SELECT id_acompanhamento FROM acompanhamento WHERE nome = '$nome'";
                            usleep(2000);
                            $MolhoDados = "SELECT id_molho FROM molho WHERE nome = '$nome'";
                            usleep(2000);
                            $Res_Burguer = $sql->query($BurguerDados);
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
                            $Res_Beb = $sql->query($BebDados);
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                            $Res_Sobremesa = $sql->query($SobremesaDados);
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                            $Res_Acompanhamento = $sql->query($AcompDados);
                            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
                            $Res_Molho = $sql->query($MolhoDados);
    
                            if ($Res_Burguer->num_rows > 0) {
                                $linha = $Res_Burguer->fetch_assoc();
                                $Dados_Burguer[] = array(
                                    'id' => $linha['id_burguer'],
                                    'qtd' => $quantidade
                                );
                                foreach ($Dados_Burguer as $Burguer):
                                    $id = $Burguer['id'];
                                    $quantidade = $Burguer['qtd'];
                                    $sql->query("UPDATE pedidos SET id_burguer='$id', qtd='$quantidade' WHERE comanda='$com'");
                                endforeach;
                            } else {
                                if ($Res_Beb->num_rows > 0) {
                                    $linha = $Res_Beb->fetch_assoc();
                                    $Dados_Beb[] = array(
                                        'id' => $linha['id_bebida'],
                                        'qtd' => $quantidade
                                    );
                                    foreach ($Dados_Beb as $Bebida):
                                        $id = $Bebida['id'];
                                        $quantidade = $Bebida['qtd'];
                                        $sql->query("UPDATE pedidos SET id_bebida='$id', qtdbeb='$quantidade' WHERE comanda='$com'");
                                    endforeach;
                                } else {
                                    if ($Res_Sobremesa->num_rows > 0) {
                                        $linha = $Res_Sobremesa->fetch_assoc();
                                        $Dados_Sobremesa[] = array(
                                            'id' => $linha['id_sobremesa'],
                                            'qtd' => $quantidade
                                        );
                                        foreach ($Dados_Sobremesa as $Sobremesa):
                                            $id = $Sobremesa['id'];
                                            $quantidade = $Sobremesa['qtd'];
                                            $sql->query("UPDATE pedidos SET id_sobremesa='$id', qtdsobremesa='$quantidade' WHERE comanda='$com'");
                                        endforeach;
                                    } else {
                                        if ($Res_Acompanhamento->num_rows > 0) {
                                            $linha = $Res_Acompanhamento->fetch_assoc();
                                            $Dados_Acom[] = array(
                                                'id' => $linha['id_acompanhamento'],
                                                'qtd' => $quantidade
                                            );
                                            foreach ($Dados_Acom as $Acom):
                                                $id = $Acom['id'];
                                                $quantidade = $Acom['qtd'];
                                                $sql->query("UPDATE pedidos SET id_acompanhamento='$id', qtdacomp='$quantidade' WHERE comanda='$com'");
                                            endforeach;
                                        } else {
                                            if ($Res_Molho->num_rows > 0) {
                                                $linha = $Res_Molho->fetch_assoc();
                                                $Dados_Molho[] = array(
                                                    'id' => $linha['id_molho'],
                                                    'qtd' => $quantidade
                                                );
                                                foreach ($Dados_Molho as $Molho):
                                                    $id = $Molho['id'];
                                                    $quantidade = $Molho['qtd'];
                                                    $sql->query("UPDATE pedidos SET id_molho='$id', qtdmolho='$quantidade' WHERE comanda='$com'");
                                                endforeach;
                                                echo"Pedido concluido";
                                                }
                                            }
                                        }
                                }
                            }
                        }
                        /*}else{
                            echo "ERRO 3";
                        }
                        */
                    //$AtualizarMesa = "UPDATE mesas SET estado = 'Ocupada' WHERE mesa = $mesa";
                    
                } else {
                echo "Mesa ou comanda errada";
            }
        }else{

        }
    //endforeach;
        // Agora você pode fazer o que quiser com os dados do carrinho
        // Por exemplo, você pode salvá-los em um banco de dados ou processá-los de alguma outra forma.
    } else {
        http_response_code(405); // Método não permitido
    }
}else{
   echo "ERRO 6";
}
