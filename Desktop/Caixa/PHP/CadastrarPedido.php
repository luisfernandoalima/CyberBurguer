<?php
include_once('conn.php');
// Receba os dados do corpo da requisição
$JsonRes = file_get_contents('php://input');
// Decodifique os dados JSON
$data = json_decode($JsonRes, true);
$DataBd = date('Y-m-d'); //Pega a Data
$SituaçãoVend = "ENTREGUE";
$SituaçãoPed = "PRONTO";
//$TaxaServ = 10.00;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPedido = $data['idPedido'];
    $idFuncionario = $data['idFuncionario'];
    $idcli = $data['idCli'];
    $cupom = $data['cupom'];
    $valorDesconto = $data['valorDesconto'];
    $valorDesconto = str_replace(',', '.', $valorDesconto);
    $valorFinal = $data['valorFinal'];
    $porCent = 0.10;
    $TaxaServ = $valorFinal * $porCent;
    $formaPagamento = $data['formaPagamento'];
    $DadosPedido = $sql->query("SELECT * FROM pedidos WHERE id = $idPedido");
    if(mysqli_num_rows($DadosPedido) > 0 ){
        foreach ($DadosPedido AS $Resul):
            $idBurguer = $Resul['id_burguer'];
            $idbebida = $Resul['id_bebida'];
            $idacompanhamento = $Resul['id_acompanhamento'];
            $idsobremesa = $Resul['id_sobremesa'];
            $qtdBurguer = $Resul['qtd'];
            $qtdbeb = $Resul['qtdbeb'];
            $qtdacomp = $Resul['qtdacomp'];
            $qtdsobremesa = $Resul['qtdsobremesa'];
            $DadosProd = array();
            $BurguerDados = "SELECT * FROM burguer WHERE id_burguer = '$idBurguer'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
            $BebDados = "SELECT * FROM bebida WHERE id_bebida = '$idbebida'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $AcomDados = "SELECT * FROM acompanhamento WHERE id_acompanhamento = '$idacompanhamento'";
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $SobremesaDados = "SELECT * FROM sobremesa WHERE id_sobremesa = '$idsobremesa'";
            $Res_Burguer = $sql->query($BurguerDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Beb = $sql->query($BebDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados 
            $Res_Acom = $sql->query($AcomDados);
            usleep(2000); //Da um certo tempo entre a execução de um script e outro, com o intuito de não saturar o banco de dados  
            $Res_Sobremesa = $sql->query($SobremesaDados);
            
            //AQUI É UM ESPAÇO EXCLUSIVO PARA COLOCAR O NOME DO PRODUTO E OS PRODUTOS QUE COMPOE ELE 
            //Se tiver tempo reduzir o codigo a seguinte logica, receber todos os produtos dentro de um 
            //vetor e assim colocar em evidencia os nomes e as quantidades do produto, e em vez de 
            //comparar o nome do banco de dados só comparar o produto.
            //-------------------------------HAMBURGUERS--------------------------------------------
            $DarkBurguer = ['Pão Preto' , 'Carne Moida 350g', 'Alface' , 'Queijo mussarela' , 'Tomate', 'Cebola' , 'Caramelo' ];
            $BurguerCraft = ['Pão Quadrado' , 'Carne Moida 700g', 'Alface', 'Queijo Prato', 'Cebola', 'Molho da Casa'];  //Lembrete: Descontar duas vezes a carne nesse Hamburguer
            $GarticBurguer = ['Pão de Cookie' , 'Ganache cremoso de Chocolate meio amargo', 'Fatias de morango'];
            $SimsBurguer = ['Pão Tradicional' , 'Carne de Soja 350g', 'Quacamole', 'Tomate', 'Queijo Cheddar', 'Crispy de Cebola'];
            $SuperMarioBurguer2 = ['Pão de Cebola' , 'Carne de Soja 350g', 'Tomate', 'Queijo de batata', 'Cebola', 'Cogumelos'];
            //-------------------------------Acompanhamento------------------------------------------
            $Nuggets = ['Nuggets']; //Por exemplo o acompanhamento nuggets contém o produto nuggets 
            $BatataFritacomCheddareBacon = ['Batata Frita', 'Bacon', 'Cheddar'];
            $BatataFrita = ['Batata Frita'];
            $OnionRings = ['Onion Rings'];
            $NachoscomGuacamole = ['Nachos com Guacamole'];
            //-----------------------------------Bebida----------------------------------------------
            $AguaNatural = ['Agua Natural 250ml'];
            $Aguacomgãs = ['Agua com Gas 500ml'];
            $RefrigeranteLata = ['Refrigerante Lata'];
            $RefrigeranteGarrafadeVidro = ['Refrigerante Garrafa de Vidro'];
            $SucoNaturaldeLaranja = ['Laranja','Açucar'];
            $SucoNaturaldeMorango = ['Morango','Açucar'];
            $SucoNaturaldeUva = ['Uva','Açucar'];
            $SucoNaturaldeLimão = ['Limão','Açucar'];
            $SucoNaturaldeMaracuja = ['Maracuja','Açucar'];
            $SucoNaturaldeGoiaba = ['Goiaba','Açucar'];
            $MilkShakeChocolate = ['Leite', 'Sorvete' ,'Calda de Chocolate'];
            $MilkShakeMorango = ['Leite', 'Sorvete' ,'Calda de Morango'];
            $MilkShakeCaramelo = ['Leite', 'Sorvete' ,'Calda de Caramelo'];
            $MilkShakeOvomaltine = ['Leite', 'Sorvete' ,'Calda de Ovomaltine'];
            $MilkShakeChocomenta = ['Leite', 'Sorvete' ,'Calda de Chocomenta'];
            //----------------------------------Sobremesa---------------------------------------------
            $TortadeLimão = ['Torta de Limão'];
            $TortaHolandesa = ['Torta Holandesa'];
            $TortadeMorango = ['Torta de Morango'];
            $SorvetedeCookiesCream = ['Sorvete de CookiesCream'];
            $SorvetedeBaunilha = ['Sorvete de Baunilha'];
            $SorvetedeChocolate = ['Sorvete de Chocolate'];
            $SorveteNapolitano = ['Sorvete Napolitano'];
            //------------------------------------FIM-----------------------------------------------

            if ($Res_Burguer->num_rows > 0) {
                $linha = $Res_Burguer->fetch_assoc();
                if ($linha) {
                    $Dados_Burguer[] = array(
                        'id' => $linha['id_burguer'],
                        'nome' => $linha['nome'],
                    );

                    foreach ($Dados_Burguer as $Burguer) {
                        $idHam = $Burguer['id'];
                        $nomeHam = $Burguer['nome'];
                        $nomeSemEspacosHam = str_replace(' ', '', $nomeHam);
                    }
                } else {
                    echo "Nenhum resultado encontrado para id_burguer: $idBurguer";
                }
                $InserirVenda = "INSERT INTO venda (id, id_func, id_cli, data, codigo_desconto, forma_pagamento, desconto, taxa_servico, situacao, valor_total) VALUES 
                ($idPedido, $idFuncionario, $idcli, '$DataBd', '$cupom', '$formaPagamento', $valorDesconto, $TaxaServ, '$SituaçãoVend', $valorFinal)";
                $ResInserirVenda = $sql->query($InserirVenda);
            }
             //-------------------------------Hamburguer------------------------------------------
            function atualizarProduto($sql, $produtoArray, $qtdBurguer) {
                foreach ($produtoArray as $posicao) {
                    $ProcurarProd = "SELECT qtd FROM produto WHERE prod = '$posicao'";
                    $Resultado = $sql->query($ProcurarProd);

                    if (mysqli_num_rows($Resultado)) {
                        $linha = mysqli_fetch_assoc($Resultado);
                        $QuantidadeProd = $linha['qtd'];
                        $QuantidadeTotal = $QuantidadeProd - $qtdBurguer;

                        $updateBurguer = "UPDATE produto SET qtd = $QuantidadeTotal WHERE prod = '$posicao'";
                        $sql->query($updateBurguer);
                    }
                }
            }
            if ($nomeSemEspacosHam == 'DarkBurguer') {
                atualizarProduto($sql, $DarkBurguer, $qtdBurguer);
            } elseif ($nomeSemEspacosHam == 'BurguerCraft') {
                atualizarProduto($sql, $BurguerCraft, $qtdBurguer);
            } elseif ($nomeSemEspacosHam == 'GarticBurguer') {
                atualizarProduto($sql, $GarticBurguer, $qtdBurguer);
            } elseif ($nomeSemEspacosHam == 'SimsBurguer') {
                atualizarProduto($sql, $SimsBurguer, $qtdBurguer);
            } elseif ($nomeSemEspacosHam == 'SuperMarioBurguer2') {
                atualizarProduto($sql, $SuperMarioBurguer2, $qtdBurguer);
            }

            if ($Res_Beb->num_rows > 0) {
                $linhaBeb = $Res_Beb->fetch_assoc();
                if ($linhaBeb) {
                    $Dados_Beb[] = array(
                        'id' => $linhaBeb['id_bebida'],
                        'nome' => $linhaBeb['nome'],
                    );
            
                    foreach ($Dados_Beb as $Bebida) {
                        $idBeb = $Bebida['id'];
                        $nomeBeb = $Bebida['nome'];
                        $nomeSemEspacosBeb = str_replace(' ', '', $nomeBeb);
                    }
            
                    // ... (o restante do seu código para processar as bebidas)
                } else {
                    echo "Nenhum resultado encontrado para id_bebida: $idbebida";
                }
            }
             //-------------------------------Bebida------------------------------------------
            function atualizarProdutoBebida($sql, $produtoArray, $qtdbeb) {
                foreach ($produtoArray as $posicaoBeb):
                    $ProcurarProdBeb = "SELECT qtd FROM produto WHERE prod = '$posicaoBeb'";
                    $ResultadoBeb = $sql->query($ProcurarProdBeb);
            
                    if (mysqli_num_rows($ResultadoBeb)) {
                        $linhaBeb = mysqli_fetch_assoc($ResultadoBeb);
                        $QuantidadeProdBeb = $linhaBeb['qtd'];
                        $QuantidadeTotalBeb = $QuantidadeProdBeb - $qtdbeb;
            
                        $updateBeb = "UPDATE produto SET qtd = $QuantidadeTotalBeb WHERE prod = '$posicaoBeb'";
                        $sql->query($updateBeb);
                    }
                endforeach;
            }
            if ($nomeSemEspacosBeb == 'AguaNatural') {
                atualizarProdutoBebida($sql, $AguaNatural, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'Aguacomgãs') {
                atualizarProdutoBebida($sql, $Aguacomgãs, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'RefrigeranteLata') {
                atualizarProdutoBebida($sql, $RefrigeranteLata, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'RefrigeranteGarrafadeVidro') {
                atualizarProdutoBebida($sql, $RefrigeranteGarrafadeVidro, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeLaranja') {
                atualizarProdutoBebida($sql, $SucoNaturaldeLaranja, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeMorango') {
                atualizarProdutoBebida($sql, $SucoNaturaldeMorango, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeUva') {
                atualizarProdutoBebida($sql, $SucoNaturaldeUva, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeLimão') {
                atualizarProdutoBebida($sql, $SucoNaturaldeLimão, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeMaracuja') {
                atualizarProdutoBebida($sql, $SucoNaturaldeMaracuja, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'SucoNaturaldeGoiaba') {
                atualizarProdutoBebida($sql, $SucoNaturaldeGoiaba, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'MilkShakeChocolate') {
                atualizarProdutoBebida($sql, $MilkShakeChocolate, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'MilkShakeMorango') {
                atualizarProdutoBebida($sql, $MilkShakeMorango, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'MilkShakeCaramelo') {
                atualizarProdutoBebida($sql, $MilkShakeCaramelo, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'MilkShakeOvomaltine') {
                atualizarProdutoBebida($sql, $MilkShakeOvomaltine, $qtdbeb);
            } elseif ($nomeSemEspacosBeb == 'MilkShakeChocomenta') {
                atualizarProdutoBebida($sql, $MilkShakeChocomenta, $qtdbeb);
            }


            //-------------------------------Acompanhamento------------------------------------------
            if ($Res_Acom->num_rows > 0) {
                $linhaAcom = $Res_Acom->fetch_assoc();
                if ($linhaAcom) {
                    $Dados_Acom[] = array(
                        'id' => $linhaAcom['id_acompanhamento'],
                        'nome' => $linhaAcom['nome'],
                    );
            
                    foreach ($Dados_Acom as $Acompanhamento) {
                        $idAcom = $Acompanhamento['id'];
                        $nomeAcom = $Acompanhamento['nome'];
                        $nomeSemEspacosAcom = str_replace(' ', '', $nomeAcom);
                    }
            
                    // ... (o restante do seu código para processar as bebidas)
                } else {
                    echo "Nenhum resultado encontrado para id_acompanhamento: $idAcom";
                }
            }
            function atualizarProdutoacompanhamento($sql, $produtoArray, $qtdacomp) {
                foreach ($produtoArray as $posicaoAcom) {
                    $ProcurarProdAcom = "SELECT qtd FROM produto WHERE prod = '$posicaoAcom'";
                    $ResultadoAcom = $sql->query($ProcurarProdAcom);
            
                    if (mysqli_num_rows($ResultadoAcom)) {
                        $linhaBeb = mysqli_fetch_assoc($ResultadoAcom);
                        $QuantidadeProdAcom = $linhaBeb['qtd'];
                        $QuantidadeTotalAcom = $QuantidadeProdAcom - $qtdacomp;
            
                        $updateAcom = "UPDATE produto SET qtd = $QuantidadeTotalAcom WHERE prod = '$posicaoAcom'";
                        $sql->query($updateAcom);
                    }
                }
            }
            if ($nomeSemEspacosAcom == 'Nuggets') {
                atualizarProdutoacompanhamento($sql, $Nuggets, $qtdacomp);
            } elseif ($nomeSemEspacosAcom == 'BatataFritacomCheddareBacon') {
                atualizarProdutoacompanhamento($sql, $BatataFritacomCheddareBacon, $qtdacomp);
            } elseif ($nomeSemEspacosAcom == 'BatataFrita') {
                atualizarProdutoacompanhamento($sql, $BatataFrita, $qtdacomp);
            } elseif ($nomeSemEspacosAcom == 'OnionRings') {
                atualizarProdutoacompanhamento($sql, $OnionRings, $qtdacomp);
            }   elseif ($nomeSemEspacosAcom == 'NachoscomGuacamole') {
                atualizarProdutoacompanhamento($sql, $NachoscomGuacamole, $qtdacomp);
            }



            //-------------------------------Sobremesa--------------------------------------------------
            if ($Res_Sobremesa->num_rows > 0) {
                $linhaSobremesa = $Res_Sobremesa->fetch_assoc();
                if ($linhaSobremesa) {
                    $Dados_Sobre[] = array(
                        'id' => $linhaSobremesa['id_sobremesa'],
                        'nome' => $linhaSobremesa['nome'],
                    );
            
                    foreach ($Dados_Sobre as $Sobremesa) {
                        $idBeb = $Sobremesa['id'];
                        $nomeSobre = $Sobremesa['nome'];
                        $nomeSemEspacosSobre = str_replace(' ', '', $nomeSobre);
                    }
            
                    // ... (o restante do seu código para processar as bebidas)
                } else {
                    echo "Nenhum resultado encontrado para id_sobre: $idBeb";
                }
            }
            function atualizarProdutosobremesa($sql, $produtoArray, $qtdsobremesa) {
                foreach ($produtoArray as $posicaoSobremesa) {
                    $ProcurarProdSobre = "SELECT qtd FROM produto WHERE prod = '$posicaoSobremesa'";
                    $ResultadoSobre = $sql->query($ProcurarProdSobre);
            
                    if (mysqli_num_rows($ResultadoSobre)) {
                        $linhaBeb = mysqli_fetch_assoc($ResultadoSobre);
                        $QuantidadeProdSobremesa = $linhaBeb['qtd'];
                        $QuantidadeTotalSobremesa = $QuantidadeProdSobremesa - $qtdsobremesa;
            
                        $updateSobre = "UPDATE produto SET qtd = $QuantidadeTotalSobremesa WHERE prod = '$posicaoSobremesa'";
                        $sql->query($updateSobre);
                    }
                }
            }
            if ($nomeSemEspacosSobre == 'TortadeLimão') {
                atualizarProdutosobremesa($sql, $TortadeLimão, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'TortaHolandesa') {
                atualizarProdutosobremesa($sql, $TortaHolandesa, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'TortadeMorango') {
                atualizarProdutosobremesa($sql, $TortadeMorango, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'SorvetedeCookiesCream') {
                atualizarProdutosobremesa($sql, $SorvetedeCookiesCream, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'SorvetedeBaunilha') {
                atualizarProdutosobremesa($sql, $SorvetedeBaunilha, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'SorvetedeChocolate') {
                atualizarProdutosobremesa($sql, $SorvetedeChocolate, $qtdsobremesa);
            } elseif ($nomeSemEspacosSobre == 'SorveteNapolitano') {
                atualizarProdutosobremesa($sql, $SorveteNapolitano, $qtdsobremesa);
            }
        endforeach;
    }
} else {
}

























//Caso dê erro
/*include_once('conn.php');
// Receba os dados do corpo da requisição
$JsonRes = file_get_contents('php://input');
// Decodifique os dados JSON
$data = json_decode($JsonRes, true);
$DataBd = date('Y-m-d'); //Pega a Data
$SituaçãoVend = "ENTREGUE";
$SituaçãoPed = "PRONTO";
//$TaxaServ = 10.00;



// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPedido = $data['idPedido'];
    //echo "Id:" . $idPedido;
    $idFuncionario = $data['idFuncionario'];
    //echo "idFuncionario:" . $idFuncionario;
    $idcli = $data['idCli'];
    //echo "idCli:" . $idcli;
    $cupom = $data['cupom'];
    //echo "cupom:" . $cupom;
    $valorDesconto = $data['valorDesconto'];
    $valorDesconto = str_replace(',', '.', $valorDesconto);
    //echo "valorDesconto:" . $valorDesconto;
    $valorFinal = $data['valorFinal'];
    $porCent = 0.10;
    $TaxaServ = $valorFinal * $porCent;
    echo $TaxaServ;
    //echo "valorFinal:" . $valorFinal;
    $formaPagamento = $data['formaPagamento'];
    //echo "formaPagamento:" . $formaPagamento;
    //$cupomAdd = "NENHUM CUPOM SELECIONADO";
    $InserirVenda = "INSERT INTO venda (id, id_func, id_cli, data, codigo_desconto, forma_pagamento, desconto, taxa_servico, situacao, valor_total) VALUES 
    ($idPedido,$idFuncionario,$idcli,'$DataBd','$cupom','$formaPagamento', $valorDesconto ,$TaxaServ,'$SituaçãoVend', $valorFinal)";
    //echo $InserirVenda;
    $ResInserirVenda = $sql->query($InserirVenda);
    //echo $ResInserirVenda;
    /*if(mysqli_num_rows($ResInserirVenda) > 0){
        $AtualizarBeb = "UPDATE pedidos SET situacao = $id , qtdbeb = '$quantidade' WHERE comanda = '$NumeroComanda'";
        $sql->query($AtualizarBeb);
    }
    */
    //$response = array('status' => 'success', 'message' => 'Pedido finalizado com sucesso');
    //ob_clean();
    // Adicione mensagens de log para depuração
    //error_log("Resposta do PHP: " . json_encode($response));
    //echo json_encode($response);
/*} else {
    // Se a requisição não for do tipo POST, retorna um erro
    //$response = array('status' => 'error', 'message' => 'Método não permitido');

    // Adicione mensagens de log para depuração
    //error_log("Resposta do PHP: " . json_encode($response));
    //echo json_encode($response);
}
*/

?>
