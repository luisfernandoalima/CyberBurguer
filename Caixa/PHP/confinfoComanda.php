<?php
    include_once 'conn.php';
    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
        unset($_SESSION['email']); //destroi a variavel sessão email
        unset($_SESSION['senha']); //destroi a variavel sessão senha
        echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../index.html";</script>';
    }
    $log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
    $nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
    $idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario

    $NumeroComanda = $_POST['Nc'];
    $Id_func = $_POST['Ni'];
    //$Dados = $sql->query("SELECT * FROM funcionarios WHERE id_func = $Id_func");
    //$r = mysqli_fetch_assoc($Dados);
    //$Idfuncs = $r['id_func'];
    //var_dump($Idfuncs);
    //$Checar = mysqli_num_rows($Dados);
    if($Id_func == $idFunc){
        echo '<script>alert("Login realizado com sucesso! Bem-vindo, ' . $idFunc . ' e Nº Comanda '. $NumeroComanda .'");</script>';
        $_SESSION['NumeroComanda'] = $NumeroComanda;
    }else{
        echo '<script>alert("Numero Não existente ou não encontrado");</script>';
        unset($_SESSION['NumeroComanda']);
    }
?>
