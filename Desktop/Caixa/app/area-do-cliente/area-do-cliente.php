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

$Cliente = $sql->query("SELECT * FROM cliente");
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--JavaScript do BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <link rel="stylesheet" href="../../assets/css/area-do-cliente/area-do-cliente.css">
    <title>Área do Cliente</title>
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
                <span class="active">
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
                <a href="../../PHP/sair_sessao_Caixa.php">Sair</a>
            </aside>
        </header>
        <main>
            <div class="clienteArea">
                <div class="container">
                    <h1>Clientes Cadastrados</h1>
                    <hr class="linha">
                    <div class="clienteItems barra">
                    <?php foreach ($Cliente AS $Clientes): ?>
                        <div class="clienteItemsArea">
                            <input type="radio" name="Cliente" id="1" class="radioButton">
                            <label for="1" class="optionCliente">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2">
                                            <abbr title="CPF">
                                                <p class="numComanda"><?php echo $Clientes['cpf_cli'];?></p>
                                            </abbr>
                                        </div>
                                        <?php     
                                        $idCliente = $Clientes['id_cli'];
                                        $sqlCliente = $sql->query("SELECT * FROM cliente WHERE id_cli = $idCliente");
                                        $cliente = $sqlCliente->fetch_assoc(); 
                                        ?>
                                        <div class="col-4">
                                            <abbr title="Nome">
                                                <p class="btnVerPedido"><?php echo $cliente['nome'] ?></p>
                                            </abbr>
                                        </div>
                                        <div class="col-2">
                                            <abbr title="Data de nascimento">
                                                <p><?php echo $Clientes['dta_nasc'];?></p>
                                            </abbr>
                                        </div>
                                        <div class="col-2">
                                            <abbr title="Telefone">
                                                <p><?php echo $cliente['tel'] ?></p>
                                            </abbr>
                                        </div>
                                        <div class="col-2">
                                            <p class="btnVerMais"  data-cliente-id="<?php echo $cliente['id_cli']; ?>" >Ver mais</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="optionButtonArea">
                        <button class="btnCadastro">Cadastrar cliente</button>
                    </div>
                </div>
            </div>
        </main>
        <div class="opaco popDown">
            <aside class="popUpCliente popDown">
                <div>
                    <div class="popUpHeader">
                        <h2>Cliente nº<span>111</span></h2>
                        <button class="fecharPopUp"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>
                    </div>
                    <hr class="popupLinha">
                    <div class="popUpInfo container barra">
                        <div>
                            <h3 data-info='nome'>Nome:</h3>
                            <p></p>
                        </div>
                        <div>
                            <h3 data-info='email'>email:</h3>
                            <p></p>
                        </div>
                        <div>
                            <h3 data-info='cpf'>cpf:</h3>
                            <p></p>
                        </div>
                        <div>
                            <h3 data-info='telefone'>telefone:</h3>
                            <p></p>
                        </div>
                        <div>
                            <h3 data-info='data-nascimento'>Data de nascimento:</h3>
                            <p></p>
                        </div>
                        <div>
                            <h3 data-info='endereco'>Endereço:</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <script src="../../assets/js/configPopUp.js"></script>
    <script src="../../assets/js/area-do-cliente/area-do-cliente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const btnVerMaisList = document.querySelectorAll(".btnVerMais");
    const popUpCliente = document.querySelector(".popUpCliente");

    btnVerMaisList.forEach(function (btnVerMais) {
        btnVerMais.addEventListener("click", function () {
            const clienteId = this.getAttribute("data-cliente-id");

            fetch(`../../PHP/BuscarInfoCli.php?id_cli=${clienteId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error("Erro ao buscar informações do cliente:", data.error);
                    } else {
                        // Preencha o pop-up com as informações do cliente
                        popUpCliente.querySelector(".popUpHeader span").textContent = data.id_cli;
                        popUpCliente.querySelector("h3[data-info='nome'] + p").textContent = data.nome;
                        popUpCliente.querySelector("h3[data-info='email'] + p").textContent = data.email_cli;
                        popUpCliente.querySelector("h3[data-info='cpf'] + p").textContent = data.cpf_cli;
                        popUpCliente.querySelector("h3[data-info='telefone'] + p").textContent = data.tel;
                        popUpCliente.querySelector("h3[data-info='data-nascimento'] + p").textContent = data.dta_nasc;
                        popUpCliente.querySelector("h3[data-info='endereco'] + p").textContent = data.endereco;
                        popUpCliente.style.display = "block";
                    }
                })
                .catch(error => {
                    console.error("Erro ao buscar informações do cliente:", error);
                });
        });
    });
});

</script>

</html>