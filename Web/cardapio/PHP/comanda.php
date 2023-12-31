<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber e armazenar os valores do formulário
    $_SESSION['comanda1'] = $_POST['comanda1'];
    $_SESSION['comanda2'] = $_POST['comanda2'];
    // Redirecionar ou fazer qualquer outra coisa necessária
}
?>
