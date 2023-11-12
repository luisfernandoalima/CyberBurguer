<?php
    session_start();
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    //header('location: ../ADM/index.html');
    echo '<script>alert("Saindo.."); window.location.href = "../index.html";</script>';


//começado em 19/08/23
?>