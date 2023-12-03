<?php
session_start();
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão 

$DadosFunc = $sql->query("SELECT * FROM funcionarios WHERE id_func = '$idFunc'");
if($DadosFunc -> num_rows > 0){
    while($DadosRecebido = mysqli_fetch_assoc($DadosFunc)){
        $id_func = $DadosRecebido['id_func'];
        $tel = $DadosRecebido ['tel'];
        $nome = $DadosRecebido ['nome'];
        $senha = $DadosRecebido ['senha_adm'];
        $email = $DadosRecebido ['email_adm'];
        $religiao = $DadosRecebido ['religiao'];
        $nc = $DadosRecebido['conta_bancaria'];
        $hab = $DadosRecebido['habilitado'];
        $img = $DadosRecebido['avatar'];
        $imgFoto = '../../../../imgbd/' . $img; 
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/configuracoes/config.css">
    <title>Informações da conta</title>
</head>

<body>
    <div class="fundo">
        <header>
            <nav class="menuArea">
                <span>
                    <a href="../../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../../area-do-cliente/area-do-cliente.php">
                        <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
            </nav>
            <aside class="sidebar-header">
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc; ?></span>
                </span>
                <div class="hamburger-menu">
                    <input type="checkbox" id="checkbox-menu">

                    <label for="checkbox-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>
            </aside>
            <aside class="menuConfig">
                <a href="../informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../../PHP/sair_sessao_Caixa.php">Sair</a>
            </aside>
        </header>
        <main class="main">
            <div class="fundoMain">
                <div class="row rows">
                    <div class="col-4 menuTopics">
                        <ul class="configMenu">
                            <li>
                                <a href="../index.php">Informações da conta</a>
                            </li>
                            <li>
                                <a href="index.php" class="activeConfig">Informações pessoais</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-8 info">
                        <h1>Informações pessoais</h1>
                        <div class="menuOptionConfig">
                            <picture>
                                <img src="<?php echo $imgFoto ?>" alt="">
                            </picture>

                            <form action="../../../PHP/UpdateInfoFunc.php" method="post" id="infoPessoais">
                                <div>
                                    <label for="nomePessoal">Nome de Usuário</label>
                                    <!--As informações vindas do PHP serão colocadas no value-->
                                    <input type="text" id="nomePessoal" name="nomePessoal" value="<?php echo $nome; ?>">
                                </div>
                                <div>
                                    <label for="telPessoal">Celular</label>
                                    <input type="text" id="telPessoal" name="telPessoal" value="<?php echo $tel; //VER CAMPOS DO CAMPO NUMERO DA TELEFONE  ?>">
                                </div>
                                <div>
                                    <label for="habPessoal">Habilitação</label>
                                    <input type="text" id="habPessoal" name="habPessoal" value="<?php echo $hab; ?>">
                                </div>
                                <div>
                                    <label for="relPessoal">Religião</label>
                                    <input type="text" id="relPessoal" name="relPessoal" value="<?php echo $religiao; ?>">
                                </div>
                                <div>
                                    <label for="conPessoal">Nº Conta Bancária</label>
                                    <input type="text" id="conPessoal" name="conPessoal" value="<?php echo $nc; ?>">
                                </div>
                                <div>
                                    <label for="senhaPessoal">Senha</label>
                                    <input type="password" id="senhaPessoal" name="senhaPessoal" value="<?php echo base64_decode($senha); ?>">
                                </div>
                                <div class="passwordClass">
                                    <label for="senhaConPessoal">Confirmar senha</label>
                                    <input type="password" id="senhaConPessoal" name="senhaConPessoal">
                                </div>

                            </form>
                            <button class="btnSubmitJS" name="Salvar" disabled>Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/configPopUp.js"></script>
    <script src="../../../assets/js/configuracoes/configIP.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>