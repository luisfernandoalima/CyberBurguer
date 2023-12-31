<?php
include "conn.php";
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i');
    if (!empty($_GET['id_func'])) {
        $id = $_GET['id_func'];
        $SenhaDemitida = base64_encode("DEMITIDOOTARIO");
        $edit = $sql ->query("UPDATE funcionarios SET dta_demissao = '$data' , senha_adm = '$SenhaDemitida' WHERE id_func = '$id'");
        echo'<script>alert(" Funcionario DEMITIDO com sucesso !"); window.location.href = "../app/pagina-inicial/controle-de-funcionarios/controle_func.php";</script>';
    }
?>