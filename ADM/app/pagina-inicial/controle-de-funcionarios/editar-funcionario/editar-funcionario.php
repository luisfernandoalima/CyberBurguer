<?php
//Codigo de sessão começo 
session_start();
include_once(__DIR__ . '/../../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true) { //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../../../index.html'); //joga para a pagina de login
} else {
    $log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
    $nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
    $idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
    $parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
    // Pega o primeiro elemento do array resultante
    $primeiroNome = $parts[0];
    // Explode o nome completo em partes separadas por espaço
    //FIM codigo relacionado a sessão
    $avatar = '../../../../../imgbd/' . $_SESSION['avatarSession']; //ARRUMAR 
    if (!empty($_GET['id_func'])) {
        $id = $_GET['id_func'];
        $sqlc = "SELECT * FROM funcionarios WHERE id_func = '$id'";
        $resultado = $sql->query($sqlc);

        if($resultado->num_rows > 0){
            while($user_dados = mysqli_fetch_assoc($resultado)){
                $sexo = $user_dados['sexo'];
                $dta_nasc = $user_dados['dta_nasc'];
                $dta_admi = $user_dados['dta_admissao'];
                $religiao = $user_dados['religiao'];
                $tipo_sanguineo = $user_dados['tipo_sanguineo'];
                $habilitado = $user_dados['habilitado'];
                $tel = $user_dados['tel'];
                $tel_emer = $user_dados['tel_emergencia'];
                $ctps = $user_dados['ctps'];
                $pis = $user_dados['pis'];
                $tit_eleitor = $user_dados['tit_eleitor'];
                $reservista = $user_dados['reservista'];
                $vr = $user_dados['vr'];
                $vt = $user_dados['vt'];
                $conta_banc = $user_dados['conta_bancaria'];
                
                $id_tipo = $user_dados['id_tipo'];
                $nome = $user_dados['nome'];
                $cpf_func = $user_dados['cpf_func'];
                $dta_demissao = $user_dados['dta_demissao'];
                $comissao = $user_dados['comissao'];
                $email_adm = $user_dados['email_adm'];
                $senha_adm = $user_dados['senha_adm'];
                $avatar_func = $user_dados['avatar']; // Pega o valor da coluna 'avatar' do banco de dados
                $avatar_f = '../../../../../imgbd/' . $avatar_func; // Constrói o URL completo da imagem
                $edit_cargo = $sql->query("SELECT cargo FROM tipo WHERE id_tipo = $id_tipo");
                if ($edit_cargo->num_rows > 0) {
                    $cargo = $edit_cargo->fetch_assoc()['cargo'];
                } else {
                    $cargo = "Cargo não encontrado";
                }
            }
        }
        else{
            header('');

        }
    }
}
// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*--*-*-*-*-*-*-*-*-*-*

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../../assets/css/paginaInicial/edit-func.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Página do funcionários</title>
</head>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../../home.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../../../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../../../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../../../estatisticas/estatisticas.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">paid</i>
                            <span>Estatísticas</span>
                        </span>
                    </button>
                </a>
            </nav>

            <header class="sidebar-header">
                <!--Foto Usuário-->
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome; ?></span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc; ?></span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                                <a href="../../../meu-perfil/login_info_pessoal.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../../../PHP/sair_sessao_Adm.php">Sair da conta</a></p>
                        </div>
                        <span class="ball"></span>
                        <span class="ball"></span>
                        <span class="ball"></span>
                    </span>
                </span>
            </header>
        </aside>

        <!--Principal-->
        <main class="main">
            <div class="header">
                <div>
                    <i class="material-symbols-outlined">badge</i><span>Página do funcionários</span>
                </div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row">
                        <div class="col-5">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $avatar_f; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h1 class="card-title"><?php echo $nome;?></h1>
                                    <div>
                                        <span>Email:</span>
                                        <input type="text" class="res card-text importantInfo" value="<?php echo $email_adm;?>">
                                        <span>Cargo:</span>
                                        <input type="text" class="res card-text importantInfo" value="<?php echo $id_tipo . ' ' . '-' . ' ' . $cargo;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 informacoes">
                            <form action="../../../../PHP/att_info_adm.php" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="perg">Sexo:</p>
                                        <input type="text" class="res" name="sexo" value="<?php echo $sexo;?>">
                                        <p class="perg">Data de nascimento:</p>
                                        <input type="text" class="res" name="dta_nasc" value="<?php echo $dta_nasc;?>">
                                        <p class="perg">Data de admissãp</p>
                                        <input type="text" class="res" name="dta_admissao" value="<?php echo $dta_admi;?>">
                                        <p class="perg">Religião</p>
                                        <input type="text" class="res" name="religiao" value="<?php echo $religiao;?>">
                                        <p class="perg">Tipo sanguíneo:</p>
                                        <input type="text" class="res" name="tipo_sanguineo" value="<?php echo $tipo_sanguineo;?>">
                                        <p class="perg">Habilitado:</p>
                                        <input type="text" class="res" name="habilitado" value="<?php echo $habilitado;?>">
                                        <p class="perg">Telefone:</p>
                                        <input type="text" class="res" name="tel" value="<?php echo $tel;?>">
                                        <p class="perg">Tel. emergência:</p>
                                        <input type="text" class="res" name="tel_emergencia" value="<?php echo $tel_emer;?>">
                                    </div>
                                    <div class="col-6">
                                        <p class="perg">Ctps:</p>
                                        <input type="text" class="res" name="ctps" value="<?php echo $ctps;?>">
                                        <p class="perg">Pis:</p>
                                        <input type="text" class="res" name="pis" value="<?php echo $pis;?>">
                                        <p class="perg">Título de eleitor:</p>
                                        <input type="text" class="res" name="tit_eleitor" value="<?php echo $tit_eleitor;?>">
                                        <p class="perg">Reservista:</p>
                                        <input type="text" class="res" name="reservista" value="<?php echo $reservista;?>">
                                        <p class="perg">Vale refeição:</p>
                                        <input type="text" class="res" name="vr" value="<?php echo $vr;?>">
                                        <p class="perg">Vale Transporte:</p>
                                        <input type="text" class="res" name="vt" value="<?php echo $vt;?>">
                                        <p class="perg">Conta bancária:</p>
                                        <input type="text" class="res" name="conta_bancaria" value="<?php echo $conta_banc;?>">
                                        <input type="hidden" name="id_func" value="<?php echo $id;?>">
                                        <input type="hidden" name="nome" value="<?php echo $nome;?>">
                                        <input type="submit" value="Salvar" name="Salvar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../../../assets/js/paginaInicial/edit-func.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../../../assets/js/paginaInicial/sidebar.js"></script>

</body>

</html>