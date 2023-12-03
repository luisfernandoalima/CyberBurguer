<?php
session_start(); //não faz parte da sessão mas linka com o banco de dados 
include_once('conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
//FIM codigo relacionado a sessão
    //$id = $_POST['id_func'];
$nome = $_POST['nomePessoal'];
$religiao = $_POST['relPessoal'];
$habilitado = $_POST['habPessoal'];
$tel = $_POST['telPessoal'];
$conta_banc = $_POST['conPessoal'];
$senha = $_POST['senhaPessoal'];
$senhaCripto = base64_encode($senha);
$ConfiSenha = $_POST['senhaConPessoal'];
$ConfiSenhaCrito = base64_encode($ConfiSenha);
    if($senhaCripto == $ConfiSenhaCrito ){
        $edit = ("UPDATE funcionarios SET nome = '$nome', religiao = '$religiao', tel = '$tel',conta_bancaria = '$conta_banc', habilitado = '$habilitado', senha_adm = '$senhaCripto' WHERE id_func = '$idFunc'");
        $resultado = $sql->query($edit);
        echo '<script>alert("Dados atualizados do ' . $nome . ' com sucesso "); window.location.href = "../app/configuracoes/informacoes-pessoais/configuracoes.php";</script>';
    }else{
        echo '<script>alert("Falha em atualizar os dados "); window.location.href = "../app/configuracoes/informacoes-pessoais/configuracoes.php";</script>';
    }
?>