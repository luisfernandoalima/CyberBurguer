<?php
session_start();

if (isset($_GET['erro'])){
    $erro = 'É necessário realizar o login para acessar o sistema';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div id="img">
            <img src="img/icons/CyberBurguerLogoSmall.png" alt="Logo">
        </div>
        <form action="../Cozinha/app/php/login.php" method="post">
            <h1>Login</h1>
            <div class="input-contain">
                <input type="email" name="email" id="emailInput" autocomplete="off" aria-labelledby="placeholder-email" value="" required>
                <label class="placeholder-text" for="email">
                    <div class="text">Email</div>
                </label>
            </div>
            <div class="input-contain"> 
                <input type="password" name="senhaInput" id="senhaInput" autocomplete="off"
                aria-labelledby="placeholder-senha" value="" required>
                <label class="placeholder-text" for="senhaInput">
                    <div class="text">Senha</div>
                </label>
            </div>
                <div style="margin:10px; color:red; font-style:bold">
                </div>
            <input type="submit" value="Entrar" class="btnEntrar">
        </form>
        
    </main>
    
    <script>
        let email_element = document.querySelector("#emailInput")
        email_element.addEventListener("keyup", ()=>{
            email_element.setAttribute("value", email_element.value)
        })
        let senha_element = document.querySelector("#senhaInput")
        senha_element.addEventListener("keyup", ()=>{
            senha_element.setAttribute("value", senha_element.value)
        })
    </script>
</body>
</html>