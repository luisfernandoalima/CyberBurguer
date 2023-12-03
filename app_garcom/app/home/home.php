<?php
session_start();

if (!isset($_SESSION['emailSession']) and !isset($_SESSION['senhaSession'])) {
    header("location: ../login/erro.html");
    exit;
} else
    $email = $_SESSION['emailSession'];
$senha = $_SESSION['senhaSession'];
$nome = $_SESSION['nomeSession'];
$id_func = $_SESSION['idFuncSession'];
$avatar = '../../' . $_SESSION['avatarSession'];
$horarioAtual = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="../../assets/css/home/home.css">
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <header class="cabeçalho">
        <h1><span>//</span>Cyberburguer</h1>
        <i class="fa-solid fa-right-from-bracket backButton" style="color: #FF006B;" onclick="desconectarUsuario()"></i>
    </header>
    <main>
        <div class="btnArea">
            <button class="btnHome">Novo Pedido</button>
            <button class="btnHome">Pedidos feitos</button>
            <button class="btnHome">Perfil</button>
        </div>
    </main>
    <!--JS-->
    <script src="../../assets/js/home.js/home.js"></script>
    <script>
        function verificarMesaChamando() {
    // Cria uma instância do objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Define a função a ser chamada quando a resposta for recebida
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var mensagem = xhr.responseText;
            
            // Verifica se a mensagem não está vazia antes de exibir o alerta
            if (mensagem.trim() !== "") {
                // Exibe a mensagem (alerta) do PHP
                alert(mensagem);

                // Após exibir o alerta, faça a solicitação para atualizar a tabela
                var xhrAtualizar = new XMLHttpRequest();

                // Define a função a ser chamada quando a resposta da atualização for recebida
                xhrAtualizar.onreadystatechange = function() {
                    if (xhrAtualizar.readyState === 4 && xhrAtualizar.status === 200) {
                        // A tabela foi atualizada com sucesso
                        console.log(xhrAtualizar.responseText);
                    }
                };

                // Faz uma solicitação GET para o script de atualização
                xhrAtualizar.open("GET", "../php/atualizar_chamada.php", true);
                xhrAtualizar.send();
            }
        }
    };

    // Faz uma solicitação GET para o script PHP que verifica a mesa chamando
    xhr.open("GET", "../php/notificar.php", true);
    xhr.send();
}

// Chama a função verificarMesaChamando a cada 3 segundos
setInterval(verificarMesaChamando, 3000);
    </script>
    <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        function desconectarUsuario() {
            // Realizar uma solicitação AJAX para o arquivo logout.php
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../php/logout.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // A sessão foi encerrada com sucesso
                    window.location.href = '../login/login.html'; // Redirecionar o usuário para a página de login
                }
            };
            xhr.send();
        }
    </script>

</body>

</html>