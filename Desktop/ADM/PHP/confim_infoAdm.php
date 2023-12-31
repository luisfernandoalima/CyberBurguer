<?php
include_once('conn.php');
session_start();

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//FIM codigo relacionado a sessão

$email = $_POST['emailInput']; //Pega atraves do forms html as informações digitadas referente ao email
$senha = base64_encode($_POST['senhaInput']); //Pega atraves do forms html as informações digitadas referente a senha 

$dados = $sql->query("SELECT * FROM funcionarios WHERE email_adm = '$email' AND senha_adm = '$senha'"); //comparamos o email digitado via html com o banco de dados, juntamente com a senha
if($dados->num_rows > 0){ //verificamos se o numero de linhas é maior que 0
    $dados_user = mysqli_fetch_assoc($dados); //esses dados passam por uma matriz associativa 
    $senha = $dados_user['senha_adm']; //pego os dados que me interesa da consulta do banco de dados, como a senha e o email
    $email = $dados_user['email_adm'];
    $checar = mysqli_num_rows($dados); //verifico se as linhas são existente no banco de dados 
    if($checar == 1){ //se for existente, joga para a pagina de informações pessoais 
        header('location: ../app/meu-perfil/informacoes-pessoais/info_user_adm.php');
    }else{ //caso não, joga para a pagina anterior 
        echo '<script>alert("email e/ou senha digirados errados!, confirme suas credenciais!"); window.location.href = "../app/meu-perfil/login_info_pessoal.php";</script>';

    } 
   
    
}else{//caso o numeor de linhas seja nulo, manda somente um aviso de que as credenciais estão erradas 
    echo '<script>alert("email e/ou senha digirados errados!, confirme suas credenciais!"); window.location.href = "../app/meu-perfil/login_info_pessoal.php";</script>';
}
//começado em 20/08/23
?>