<?php

include_once('conn.php'); //não faz parte da sessão mas linka com o banco de dados 

//FIM codigo relacionado a sessão
if(isset($_POST['Salvar'])){ 
    $id = $_POST['id_func'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $dta_nasc = $_POST['dta_nasc'];
    $dta_admi = $_POST['dta_admissao'];
    $religiao = $_POST['religiao'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $habilitado = $_POST['habilitado'];
    $tel = $_POST['tel'];
    $tel_emer = $_POST['tel_emergencia'];
    $ctps = $_POST['ctps'];
    $pis = $_POST['pis'];
    $tit_eleitor = $_POST['tit_eleitor'];
    $reservista = $_POST['reservista'];
    $vr = $_POST['vr'];
    $vt = $_POST['vt'];
    $conta_banc = $_POST['conta_bancaria'];
    $edit = ("UPDATE funcionarios SET dta_nasc = '$dta_nasc', sexo = '$sexo', dta_admissao = '$dta_admi', religiao = '$religiao', tel = '$tel', tel_emergencia = '$tel_emer', ctps = '$ctps', pis = '$pis', tit_eleitor = '$tit_eleitor', reservista = '$reservista', vr = $vr, vt = $vt, conta_bancaria = $conta_banc, habilitado = '$habilitado' WHERE id_func = '$id'");
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