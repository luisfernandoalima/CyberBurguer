<?php
include_once('conn.php');

$nome_func = $_POST['nome_func']; //nome do funcionario
$email_func = $_POST['email_func']; //email do funcionario
$dtNasc_func = $_POST['dtNasc_func']; //data de nascimento do funcionario
$tel_func = $_POST['tel_func']; //telefone do funcionario
$telEmer_func = $_POST['telEmer_func']; //telefone de emergencia do funcionario 
$sexo_func = $_POST['sexo_func']; //sexo do funcionario
$relig_func = $_POST['relig_func']; //religiao do funcionario
$carg_func = $_POST['carg_func']; //cargo do funcionario (id_cargo)
$cart_func = $_POST['cart_Func']; //carteira de trabalho do funcionario
$pis_func = $_POST['pis_Func']; //pis do funcionario
$titu_func = $_POST['titu_Func']; //titulo de eleitor do funcionario
$vaRef_func = $_POST['vaRef_Func']; //vale refeição do funcionario
$vaTra_func = $_POST['vaTra_Func']; //vale transporte do funcionario
$comi_func = $_POST['comi_Func']; //comissão do funcionario
$cBanc_func = $_POST['cBanc_Func']; //conta do bancario do funcionario
$habi_func = $_POST['habi_func']; //habilitação do funcionario
$reser_func = $_POST['reser_func']; //reservista do funcionario
echo $reser_func;
$sang_func = $_POST['sang_func']; //tipo sanguineo do funcionario
$adimi_func = $_POST['adimi_func']; //data de adimissao do funcionario
$CPF = $_POST['CPF'];//CPF do Funcionario

$senha = base64_encode($nome_func);

$adimi_funcf = date('Y-m-d', strtotime($adimi_func));
$dtNasc_funcf = date('Y-m-d', strtotime($dtNasc_func));

$testar = $sql->query("SELECT * FROM funcionarios WHERE ctps = '$cart_func' ");
$checar = mysqli_num_rows($testar);
$testar2 = $sql->query("SELECT * FROM funcionarios WHERE pis = '$pis_func' ");
$checar2 = mysqli_num_rows($testar2);
$testar3 = $sql->query("SELECT * FROM funcionarios WHERE tit_eleitor = '$titu_func' ");
$checar3 = mysqli_num_rows($testar3);
$testar4 = $sql->query("SELECT * FROM funcionarios WHERE email_adm = '$email_func' ");
$checar4 = mysqli_num_rows($testar4);
$testar5 = $sql->query("SELECT * FROM funcionarios WHERE cpf_func = '$CPF' ");
$checar5 = mysqli_num_rows($testar4);

if (($checar == 1) AND ($checar2 == 2) AND ($checar3 == 1) AND ($checar4 == 1) AND ($checar5)) {
    echo '<script>alert("ERRO! CTPS:'. $cart_func.', PIS:'. $pis_func .', Titulo de eleitor'. $titu_func .', EMAIL:' . $email_func .'Já Cadastrados, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php"; </script>';
} else {
    if($checar == 1){
        echo '<script>alert("ERRO! CTPS de Nº:' . $cart_func .'  já cadastrado, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php"; </script>';
    }else{
        if($checar2 == 1){
            echo '<script>alert("ERRO! PIS de Nº:' . $pis_func .'  já cadastrado, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php"; </script>';
        }else{
            if($checar3 == 1){
                echo '<script>alert("ERRO! Titulo de eleitor de Nº:' . $titu_func .'  já cadastrado, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php";</script>';
            }else{
                if($checar4 == 1){
                    echo '<script>alert("ERRO! Email: ' . $email_func .' Já Cadastrado, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php"; </script>';
                }else{
                    if($checar5 == 1){
                        echo '<script>alert("ERRO! CPF de Nº:' . $CPF .'  já cadastrado, insira outro"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php"; </script>';
                    }else{
                    $sql -> query("INSERT INTO funcionarios (id_tipo,nome,cpf_func,dta_nasc,sexo,dta_admissao,religiao,tipo_sanguineo,tel,tel_emergencia,ctps,pis,tit_eleitor,reservista,vr,vt,comissao,conta_bancaria,habilitado,email_adm,senha_adm) VALUES ('$carg_func','$nome_func','$CPF', '$dtNasc_funcf','$sexo_func','$adimi_funcf','$relig_func','$sang_func','$tel_func','$telEmer_func','$cart_func','$pis_func','$titu_func','$reser_func', $vaRef_func, $vaTra_func , $comi_func ,'$cBanc_func','$habi_func','$email_func','$senha')");
                    echo '<script>alert("Cadastro do funcionario  ' . $nome_func . ' realizado com sucesso, a senha do funcionario é o seu nome depois há possibilidade de alteração"); window.location.href = "../app/pagina-inicial/cadastro-de-funcionarios/cad_func.php";</script>';
                    }
                }
            }
        }
    }
}
?>