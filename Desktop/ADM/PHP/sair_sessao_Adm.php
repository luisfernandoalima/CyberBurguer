<?php
    session_start();
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo '<script>alert("Saindo.."); window.location.href = "../index.html";</script>';


//começado em 19/07/23
?>