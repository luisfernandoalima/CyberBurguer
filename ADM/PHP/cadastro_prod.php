<?php
include_once('conn.php');

$cat_prod = $_POST['cat_prod']; //Categoria de produtos 
$loteProd = $_POST['lote_func']; // Lote do produto
$nomeProd = $_POST['nomeProd'];
$preComProd = $_POST['preComProd']; //preço da compra
$preVenProd = $_POST['preVenProd'];
$qtdProd = $_POST['qtdProd'];
$dtVenProd = $_POST['dtVenProd'];
$dtComProd = $_POST['dtComProd'];
$tipo = $_POST['tipoProd'];
//Formulário Hamburguer
$nomeHan = $_POST['nomeHan'];
$preHam = $_POST['preHam'];
//Formulario bebida
$nomeBeb = $_POST['nomeBeb'];
$preBeb = $_POST['preBeb'];
//Formulario de acompanhamento
$nomeAcom = $_POST['nomeAcom'];
$preAcom = $_POST['preAcom'];
//Formulário de fornecedores
$cnpjForn = $_POST['cnpjForn'];
$nomeForn = $_POST['nomeForn'];
$telForn = $_POST['telForn'];
$tipoForn = $_POST['tipoForn'];
//Cadastro Produtos
if ($cat_prod == 1) {
    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date('Y-m-d');
    // Convertendo as datas para timestamps
    if(empty($tipo) || empty($nomeProd) || empty($preComProd)|| empty($preVenProd)|| empty($qtdProd)|| empty($preComProd)|| empty($dtComProd)|| empty($preVenProd) ){
        echo '<script>alert("Preencha todos os campos para concluir o cadastro!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
    }elseif(empty($_FILES["imgProd"]) || empty($_FILES["imgProd"]["name"])){
        echo '<script>alert("Erro: Coloque uma imagem no produto!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
    }elseif ($dtVenProd <= $dataAtual) {
        $dtVenFormatada = date('d-m-Y', strtotime($dtVenProd));
        echo '<script>alert("Erro: Está tentando cadastrar um Produto VENCIDO! de Data de vencimento: '. $dtVenFormatada .'. Insira uma data válida."); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
    }else{
        $array1 = $sql->query("SELECT * FROM produto WHERE prod = '$nomeProd'");
        $check1 = mysqli_num_rows($array1);
        if ($check1 >= 1) {
            echo '<script>alert("Produto:' . $nomeProd . 'já cadastrado!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php";  </script>';
        } else {
            $uploadProd = "imgbd/prod/";
            $arquivoProd = $_FILES["imgProd"]["name"];
            $separaProd = explode(".", $arquivoProd);
            $separaProd = array_reverse($separaProd);
            $tipoProd = $separaProd[0];
            $imgProd = $nomeProd . '.' . $tipoProd;
            $status = "ATIVO";
            if (move_uploaded_file($_FILES['imgProd']['tmp_name'], '../../' . $uploadProd . $imgProd)) {
                    $uploadfileProd = $uploadProd . $imgProd;
                } else {
                    echo '<script>alert("Erro: falha no upload da imagem!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
                }
            $sql->query("INSERT INTO produto (lote, tipo, prod, preco_compra, preco_venda, qtd, dta_compra, dta_vencimento, status ,img) 
            VALUES ('$loteProd','$tipo', '$nomeProd', '$preComProd','$preVenProd','$qtdProd','$dtComProd','$dtVenProd','$status', '$uploadfileProd')");
            echo '<script>alert("Produto: ' . $nomeProd . ' Cadastrado com sucesso!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';   
        }
    }
    //Cadastro Hamburguer
} elseif ($cat_prod  == 2) {
    if(empty($nomeHan) || empty($preHam)) { //Verifica se tem algum campo vazio
        echo '<script>alert("Preencha todos os campos para concluir o cadastro!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
    }elseif (empty($_FILES["imgBurguer"]) || empty($_FILES["imgBurguer"]["name"])) {
        echo '<script>alert("Erro: Coloque uma imagem no produto!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
    }else{
        $array2 = $sql->query("SELECT * FROM burguer WHERE nome = '$nomeHan'");
        $check2 = mysqli_num_rows($array2);
        if ($check2 >= 1) {
            echo '<script>alert(" Hamburguer: ' . $nomeHan . ' Já Cadastrado"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
        } else {
            $uploadBurguer = "imgbd/burguer/";
            $arquivoBurguer = $_FILES["imgBurguer"]["name"];
            $separaBurguer = explode(".", $arquivoBurguer);
            $separaBurguer = array_reverse($separaBurguer);
            $tipoBurguer = $separaBurguer[0];
            $imgBurguer = $nomeHan . '.' . $tipoBurguer;
            $status = "ATIVO";
            if (move_uploaded_file($_FILES['imgBurguer']['tmp_name'], '../../' . $uploadBurguer . $imgBurguer)) {
                $uploadfileBurguer = $uploadBurguer . $imgBurguer;
            } else {
                echo '<script>alert("Erro: falha no upload da imagem!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
            }
            $sql->query("INSERT INTO burguer (nome, preco, status, img) VALUES ('$nomeHan', '$preHam', '$status', '$uploadfileBurguer')");
            echo '<script>alert("Hamburguer: ' . $nomeHan . ' Cadastrado com sucesso!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';      
        }
    }
    //Cadastro Bebidas
} elseif ($cat_prod  == 3) {
    if(empty($nomeBeb) || empty($preBeb)) { //Verifica se tem algum campo vazio
        echo '<script>alert("Preencha todos os campos para concluir o cadastro!");</script>';
    }elseif (empty($_FILES["imgBeb"]) || empty($_FILES["imgBeb"]["name"])) {
        echo '<script>alert("Erro: Coloque uma imagem no produto!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>';
    }else{
        $array3 = $sql->query("SELECT * FROM bebida WHERE nome = '$nomeBeb'");
        $check3 = mysqli_num_rows($array3);
        if ($check3 >= 1) {
            echo '<script>alert("Bebida: ' . $nomeBeb . ' já cadastrado! "); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
        } else {
            $uploadBeb = "imgbd/beb/";
            $arquivoBeb = $_FILES["imgBeb"]["name"];
            $separaBeb = explode(".", $arquivoBeb);
            $separaBeb = array_reverse($separaBeb);
            $tipoBeb = $separaBeb[0];
            $imgBeb = $nomeBeb . '.' . $tipoBeb;
            $status = "ATIVO";
            if (move_uploaded_file($_FILES['imgBeb']['tmp_name'], '../../' . $uploadBeb . $imgBeb)) {
                $uploadfileBeb = $uploadBeb . $imgBeb;
            } else {
                echo '<script>alert("Erro: falha no upload da imagem!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php";</script>'; 
            }
            $sql->query("INSERT INTO bebida (nome, preco, status, img ) VALUES ('$nomeBeb', '$preBeb' , '$status', '$uploadfileBeb')");
            echo '<script>alert("Bebida: ' . $nomeBeb . ' Cadastrado com sucesso!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
        }
    }
    //Cadastro Acompanhamento
} elseif ($cat_prod  == 4) {
    if(empty($nomeAcom) || empty($preAcom)) { //Verifica se tem algum campo vazio
        echo '<script>alert("Preencha todos os campos para concluir o cadastro!");</script>';
    }elseif (empty($_FILES["imgAcom"]) || empty($_FILES["imgAcom"]["name"])) {
        echo '<script>alert("Erro: Coloque uma imagem no produto!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php";</script>';
    }else{
    $array4 = $sql->query("SELECT * FROM acompanhamento WHERE nome = '$nomeAcom'");
    $check4 = mysqli_num_rows($array4);
    if ($check4 >= 1) {
        echo '<script>alert("acompanhamento: ' . $nomeAcom . ' Já cadastrado!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
    } else {
        $uploadAcom = "imgbd/acompanhamento/";
        $arquivoAcom = $_FILES["imgAcom"]["name"];
        $separaAcom = explode(".", $arquivoAcom);
        $separaAcom = array_reverse($separaAcom);
        $tipoAcom = $separaAcom[0];
        $imgAcom = $nomeAcom. '.' . $tipoAcom;
        $status = "ATIVO";
        if (move_uploaded_file($_FILES['imgAcom']['tmp_name'], '../../' . $uploadAcom . $imgAcom)) {
            $uploadfileAcom = $uploadAcom . $imgAcom;        
        }else{
            echo '<script>alert("Erro: falha no upload da imagem!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php";</script>'; 
        }
        
        $sql->query("INSERT INTO acompanhamento (nome, preco, status, img) VALUES ('$nomeAcom', '$preAcom' , '$status' ,'$uploadfileAcom')");
        echo '<script>alert("acompanhamento: ' . $nomeAcom . ' Cadastrado com sucesso!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
    }
    }
    //Cadastro Fornecedor
} elseif ($cat_prod == 5) {
    if(empty($cnpjForn) || empty($nomeForn) || empty($telForn) || empty($tipoForn)){
        echo '<script>alert("Preencha todos os campos para concluir o cadastro!");</script>';
    }else{
        $array5 = $sql->query("SELECT * FROM fornecedor WHERE cnpj = '$cnpjForn'"); //verificando se há dados repitidos no cnpj
        $check5 = mysqli_num_rows($array5);
        if ($check5 >= 1) {
            echo '<script>alert("Fornecedor: ' . $nomeForn . ' Já Cadastrado!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php";</script>'; 
        } else {
            $sql->query("INSERT INTO fornecedor VALUES ('$cnpjForn', '$nomeForn','$telForn','$tipoForn')");
        }
        echo '<script>alert("Fornecedor: ' . $nomeForn . ' Cadastrado com sucesso!"); window.location.href = "../app/pagina-inicial/cadastro-de-produtos/cad_prod.php"; </script>'; 
    }
}
?>