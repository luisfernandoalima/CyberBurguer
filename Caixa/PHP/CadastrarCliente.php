<?php
include_once('conn.php');

$NomeCli = $_POST['Nome'];
$CpfCli = $_POST['CPF'];
$SexoCli = $_POST['sexo_func'];
$TelCli = $_POST['Tel'];
$EmailCli = $_POST['Email'];
$CepCli = $_POST['CEP'];
$CidadeCli = $_POST['Cidade'];
$BairroCli = $_POST['Bairro'];
$Rua = $_POST['Rua'];
$NCli = $_POST['Numero'];
$EnderecoComple = $Rua . "," . " " . $NCli . " " . "-" .  " " . $BairroCli . " " . "," .  " " . $CidadeCli;
$SenhaCli = base64_encode($CpfCli);
$Data = date('Y/m/d');
$testar = $sql->query("SELECT * FROM cliente WHERE cpf_cli = '$CpfCli' ");
$checar = mysqli_num_rows($testar);
$testar2 = $sql->query("SELECT * FROM cliente WHERE email_cli = '$EmailCli' ");
$checar2 = mysqli_num_rows($testar2);
if(empty($NomeCli) || empty($CpfCli) || empty($SexoCli) || empty($TelCli) || empty($EmailCli) || empty($CepCli) || empty($EnderecoComple) || empty($SenhaCli)){
    echo '<script>alert("ERRO! preencha todos os campos"); window.location.href = "../app/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.php"; </script>';
}else{
    if(($checar == 1) AND ($checar2 == 1)){
        echo '<script>alert("ERRO! CPF de Nº '. $CpfCli .', e Email já cadastrados no sistema!"); window.location.href = "../app/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.php"; </script>';
    }else{
        if($checar == 1){
            echo '<script>alert("ERRO! CPF já Cadastrado no sistema! ");  window.location.href = "../app/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.php"; </script>';
        }else{
            if($checar2 == 1){
                echo '<script>alert("ERRO! Email já Cadastrado no sistema! ");  window.location.href = "../app/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.php"; </script>';
            }else{
                //$sql->query("INSERT INTO cliente (cpf_cli,nome,sexo,tel,endereco,email_cli,dta_cadastro,senha_cli) VALUES ('$CpfCli', '$NomeCli', '$SexoCli', '$TelCli', '$EnderecoComple','$EmailCli',$Data,'$SenhaCli')");
                //echo '<script>alert("Cadastrado concluido com sucesso, sua senha é o seu cpf que é '. $CpfCli .' ");  window.location.href = "../app/area-do-cliente/area-do-cliente.php"; </script>';
                $concluir = ("INSERT INTO cliente (cpf_cli,nome,sexo,tel,endereco,email_cli,dta_cadastro,senha_cli) VALUES ('$CpfCli', '$NomeCli', '$SexoCli', '$TelCli', '$EnderecoComple','$EmailCli','$Data','$SenhaCli')");
                $sql->query($concluir);
                echo '<script>alert("Cadastrado concluido com sucesso, sua senha é o seu cpf que é '. $CpfCli .' ");  window.location.href = "../app/area-do-cliente/area-do-cliente.php"; </script>';
                //echo $concluir;
                
            }
        }
    }
}

?>