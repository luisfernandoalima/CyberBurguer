<?php
date_default_timezone_set('America/Sao_Paulo'); 
$conn = new mysqli('localhost','cyber065_cyber','cyberburguer','cyber065_cyber');
if ($conn->connect_errno) {
     //Redireciona para a página de erro ou exibe uma mensagem de erro
    header('Location: /ADM/app/Erro404.html'); // Substitua 'erro.php' pelo caminho da sua página de erro
}
?>
