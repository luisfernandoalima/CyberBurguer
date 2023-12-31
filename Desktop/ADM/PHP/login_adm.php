<?php
session_start();
include_once('conn.php');
$email = $_POST['email'];
$senha = base64_encode($_POST['senha']);

$logar = $sql->query("SELECT * FROM funcionarios WHERE dta_demissao IS NULL AND email_adm = '$email' AND senha_adm = '$senha' AND id_tipo = 1");
if(mysqli_num_rows($logar)< 1){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo '<script>alert("Login não realizado verifique seu email e/ou senha, em caso de erro consulte o adiministrador do sistema"); window.location.href = "../index.html";</script>';
}
else{
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $funcionario = mysqli_fetch_assoc($logar);
    $_SESSION['id_func'] = $funcionario['id_func'];
    $_SESSION['nome'] = $funcionario['nome'];
    $_SESSION['avatarSession'] = $funcionario['avatar'];
    echo '<script>alert("Login realizado com sucesso! Bem-vindo, ' . $funcionario['nome'] . '"); window.location.href = "../app/pagina-inicial/home.php";</script>';
}

//começado em 19/07/23
?>