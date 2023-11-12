<?php
//Codigo de sessão começo 
session_start();
include_once(__DIR__ . '/../../../PHP/conn.php'); //não faz parte da sessão mas linka com o banco de dados 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];
//FIM codigo relacionado a sessão
    $sqlc = "SELECT * FROM funcionarios WHERE id_func = '$idFunc'";
    $resultado = $sql->query($sqlc);

    if($resultado->num_rows > 0){
        while($user_dados = mysqli_fetch_assoc($resultado)){
            $id_func = $user_dados['id_func'];

            $habilitado = $user_dados['habilitado']; //s
            $tel = $user_dados['tel']; //s
            $conta_banc = $user_dados['conta_bancaria']; //s
            $id_tipo = $user_dados['id_tipo'];
            $nome = $user_dados['nome']; //s
            $email_adm = $user_dados['email_adm'];
            $senha_adm = $user_dados['senha_adm']; //s
            $avatar_func = $user_dados['avatar']; // Pega o valor da coluna 'avatar' do banco de dados
            $avatar_f = '../../../../imgbd/' . $avatar_func; // Constrói o URL completo da imagem
            $religiao = $user_dados['religiao'];
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

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/meu-perfil/perfil.css">
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
  />
  <title>Meu Perfil</title>
</head>
<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../../pagina-inicial/home.php">
                    <button>
                        <span>
                                <i class="material-symbols-outlined">home</i>
                                <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>
                
                <a href="../../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../../estatisticas/estatisticas.php">
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
                               <a href="../login_info_pessoal.php"><i class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="../../../PHP/sair_sessao_Adm.php">Sair da conta</a></p>
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
                <div><i class="material-symbols-outlined">settings</i><span>Meu Perfil</span></div>
                <i class="fa-solid fa-arrow-left" id="backButton"></i>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <div class="row">
                        <div class="col-6 fotoArea">
                            <picture class="foto-perfil">
                                <img src="<?php echo $avatar_f; ?>" alt="" class="fotoUsuário">
                            </picture>
                        </div>
                        <div class="col-6">
                        <form action="" id="infoPessoais" class="areaPerfil">
                                    <div>
                                        <label for="nomePessoal">Nome de Usuário</label>
                                        <!--As informações vindas do PHP serão colocadas no value-->
                                        <input type="text" id="nomePessoal" name="nome" value="<?php echo $nome;?>">
                                    </div>
                                    <div>
                                        <label for="telPessoal">Celular</label>
                                        <input type="text" id="telPessoal" name="tel" value="<?php echo $tel;?>">
                                    </div>
                                    <div>
                                        <label for="habPessoal">Habilitação</label>
                                        <input type="text" id="habPessoal" name="habilitado" value="<?php echo $habilitado;?>">
                                    </div>
                                    <div>
                                        <label for="relPessoal">Religião</label>
                                        <input type="text" id="relPessoal" name="religiao" value="<?php echo $religiao;?>">
                                    </div>
                                    <div>
                                        <label for="conPessoal">Nº Conta Bancária</label>
                                        <input type="text" id="conPessoal" name="conta_bancaria" value="<?php echo $conta_banc;?>">
                                    </div>
                                    <div>
                                        <label for="senhaPessoal">Senha</label>
                                        <input type="text" id="senhaPessoal" name="senha" value="<?php echo base64_decode($senha_adm);?>">
                                    </div>
                                    <div>
                                        <input type="file" name="foto" id="" class="arquivos">
                                    </div>
                                    <div class="nomeImagemArea">
                                        <p class="textoImagem">Imagem</p>
                                        <p class="nomeImagem"></p>
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
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>
    <script src="../../../assets/js/perfil/meu-perfil.js"></script>
    <script src="../../../assets/js/perfil/perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>