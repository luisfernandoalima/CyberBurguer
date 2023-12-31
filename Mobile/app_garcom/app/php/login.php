<?php
require_once (__DIR__ . '/conn.php');
session_start();

$email = $_POST['email_adm'];
$senha = base64_encode($_POST['senha_adm']);


$logar = $sql->query("SELECT * FROM funcionarios WHERE email_adm='$email' AND senha_adm='$senha'");


while ($linha = mysqli_fetch_array($logar)){
    $cont = $linha['cont'];
   }

   $query = sprintf("SELECT id_func, nome, religiao, tipo_sanguineo, tel, conta_bancaria, habilitado, avatar FROM funcionarios WHERE email_adm='$email'");
$resultado = mysqli_query($sql, $query) or die("Erro ao retornar dados");

while ($registro = mysqli_fetch_array($resultado)){
  $id_func = $registro['id_func'];
  $nome = $registro['nome'];
  $religiao = $registro['religiao'];
  $tipo_sangue = $registro['tipo_sanguineo'];
  $telefone = $registro['tel'];
  $conta = $registro['conta_bancaria'];
  $habilitado = $registro['habilitado'];
  $avatar = '../../assets/imgbd/' . $registro['avatar'];
}

$check = mysqli_num_rows($logar);

if ($check === 1){
    $query = sprintf("SELECT t.cargo, t.carga_horaria FROM funcionarios f INNER JOIN tipo t ON f.id_tipo = t.id_tipo WHERE f.email_adm='$email'");
    $resultado = mysqli_query($sql, $query) or die("Erro ao retornar dados");
    $registro = mysqli_fetch_array($resultado);

    $cargo = $registro['cargo'];
    $cargaHoraria = $registro['carga_horaria'];

    $_SESSION['emailSession'] = $email;
    $_SESSION['senhaSession'] = $senha;
    $_SESSION['idFuncSession'] = $id_func;
    $_SESSION['nomeSession'] = $nome;
    $_SESSION['religiaoSession'] = $religiao;
    $_SESSION['sangueSession'] = $tipo_sangue;
    $_SESSION['telefoneSession'] = $telefone;
    $_SESSION['contaSession'] = $conta;
    $_SESSION['habilitadoSession'] = $habilitado;
    $_SESSION['avatarSession'] = $avatar;
    $_SESSION['cargoSession'] = $cargo;
    $_SESSION['cargaHorariaSession'] = $cargaHoraria;
    
    header("location: ../home/home.php");
}else{
    unset($_SESSION['emailSession']);
    unset($_SESSION['senhaSession']);
    echo '<script> alert("Email ou senha incorretos")</script>';
    header("refresh:0.1, url= ../login/login.html");
}
?>