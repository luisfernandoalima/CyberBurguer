<?php
try {
    $db_host = 'localhost';
    $db_name = 'cyber';
    $db_user = 'root';
    $db_pass = '';

    $sql = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $sql->set_charset("utf8");

    if ($sql->connect_error) {
        throw new Exception("Erro de conexão com o banco de dados");
    }
} catch (Exception $e) {
    die("Desculpe, estamos enfrentando problemas técnicos. Por favor, tente novamente mais tarde.");
}
?>
