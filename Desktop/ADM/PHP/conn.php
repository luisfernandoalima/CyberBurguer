<?php
date_default_timezone_set('America/Sao_Paulo'); 
$sql = new mysqli('localhost','root','','cyber');
$sql -> set_charset("utf8");
if ($sql->connect_errno) {
    // Redireciona para a página de erro ou exibe uma mensagem de erro
    header('Location: /ADM/app/Erro404.html'); // Substitua 'erro.php' pelo caminho da sua página de erro
}
?>