<?php

include_once('conn.php'); //não faz parte da sessão mas linka com o banco de dados 
//Codigo de sessão começo 
session_start();
include_once(__DIR__ . '/../../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//FIM codigo relacionado a sessão
//FIM codigo relacionado a sessão
if(isset($_POST['Salvar'])){ 
    //$id = $_POST['id_func'];
    $nome = $_POST['nome'];
    $religiao = $_POST['religiao'];
    $habilitado = $_POST['habilitado'];
    $tel = $_POST['tel'];
    $conta_banc = $_POST['conta_bancaria'];
    $senha = $_POST['senha'];
    $edit = ("UPDATE funcionarios SET religiao = '$religiao', tel = '$tel',conta_bancaria = $conta_banc, habilitado = '$habilitado' WHERE id_func = '$idFunc'");
    $resultado = $sql->query($edit);
    echo '<script>alert("Dados atualizados do ' . $nome . ' com sucesso "); window.location.href = "../app/pagina-inicial/controle-de-funcionarios/controle_func.php";</script>';

}
echo '<script>alert("Falha em atualizar os dados "); window.location.href = "../app/pagina-inicial/controle-de-funcionarios/controle_func.php";</script>';

/*$dta_nasc = $_POST['dt_nasc'];
$sexo = $_POST['sexo'];
$dta_admi = $_POST['dt_admi'];
$religiao = $_POST['reli'];
$tipo_sanguineo = $_POST['tip_sang'];
$tel = $_POST['tel'];
$tel_emer = $_POST['tel_emer'];
$ctps = $_POST['ctps'];
$pis = $_POST['pis'];
$tit_eleitor = $_POST['tit_eleitor'];
$reservista = $_POST['reser'];
$vr = $_POST['vr'];
$vt = $_POST['vt'];
$conta_banc = $_POST['conta_banc'];
$habilitado = $_POST['habi'];
*/

//$att = $sql->query("UPDATE funcionarios SET dta_nasc = '$dta_nasc', sexo = '$sexo', dta_admissao = '$dta_admi', religiao = '$religiao', tel = '$tel', tel_emergencia = '$tel_emer', ctps = '$ctps', pis = '$pis', tit_eleitor = '$tit_eleitor', reservista = '$reservista', vr = '$vr', vt = '$vt', conta_bancaria = '$conta_banc', habilitado = '$habilitado' WHERE id_func = $idFunc");
?>