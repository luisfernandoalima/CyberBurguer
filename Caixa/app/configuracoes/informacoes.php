<?php
session_start();
include_once(__DIR__ . '/../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    echo '<script>alert("Acesso Negado faça o login primeiro"); window.location.href = "../../index.html";</script>';
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
$avatar = '../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão 


$DadosUser = $sql->query("SELECT * FROM funcionarios WHERE id_func = $idFunc");

if($DadosUser -> num_rows > 0){
        $DadosUser = mysqli_fetch_assoc($DadosUser);
        $Nome = $DadosUser ['nome'];
        $id_func = $DadosUser ['id_func'];
        $id_tipo = $DadosUser ['id_tipo'];
        $Email = $DadosUser ['email_adm'];
        $avatarFunc = $DadosUser['avatar'];
        $avatar = '../../../imgbd/' . $avatarFunc;
        $DadosCargo = $sql->query("SELECT cargo, carga_horaria FROM tipo WHERE id_tipo = $id_tipo");
        if ($DadosCargo ->num_rows > 0){
            if ($DadosCargo){
                $DadosCargos = mysqli_fetch_assoc($DadosCargo);
                if($DadosCargos){
                    $cargo = $DadosCargos['cargo'];
                    $cargaHora = $DadosCargos['carga_horaria'];
                }else{
                    $cargo = "Cargo não encontrado";
                    $cargaHora = "Carga Horaria não encontrada";
                }
            }
            //$cargo = $DadosCargo->fetch_assoc()['cargo'];
            //$cargaHora = $DadosCargo->fetch_assoc()['carga_horaria'];
        }else{
            //$cargo = "Cargo não encontrado";
            //$cargaHora = "Carga Horaria não encontrada";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/configuracoes/config.css">
    <title>Informações da conta</title>
</head>

<body>
    <div class="fundo">
    <header>
            <nav class="menuArea">
                <span>
                    <a href="../pagina-inicial/home.php">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../novo-pedido/novo-pedido.php">
                        <i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../comandas-abertas/comandas-abertas.php">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
                    </a>
                </span>
                <span>
                    <a href="../area-do-cliente/area-do-cliente.php">
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
                <a href="../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
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
                                <span class="infoConta activeConfig">Informações da conta</span>
                            </li>
                            <li>
                                <span class="infoPessoais">Informações pessoais</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-8 info">
                        <h1>Informações da conta</h1>
                        <div class="menuOptionConfig">
                            <picture>
                                <img src="<?php echo $avatar ?>" alt="">
                            </picture>
                            <div class="row infoItens">
                                <div class="camposConfig col">
                                    <div>Nome:</div>
                                    <p><?php echo $Nome; ?></p>
                                </div>
                                <div class="camposConfig col">
                                    <div>Cargo:</div>
                                    <p><?php echo $cargo; ?></p>
                                </div>
                            </div>

                            <div class="row infoItens">
                                <div class="camposConfig col">
                                    <div>Email:</div>
                                    <p><?php echo $Email; ?></p>
                                </div>
                                <div class="camposConfig col">
                                    <div>Horário de trabalho:</div>
                                    <p><?php echo $cargaHora; ?></p>
                                </div>
                            </div>
                        </div>
                        <form action="../../PHP/Confi_infoCaixa.php" method="post" class="confirmForms disable">
                            <div class="forms">
                                <h2>Confirmar informações</h2>
                                <div class="input-contain">
                                    <label for="emailInput">Email</label>
                                    <input type="email" name="emailInput" id="emailInput" autocomplete="off"
                                        aria-labelledby="placeholder-email" value="" required>
                                </div>
                                <div class="input-contain">
                                    <label for="senhaInput">Senha</label>
                                    <input type="password" name="senhaInput" id="senhaInput" autocomplete="off"
                                        aria-labelledby="placeholder-senha" value="" required>
                                </div>
                                <input type="submit" value="Entrar" class="btnEntrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/configuracoes/configConta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>