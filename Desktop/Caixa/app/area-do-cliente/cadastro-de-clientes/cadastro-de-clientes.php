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

$vendas = $sql->query("SELECT * FROM venda");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/area-do-cliente/cadastro-de-cliente/cadastro-de-cliente.css">
    <title>Cadastro de clientes</title>
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
                <span class="active">
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
                <a href="../../configuracoes/informacoes.php"><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configurações</a>
                <br>
                <a href="../../index.html">Sair</a>
            </aside>
        </header>
        <main>
            <div class="clienteArea">
                <div class="container">
                    <h1>Cadastro de clientes</h1>
                    <hr class="linha">
                    <div class="clienteItems">
                        <form action="../../../PHP/CadastrarCliente.php" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="campoForms">
                                            <label for="nome">Nome:</label>
                                            <input type="text" name="Nome" id="nome">
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">CPF:</label>
                                            <input type="text" name="CPF" id="nome" class="cpfInput">
                                        </div>
                                        <div class="sexo">
                                            <!--Sexo do funcionário-->
                                            <label for="sexo_func">Sexo:</label><br>
                                            <input type="radio" name="sexo_func" id="Masc" checked value="Masculino"><label for="Masc">Masculino</label><br>
                                            <input type="radio" name="sexo_func" id="Femi" value="Feminino"><label for="Femi">Feminino</label>
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">Telefone:</label>
                                            <input type="tel" name="Tel" id="nome" class="telInput">
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">Email:</label>
                                            <input type="text" name="Email" id="nome">
                                        </div>
                                        <div class="campoForms">
                                            <label for="nome">DataNascimento:</label>
                                            <input type="date" name="dtnasc" id="dtnasc">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="campoForms">
                                            <label for="CEP">CEP:</label>
                                            <input type="text" name="CEP" id="CEP" onblur="pesquisacep(this.value);">
                                        </div>
                                        <div class="campoForms">
                                            <label for="cidade">Cidade:</label>
                                            <input type="text" name="Cidade" id="cidade">
                                        </div>
                                        <div class="campoForms">
                                            <label for="Bairro">Bairro:</label>
                                            <input type="text" name="Bairro" id="Bairro">
                                        </div>
                                        <div class="campoForms">
                                            <label for="Rua">Rua:</label>
                                            <input type="text" name="Rua" id="Rua">
                                        </div>
                                        <div class="campoForms">
                                            <label for="numero">Nº:</label>
                                            <input type="text" name="Numero" id="numero">
                                        </div>
                                        <input type="submit" value="Enviar" class="submitButton">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
    <script src="../../../assets/js/configPopUp.js"></script>
    <script src="../../../assets/js/area-do-cliente/cadastro-de-clientes/cadastro-de-clientes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>